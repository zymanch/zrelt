<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:31
 */
abstract class DownloadAdvert {


    protected function _getSellerId($name, $phones = null, $info = null, $site = null) {
        $phones = $this->_extractPhones($phones);
        /** @var Seller $seller */
        $seller = Seller::model()->findByAttributes(array(
            'name' => $name,
            'type' => 'reltor'
        ));
        if ($seller) {
            $this->_updateReltor($seller, $phones, $info, $site);
            return $seller->id;
        }
        $seller = $this->_findSellerByPhone($phones);
        if ($seller) {
            return $seller->id;
        }
        $seller = new Seller();
        $seller->attributes = array(
            'type' => 'master',
            'name' => $name,
            'info' => $info,
            'site' => $site
        );
        $seller->save(false);
        foreach ($phones as $phoneNumber) {
            $phone = new SellerPhone();
            $phone->attributes = array(
                'seller_id' => $seller->id,
                'phone'     => $phoneNumber
            );
            $phone->save(false);
        }
        return $seller->id;
    }

    protected function _parsePrice($price) {
        $price = trim($price);
        $price = preg_replace('|([^\d]+)|','',$price);
        $price = intval($price);
        if (!$price) {
            return null;
        }
        return $price;
    }

    protected function _updateReltor(Seller $reltor, $phones = array(), $info = null, $site = null) {
        if (!$reltor->info && $info) {
            $reltor->info = $info;
        }
        if (!$reltor->site && $site) {
            $reltor->site = $site;
        }
        $reltor->save(false);
        foreach ($phones as $phoneNumber) {
            $attributes = array(
                'seller_id' => $reltor->id,
                'phone'     => $phoneNumber
            );
            $phone = SellerPhone::model()->findByAttributes($attributes);
            if (!$phone) {
                $phone = new SellerPhone();
                $phone->attributes = $attributes;
                $phone->save(false);
            }
        }
    }

    protected function _findSellerByPhone($phones) {
        foreach ($phones as $phoneNumber) {
            $criteria = new CDbCriteria();
            $criteria->with = array('sellerPhones');
            $criteria->compare('t.type','master');
            $criteria->compare('sellerPhones.phone', $phoneNumber);
            $seller = Seller::model()->find($criteria);
            if ($seller) {
                return $seller;
            }
        }
        return null;
    }

    protected function _extractPhones($phones) {
        return explode(',',preg_replace('/[^0-9\+,]+/','',trim($phones)));
    }

    protected function _getAddressId($address = null) {
        if (!$address) {
            return null;
        }
        $address = strtolower($address);
        $address = str_replace(
            array('Новый город','ул.','пр.','б-р.','пер.',
                'ул ','пр ','б-р ','пер ',
                'дом', 'д.'
            ),
            array('','улица ','проспект ','бульвар ','переулок ',
                'улица ','проспект ','бульвар ','переулок ',
                '',''
            ),
            $address
        );
        $address = preg_replace('|(ост.[^ ,.]+)|','',$address);
        $address = preg_replace('|д[\.]*([0-9]+)|','$1',$address);
        $address  = array_map('trim',explode(',', $address));
        $words = array('этаж','р-н');
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
        $address = preg_replace('|([\t,]+)|','',implode(',',$address));
        // определение комплекса
        if (preg_match('|(\d+)([\\\/ ]+)(\d+)([^ ,.\)]*)|',$part,$complex)) {
            $attributes = array(
                'complex'       => $complex[1],
                'complex_house' => $complex[3].$complex[4],
            );
            $address = Address::model()->findByAttributes($attributes);
            if (!$address) {
                $address = new Address();
                $address->attributes = $attributes;
                $address->save(false);
            }
            return $address->id;
        }
        //  определение обычного
        $startWords = array('улица','проспект','бульвар','переулок');
        foreach ($startWords as $startWord) {
            if (strpos($address,$startWord)!==false) {
                $address = substr($address,strpos($address,$startWord));
                break;
            }
        }
        $address = explode(' ',$address);
        $attributes = array(
            'street' =>$address[0],
            'street_house' => isset($address[1]) ? $address[1] : null,
            'street_structure' => isset($address[2]) ? $address[2] : null,
        );
        $address = Address::model()->findByAttributes($attributes);
        if (!$address) {
            $address = new Address();
            $address->attributes = $attributes;
            $address->save(false);
        }
        return $address->id;
    }

    abstract public function save();
}