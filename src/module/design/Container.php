<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 16:38
 */
namespace module\design;

use yii\helpers\Html;

abstract class Container extends Widget {

    public $logo;

    public $content;

    abstract public function getViewFileName();

    public function init()
    {
        parent::init();
        ob_start();
    }

    public function run()
    {
        $content = ob_get_clean();
        if ($content) {
            $this->content = $content;
        }
        return $this->render($this->getViewFileName());
    }


}