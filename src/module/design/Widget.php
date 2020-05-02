<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 16:37
 */
namespace module\design;

use module\design\exception;

abstract class Widget extends \yii\base\Widget {

    const LAYOUT_CLICK_MENU = 'click_menu';
    const LAYOUT_MEGA_MENU = 'mega_menu';
    const LAYOUT_RIGHT_MENU = 'right_menu';
    const LAYOUT_DEFAULT_MENU = 'default_menu';

    protected static $_currentLayout;
    protected $_publishUrl;

    public static function getCurrentLayout()
    {
        return self::$_currentLayout;
    }


    public function getViewPath()
    {
        return __DIR__ . DIRECTORY_SEPARATOR . 'views';
    }

    public function init()
    {
        parent::init();
        if (self::$_currentLayout) {
            $supportedLayouts = $this->getSupportedLayouts();
            if (!in_array(self::$_currentLayout, $supportedLayouts)) {
                throw new exception\WrongWidgetUsage('Widget '.get_called_class().' not supported for '.self::$_currentLayout.' layout');
            }
            $this->_publishUrl = Layout::getAssetDir();
        }
    }

    public function getSupportedLayouts()
    {
        return [self::LAYOUT_CLICK_MENU,self::LAYOUT_DEFAULT_MENU,self::LAYOUT_MEGA_MENU,self::LAYOUT_RIGHT_MENU];
    }

    public function registerCssFile($fileName)
    {
        if (!$this->_publishUrl) {
            throw new exception\WrongWidgetUsage('Layout not registered');
        }
        $this->view->registerCssFile($this->_publishUrl.'/css/'.$fileName);
    }

    public function registerJsFile($fileName)
    {
        if (!$this->_publishUrl) {
            throw new exception\WrongWidgetUsage('Layout not registered');
        }
        if ($fileName[0] !=='/' && strpos($fileName,'http')!==0) {
            $this->view->registerJsFile($this->_publishUrl . '/js/' . $fileName,['depends' => \yii\web\JqueryAsset::class]);
        } else {
            $this->view->registerJsFile($fileName,['depends' => \yii\web\JqueryAsset::class]);
        }
    }

    public function getImageUrl($fileName)
    {
        if (!$this->_publishUrl) {
            throw new exception\WrongWidgetUsage('Layout not registered');
        }
        return $this->_publishUrl.'/images/'.$fileName;
    }


}