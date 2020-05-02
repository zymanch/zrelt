<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:11
 */
class Seller extends CSeller {

    public function hasPhone($phone) {
        foreach ($this->sellerPhones as $sellerPhone) {
            if ($sellerPhone->phone == $phone) {
                return true;
            }
        }
        return false;
    }

    public function addPhone($phone) {
        $model = new SellerPhone();
        $model->seller_id = $this->id;
        $model->phone = $phone;
        $model->save();
        return $model;
    }
}