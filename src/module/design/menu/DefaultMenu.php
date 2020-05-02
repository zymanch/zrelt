<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 15:13
 */
namespace module\design\menu;

use yii\helpers\Html;

class DefaultMenu extends \module\design\Container {

    public $menu = [];
    public $socials = [];
    public $sub_logo;
    public $logo;
    public $footer = [];

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_DEFAULT_MENU];
    }

    public function getViewFileName()
    {
        return 'menu/default_menu';
    }



}