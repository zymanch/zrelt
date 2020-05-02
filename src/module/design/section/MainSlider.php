<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\section;

class MainSlider extends \module\design\Section {

    public $contents = [];
    public $sign;

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'section/main_slider';
    }



}