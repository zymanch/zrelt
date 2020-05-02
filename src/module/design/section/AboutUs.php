<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\section;

class AboutUs extends \module\design\Section {

    const TYPE_1 = 1;
    const TYPE_2 = 2;
    const TYPE_3 = 3;

    public $type =self::TYPE_1;
    public $title;
    public $title_description;
    public $sub_title;
    public $sliders = [];
    public $services = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'section/about_us'.$this->type;
    }



}