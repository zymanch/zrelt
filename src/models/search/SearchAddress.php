<?php
namespace models\search;
use models\Address;

/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class SearchAddress extends \models\base\BaseAdvert {

    public function getAddressTree() {
        $addresses = Address::find()
            ->andWhere('complex is not null')
            ->andWhere('complex_house is not null')
            ->andWhere('complex_house<>""')
            ->andWhere('map_x <> 0')
            ->andWhere('map_y <> 0')
            ->orderBy('cast(complex as unsigned) asc, cast(complex_house as unsigned) asc')
            ->all();
        $result = array();
        /** @var Address $address */
        foreach ($addresses as $address) {
            if (!isset($result[$address->complex])) {
                $result[$address->complex] = array();
            }
            $result[$address->complex][] = $address;
        }
        return $result;
    }

}