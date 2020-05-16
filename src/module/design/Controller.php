<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 16:38
 */
namespace module\design;

use yii\helpers\Html;

abstract class Controller extends \yii\web\Controller {

    const LAYOUT_CLICK_MENU = 'click_menu';
    const LAYOUT_DEFAULT_MENU = 'default_menu';
    const LAYOUT_MEGA_MENU = 'mega_menu';
    const LAYOUT_RIGHT_MENU = 'right_menu';

    public $menu = [];
    public $sub_menu = [];
    public $custom_layout_file = false;
    public $button = null;

    public $layout;
    private $_layoutInit = false;

    public function getView()
    {
        $this->_initLayout();
        return parent::getView();
    }

    private function _initLayout()
    {
        if ($this->_layoutInit) {
            return;
        }
        $this->_layoutInit = true;
        switch ($this->layout) {
            case self::LAYOUT_RIGHT_MENU:
                $layout = new \module\design\layout\RightMenu;
                $this->layout = $this->custom_layout_file ? '//layouts/'.self::LAYOUT_RIGHT_MENU: $layout->getLayoutFileName();
                break;
            case self::LAYOUT_DEFAULT_MENU:
                $layout = new \module\design\layout\DefaultMenu();
                $this->layout = $this->custom_layout_file ? '//layouts/'.self::LAYOUT_DEFAULT_MENU: $layout->getLayoutFileName();
                break;
            case self::LAYOUT_MEGA_MENU:
                $layout = new \module\design\layout\MegaMenu();
                $this->layout = $this->custom_layout_file ? '//layouts/'.self::LAYOUT_MEGA_MENU : $layout->getLayoutFileName();
                break;
            case self::LAYOUT_CLICK_MENU:
                $layout = new \module\design\layout\ClickMenu();
                $this->layout = $this->custom_layout_file ? '//layouts/'.self::LAYOUT_CLICK_MENU : $layout->getLayoutFileName();
                break;
        }
    }

}