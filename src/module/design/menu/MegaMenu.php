<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

class MegaMenu extends \module\design\Container {

    public $menu = [];
    public $sub_menu = [];
    public $button = [];
    public $logo;

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_MEGA_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/mega_menu';
    }



}