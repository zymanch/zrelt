<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 17:49
 */
namespace assets\panorama;

use yii\web\AssetBundle;

class Assets extends AssetBundle {


    public $sourcePath = '@assets/panorama/files';
    public $depends = [
         'yii\web\JqueryAsset',
    ];
    public $js = [
        'three.min.js',
        'panolens.min.js',
    ];

    public $css = [
        'style.css'
    ];
}

/*
$this->registerJsFile('/js/vendor/jquery.ui.widget.js', ['position' => \yii\web\View::POS_END]);
*/