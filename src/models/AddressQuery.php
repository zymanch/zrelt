<?php

namespace models;

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

}