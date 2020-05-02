<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 10.12.2017
 * Time: 10:33
 */
class AddressFindOrCreateCommand{

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
        $model->save();
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
        $coordinates = $this->_getCoordinates('г. Набережные Челны, комплекс '.$model->complex.'/'.$model->complex_house);
        $model = $this->_getComplexAddressByCoordinates(
            $coordinates,
            $model
        );
        $model->save();
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
        $gMap = new EGMap();
        $gMap->setAPIKey(null,'AIzaSyDF3O46ycecR2StiCQhUbhzItdOC7aSxZA');
        $geocodedAddress = new EGMapGeocodedAddress($address);
        $geocodedAddress->geocode($gMap->getGMapClient());
        print "+\n";
        return [
            'map_x' => $geocodedAddress->getLat(),
            'map_y' => $geocodedAddress->getLng()
        ];
    }


    protected function _getComplexAddressByCoordinates($coordinates, Address $address) {
        /** @var Address[] $foundAddreses */
        $foundAddreses = Address::model()->findAllByAttributes($coordinates);
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
        $address->setAttributes($coordinates);
        return $address;
    }

    protected function _getStreetAddressByCoordinates($coordinates, Address $address) {
        /** @var Address[] $foundAddreses */
        $foundAddreses = Address::model()->findAllByAttributes($coordinates);
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
        $address = new Address();
        $address->setAttributes($coordinates);
        return $address;
    }

    protected function _findByAddress(Address $address) {
        if ($address->complex) {
            return Address::model()->findByAttributes([
               'complex'           => $address->complex,
               'complex_house'     => $address->complex_house,
               'complex_structure' => $address->complex_structure,
            ]);
        }
        return Address::model()->findByAttributes([
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