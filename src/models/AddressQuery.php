<?php

namespace models;

use Exception;
use models\base;

class AddressQuery extends base\BaseAddressQuery {

    const BULVAR = 'бульвар';
    const STREET = 'улица';
    const PROSPEKT = 'проспект';
    const PEREULOK = 'переулок';
    const CITY = 'город';
    const SELO = 'село';

    public static function normalizeAddress($address)
    {
        return trim(str_replace(
            array('б-р','ул.','пр.','пер.','г.','гор.','с.'),
            array(self::BULVAR,self::STREET,self::PROSPEKT,self::PEREULOK,self::CITY,self::CITY,self::SELO),
            $address
        ));
    }


    /**
     * @param $address
     * @return Address|null
     */
    public function findOrCreate($address) {
        if (!$address) {
            return null;
        }
        $address = $this->_normalizeAddress($address);
        if ($this->_isComplex($address)) {
            return $this->_findOrCreateComplexAddress($address);
        }
        return $this->_findOrCreateStreetAddress($address);
    }

    protected function _findOrCreateStreetAddress($originalAddress) {
        $address = $originalAddress;
        $startWords = array('улица','проспект','бульвар','переулок');
        foreach ($startWords as $startWord) {
            if (strpos($address,$startWord)!==false) {
                $address = substr($address,strpos($address,$startWord));
                break;
            }
        }
        $address = preg_replace('|([, ]*корпус[ ]*)|u','/', $address);
        $address = preg_split('|([,]+)|', $address);

        $model = new Address();
        $model->street = trim($address[0]);
        $model->street_house = isset($address[1])?$address[1]:null;
        $model->street_structure = isset($address[2])?$address[2]:null;
        $found = $this->_findByAddress($model);
        if ($found) {
            return $found;
        }
        $coordinates = $this->_getCoordinates($originalAddress);
        $model = $this->_getStreetAddressByCoordinates(
            $coordinates,
            $model
        );
        if (!$model->save()) {
            throw new \yii\db\Exception('Ошибка создания адреса:'.json_encode($model->getErrors()));
        }
        return $model;
    }

    protected function _findOrCreateComplexAddress($address) {
        $parts = explode(',',$address);
        preg_match('|(\d+)([\\\/ ]+)(\d+)([^ ,.\)]*)|', end($parts), $complex);
        $model = new Address();
        $model->complex = $complex[1];
        $model->complex_house = $complex[3].$complex[4];
        $found = $this->_findByAddress($model);
        if ($found) {
            return $found;
        }
        $coordinates = $this->_getCoordinates(\Yii::$app->params['city'].', комплекс '.$model->complex.'/'.$model->complex_house);
        $model = $this->_getComplexAddressByCoordinates(
            $coordinates,
            $model
        );
        if (!$model->save()) {
            throw new \yii\db\Exception('Ошибка создания адреса:'.json_encode($model->getErrors()));
        }
        return $model;
    }

    protected function _normalizeAddress($address) {
        $address = mb_strtolower($address);
        $address = str_replace(
            array('Новый город','ул.','пр.','б-р.','пер.',
                'ул ','пр ','б-р ','пер ',
                'дом', 'д.','г.','к.'
            ),
            array('','улица ','проспект ','бульвар ','переулок ',
                'улица ','проспект ','бульвар ','переулок ',
                '','','город ','корпус '
            ),
            $address
        );
        $address = preg_replace('|(ост.[^ ,.]+)|u','',$address);
        $address = preg_replace('|д[\.]*([0-9]+)|u','$1',$address);
        $address  = array_map('trim',explode(',', $address));
        $words = array('этаж','р-н','город');
        foreach ($address as $index => $part) {
            if (!$part) {
                unset($address[$index]);
                continue;
            }
            foreach ($words as $word) {
                if (strpos($part, $word)!== false) {
                    unset($address[$index]);
                    break;
                }
            }
        }
        $address = preg_replace('|([ ]+)|',' ',implode(',',$address));
        $address = preg_replace('|([\t,]+)|',',', $address);
        if (!$address) {
            throw new Exception('Address is empty');
        }
        if (mb_strtolower($address) === 'адресс') {
            throw new Exception('Skipped');
        }
        return $address;
    }

