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
        if ($phones) {
            /** @var Seller $seller */
            $seller = $this->_findSellerByPhone($phones);
            if (!$seller) {
                $seller = new Seller();
                $seller->attributes = array(
                    'type' => 'master',
                    'name' => $name,
                );
            }
            $this->_updateReltor($seller, $phones, $info, $site);
            return $seller->id;
        }
        /** @var Seller $seller */
        $criteria = new CDbCriteria();
        $criteria->with = ['sellerPhones'];
        $criteria->compare('t.name', $name);
        $criteria->addCondition('sellerPhones.id is null');
        $seller = Seller::model()->find($criteria);
        if (!$seller) {
            $seller = new Seller();
            $seller->attributes = array(
                'type' => 'master',
                'name' => $name,
                'info' => $info,
                'site' => $site
            );
        }
        $this->_updateReltor($seller, $phones, $info, $site);
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

    protected function _updateReltor(Seller $seller, $phones = array(), $info = null, $site = null) {
        if (!$seller->info && $info) {
            $seller->info = $info;
        }
        if (!$seller->site && $site) {
            $seller->site = $site;
        }
        $seller->save(false);
        foreach ($phones as $phoneNumber) {
            if (!$seller->hasPhone($phoneNumber)) {
                $seller->addPhone($phoneNumber);
            }
        }
    }

    protected function _findSellerByPhone($phones) {
        foreach ($phones as $phoneNumber) {
            $criteria = new CDbCriteria();
            $criteria->with = array('sellerPhones');
            $criteria->compare('sellerPhones.phone', $phoneNumber);
            $seller = Seller::model()->find($criteria);
            if ($seller) {
                return $seller;
            }
        }
        return null;
    }

    protected function _extractPhones($phones) {
        $phones = preg_replace('/(\-[ ]+|[^0-9\+, ]+)/','',trim($phones));
        if (strpos($phones,',')===false && strlen($phones)>10) {
            $parts = explode(' ', $phones);
            if (count($parts)<=3) {
                return array_filter($parts);
            }
            return [];
        }
        return array_filter(array_map('trim',explode(',',$phones)));
    }

    protected function _getAddressId($address = null) {
        $accessor = new AddressFindOrCreateCommand();
        $model = $accessor->findOrCreate($address);
        return $model ? $model->id : null;
    }

    abstract public function save();
}