<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 17:49
 */
namespace assets\editable;

use yii\web\AssetBundle;

class Assets extends AssetBundle {


    public $sourcePath = '@assets/editable/files';
    public $depends = [
         'yii\web\JqueryAsset',
    ];
    public $js = [
        'jquery-editable-select.min.js',
    ];

    public $css = [
        'jquery-editable-select.min.css',
    ];
}