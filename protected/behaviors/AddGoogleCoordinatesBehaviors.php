<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 06.07.14
 * Time: 9:25
 */
Yii::import('ext.EGMap.*');
class AddGoogleCoordinatesBehaviors extends CActiveRecordBehavior {


    public function beforeSave() {
        /** @var Address $owner */
        $owner = $this->getOwner();
        if (!floatval($owner->map_x) || !floatval($owner->map_y)) {
            $gMap = new EGMap();
            if ($owner->complex) {
                $geocoded_address = new EGMapGeocodedAddress(
                    'Набережные Челны, ' .
                    $owner->complex.
                    ($owner->complex_house ? '/'.$owner->complex_house : '').
                    ($owner->complex_structure ? '/'.$owner->complex_structure : '')
                );
            } else {
                $geocoded_address = new EGMapGeocodedAddress(
                    'Набережные Челны, ' .
                    $owner->street.
                    ($owner->street_house ? ','.$owner->street_house : '').
                    ($owner->street_structure ? ','.$owner->street_structure : '')
                );
            }
            $geocoded_address->geocode($gMap->getGMapClient());
            $owner->map_x = $geocoded_address->getLat();
            $owner->map_y = $geocoded_address->getLng();
        }
        return true;
    }
}