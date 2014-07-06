<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class SearchAddress extends Advert {

    public function getAddressTree() {
        $criteria = new CDbCriteria();
        $criteria->addCondition('complex is not null');
        $criteria->addCondition('complex_house is not null');
        $criteria->addCondition('complex_house<>""');
        $criteria->addCondition('map_x <> 0');
        $criteria->addCondition('map_y <> 0');
        $criteria->order = 'cast(complex as unsigned) asc, cast(complex_house as unsigned) asc';
        $addresses = Address::model()->findAll($criteria);
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