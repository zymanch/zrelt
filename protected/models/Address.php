<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:11
 */
class Address extends CAddress {

    public function behaviors() {
        return array(
            'addGoogleCoordinates' => array(
                'class' => 'AddGoogleCoordinatesBehaviors'
            )
        );
    }
}