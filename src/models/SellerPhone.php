<?php
namespace models;

use models\base;

class SellerPhone extends base\BaseSellerPhone {


    public function __toString()
    {
        if (strlen($this->phone)<10) {
            return floor($this->phone/1000).'-'.($this->phone%1000);
        }
        $phone = substr($this->phone,-10);
        return '+7('.substr($phone,0,3).')'.substr($phone,3,3).'-'.substr($phone,6,2).'-'.substr($phone,8);
    }
}