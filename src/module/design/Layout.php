<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 16:38
 */
namespace module\design;

use yii\helpers\Html;
use yii\web\JqueryAsset;

abstract class Layout extends Widget {

    protected static $_assetDir;

    abstract public function getLayoutName();

    public function init()
    {
        $this->_selectLayout($this->getLayoutName());
        parent::init();
    }

    public function getLayoutFileName()
    {
        return '@module/design/views/layouts/'.self::$_currentLayout.'.php';
    }


    protected function _selectLayout($layout)
    {
        if (self::$_currentLayout && self::$_currentLayout === $layout) {
            throw new exception\WrongWidgetUsage('Layout already defined');
        }
        self::$_currentLayout = $layout;
    }

    public static function getAssetDir()
    {
        if (!self::$_assetDir) {
            throw new exception\WrongWidgetUsage('Layout not selected');
        }
        return self::$_assetDir;
    }


}