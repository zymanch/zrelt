<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

class ClickMenu extends \module\design\Container {

    public $title = 'Menu';
    public $menu = [];
    public $search = [];
    public $footer = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/click_menu';
    }



}