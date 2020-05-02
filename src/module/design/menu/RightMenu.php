<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

use yii\helpers\Html;

class RightMenu extends \module\design\Container {

    public $menu = [];
    public $socials = [];
    public $sub_logo;
    public $button = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_RIGHT_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/right_menu';
    }



}