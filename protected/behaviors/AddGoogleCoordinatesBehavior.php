<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.07.14
 * Time: 9:25
 */
Yii::import('ext.EGMap.*');
class AddGoogleCoordinatesBehavior extends CActiveRecordBehavior {


    public function beforeSave() {
        /** @var Address $owner */
        $owner = $this->getOwner();
        $attributes = array('complex','complex_house','complex_structure',
            'street','street_house','street_structure');
        foreach ($attributes as $attribute) {
            if (!is_null($owner->$attribute)) {
                $owner->$attribute = trim($owner->$attribute);
            }
        }
        if (!floatval($owner->map_x) || !floatval($owner->map_y)) {
            $gMap = new EGMap();
            if ($owner->complex) {
                $searchString = 'Набережные Челны, ' .
                    $owner->complex.
                    ($owner->complex_house ? '/'.$owner->complex_house : '').
                    ($owner->complex_structure ? '/'.$owner->complex_structure : '');

            } else {
                $searchString = 'Набережные Челны, ' .
                    $owner->street.
                    ($owner->street_house ? ','.$owner->street_house : '').
                    ($owner->street_structure ? ','.$owner->street_structure : '');
            }
            $geocodedAddress = new EGMapGeocodedAddress($searchString);
            $geocodedAddress->geocode($gMap->getGMapClient());
            /*var_dump(
                iconv('utf-8','cp866',$searchString),
                $geocodedAddress->getLat(),
                $geocodedAddress->getLng()
            );die();*/
            $owner->map_x = $geocodedAddress->getLat();
            $owner->map_y = $geocodedAddress->getLng();
        }
        var_dump($owner->map_x,$owner->map_y);
        return true;
    }
}