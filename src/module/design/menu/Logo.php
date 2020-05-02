<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

class Logo extends \module\design\Container {

    public $logo;
    public $menu;
    public $footer;

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_MEGA_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/logo';
    }



}