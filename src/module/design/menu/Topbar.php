<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

class Topbar extends \module\design\Container {

    public $phone;
    public $email;
    public $menu = [];
    public $socials = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_MEGA_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_CLICK_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/topbar';
    }



}