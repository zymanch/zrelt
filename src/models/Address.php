<?php
namespace models;

use models\base;

class Address extends base\BaseAddress {

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


    public static function getVariants()
    {
        $result = [];
        foreach (self::find()->all() as $model) {
            $result[$model->id] = $model->getHumanComplex();
        }
        asort($result, SORT_NUMERIC );
        return $result;
    }



    public function save($runValidation=true,$attributes=null) {
        $attributesToCheck = array(
            base\BaseAddressPeer::COMPLEX, base\BaseAddressPeer::COMPLEX_HOUSE, base\BaseAddressPeer::COMPLEX_STRUCTURE,
            base\BaseAddressPeer::STREET, base\BaseAddressPeer::STREET_HOUSE, base\BaseAddressPeer::STREET_STRUCTURE
        );
        foreach ($attributesToCheck as $attribute) {
            if (!$this->$attribute) {
                $this->$attribute = null;
            }
        }

        if (!$this->getIsNewRecord()) {
            return parent::save($runValidation, $attributes);
        }
        $query = self::find();
        if ($this->complex) {
            $query->andWhere(
                '(complex = :complex '.
                sprintf('AND complex_house %s :complex_house ',$this->complex_house ? '=' : 'is').
                sprintf('AND complex_structure %s :complex_structure)',$this->complex_structure ? '=' : 'is'),
                [
                    ':complex' => $this->complex,
                    ':complex_house' => $this->complex_house,
                    ':complex_structure' => $this->complex_structure
                ]
            );

        }
        if ($this->street) {
            $query->orWhere(
                '(street = :street '.
                sprintf('AND street_house %s :street_house ',$this->street_house ? '=' : 'is').
                sprintf('AND street_structure %s :street_structure)',$this->street_structure ? '=' : 'is'),
                [
                    ':street' => $this->street,
                    ':street_house' => $this->street_house,
                    ':street_structure' => $this->street_structure
                ]
            );

        }
        /** @var Address $original */
        $original = $query->one();
        if (!$original) {
            return parent::save($runValidation, $attributes);
        }
        if (!$original->complex && $this->complex) {
            $original->complex           = $this->complex;
            $original->complex_house     = $this->complex_house;
            $original->complex_structure = $this->complex_structure;
        }
        if (!$original->street && $this->street) {
            $original->street           = $this->street;
            $original->street_house     = $this->street_house;
            $original->street_structure = $this->street_structure;
        }
        $this->id = $original->id;
        $this->setAttributes($original->getAttributes());
        $this->setIsNewRecord(false);
        return parent::save($runValidation, $attributes);
    }


    public function behaviors() {
        return [];
        return array(
            'addGoogleCoordinates' => array(
                'class' => 'AddGoogleCoordinatesBehavior'
            ),
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