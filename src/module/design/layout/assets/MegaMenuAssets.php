<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 17:49
 */
namespace module\design\layout\assets;

use yii\web\AssetBundle;

class MegaMenuAssets extends AssetBundle {


    public $sourcePath = '@module/design/assets/mega_menu';
    public $depends = [
         'yii\web\JqueryAsset',
    ];
    public $js = [
        'js/bootstrap.min.js',
        'js/owl.carousel.min.js',
        'js/wow.min.js',
        'js/modernizr-2.8.3.min.js',
        'js/range-Slider.min.js',
        'js/selectbox-0.2.min.js',
        'js/select2.min.js',
        'js/megamenu.js',
        'js/jquery.scrollUp.min.js',
        'js/classie.js',
        'js/uisearch.js',
        'js/modernizr.custom.js',
        'js/custom-js.js',
    ];

    public $css = [
        'css/master.css',
        'https://fonts.googleapis.com/css?family=Fjalla+One',
        'https://fonts.googleapis.com/css?family=Oswald',
        'https://fonts.googleapis.com/css?family=Titillium+Web',
    ];
}