    protected function _isComplex($address) {
        $words = array('улица','проспект','бульвар','переулок');
        foreach ($words as $word) {
            if (mb_stripos($word, $address)!==false) {
                return false;
            }
        }
        return preg_match('|(\d+)([\\\/ ]+)(\d+)([^ ,.\)]*)|',$address);
    }

    protected function _getCoordinates($address) {
        $api = new \Yandex\Geo\Api();
        $api->setQuery(\Yii::$app->params['city'].','.$address);
        $api
            ->setToken(\Yii::$app->params['yandex_map_key'])
            ->setLimit(1) // кол-во результатов
            ->setLang(\Yandex\Geo\Api::LANG_RU) // локаль ответа
            ->load();

        $response = $api->getResponse();
        return [
            'map_x' => $response->getLatitude(),
            'map_y' => $response->getLongitude(),
        ];

    }


    protected function _getComplexAddressByCoordinates($coordinates, Address $address) {
        /** @var Address[] $foundAddreses */
        $foundAddreses = self::model()
                             ->filterByMapX(number_format($coordinates['map_x'],8,'',''))
                             ->filterByMapY(number_format($coordinates['map_y'],8,'',''))
                             ->all();
        $streetAddress = null;
        foreach ($foundAddreses as $foundAddress) {
            if ($this->_isEqualAddress($foundAddress, $address)) {
                return $foundAddress;
            }
            if (!$foundAddress->complex && $foundAddress->street) {
                $streetAddress = $foundAddress;
            }
        }
        if ($streetAddress) {
            $streetAddress->complex = $address->complex;
            $streetAddress->complex_structure = $address->complex_structure;
            $streetAddress->complex_house = $address->complex_house;
            return $streetAddress;
        }
        $address->map_x = $coordinates['map_x'];
        $address->map_y = $coordinates['map_y'];
        return $address;
    }

    protected function _getStreetAddressByCoordinates($coordinates, Address $address) {
        /** @var Address[] $foundAddreses */
        $foundAddreses = Address::model()
                                ->filterByMapX(number_format($coordinates['map_x'],8,'',''))
                                ->filterByMapY(number_format($coordinates['map_y'],8,'',''))
                                ->all();
        $complexAddress = null;
        foreach ($foundAddreses as $foundAddress) {
            if ($this->_isEqualAddress($foundAddress, $address)) {
                return $foundAddress;
            }
            if (!$foundAddress->street && $foundAddress->complex) {
                $complexAddress = $foundAddress;
            }
        }
        if ($complexAddress) {
            $complexAddress->street = $address->street;
            $complexAddress->street_structure = $address->street_structure;
            $complexAddress->street_house = $address->street_house;
            return $complexAddress;
        }
        $address->map_x = $coordinates['map_x'];
        $address->map_y = $coordinates['map_y'];
        return $address;
    }

    protected function _findByAddress(Address $address) {
        if ($address->complex) {
            return Address::findOne([
                                        'complex'           => $address->complex,
                                        'complex_house'     => $address->complex_house,
                                        'complex_structure' => $address->complex_structure,
                                    ]);
        }
        return Address::findOne([
                                    'street'           => $address->street,
                                    'street_house'     => $address->street_house,
                                    'street_structure' => $address->street_structure,
                                ]);
    }

    protected function _isEqualAddress(Address $address1, Address $address2) {
        if ($address1->complex) {
            return $address1->complex == $address2->complex &&
                $address1->complex_structure == $address2->complex_structure &&
                $address1->complex_house == $address2->complex_house;
        }
        return $address1->street == $address2->street &&
            $address1->street_structure == $address2->street_structure &&
            $address1->street_house == $address2->street_house;
    }

}