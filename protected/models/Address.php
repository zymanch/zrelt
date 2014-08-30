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

    public function save($runValidation=true,$attributes=null) {
        $attributes = array(
            'complex', 'complex_house', 'complex_structure',
            'street', 'street_house', 'street_structure'
        );
        foreach ($attributes as $attribute) {
            if ($this->$attribute) {
                $this->$attribute = ltrim($this->$attribute,'0');
            }
            if (!$this->$attribute) {
                $this->$attribute = null;
            }
        }

        if (!$this->getIsNewRecord()) {
            return parent::save($runValidation, $attributes);
        }
        $criteria = new CDbCriteria();
        if ($this->complex) {
            $criteria->addCondition(
                 'complex = :complex '.
                 sprintf('AND complex_house %s :complex_house ',$this->complex_house ? '=' : 'is').
                 sprintf('AND complex_structure %s :complex_structure',$this->complex_structure ? '=' : 'is')
            );
            $criteria->params[':complex'] = $this->complex;
            $criteria->params[':complex_house'] = $this->complex_house;
            $criteria->params[':complex_structure'] = $this->complex_structure;
        }
        if ($this->street) {
            $criteria->addCondition(
                 'street = :street '.
                 sprintf('AND street_house %s :street_house ',$this->street_house ? '=' : 'is').
                 sprintf('AND street_structure %s :street_structure',$this->street_structure ? '=' : 'is'),
                 'OR'
            );
            $criteria->params[':street'] = $this->street;
            $criteria->params[':street_house'] = $this->street_house;
            $criteria->params[':street_structure'] = $this->street_structure;
        }
        /** @var Address $original */
        $original = Address::model()->find($criteria);
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