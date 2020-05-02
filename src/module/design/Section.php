<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 16:38
 */
namespace module\design;

use yii\helpers\Html;

abstract class Section extends Container {

    public $margin = []; // ['top'=>0,'bottom'=>0]
    public $full_width = false;

    public function getSectionProperties($class)
    {
        $properties = [];
        if ($this->margin) {
            $properties['style'] = 'margin-top:' . $this->margin['top'] . 'px;margin-bottom:' . $this->margin['bottom'];
        }
        $properties['class'] = $class;
        if ($this->full_width) {
            $properties['class'].=' full-width';
        }
        $result = '';
        foreach ($properties as $property => $value) {
            $result.=$property.'="'.$value.'" ';
        }
        return $result;
    }


}