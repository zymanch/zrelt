<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:11
 */
class Address extends CAddress {


    public function getHumanComplex() {
        $result = array($this->complex);
        if ($this->complex_house) {
            $result[] = $this->complex_house;
        }
        if ($this->complex_structure) {
            $result[] = $this->complex_structure;
        }
        return implode('/',$result);
    }


    public function behaviors() {
        return array(
            'addGoogleCoordinates' => array(
                'class' => 'AddGoogleCoordinatesBehaviors'
            )
        );
    }

    public function __toString() {
        if ($this->complex) {
            return 'Комплекс '.$this->getHumanComplex();
        } else {
            return '';
        }
    }
}