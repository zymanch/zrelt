<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 01.03.2020
 * Time: 17:49
 */
namespace assets\upload;

use yii\web\AssetBundle;

class Assets extends AssetBundle {


    public $sourcePath = '@assets/upload/files';
    public $depends = [
         'yii\web\JqueryAsset',
    ];
    public $js = [
        'jquery-ui.min.js',
        'jquery.iframe-transport.js',
        'jquery.fileupload.js',
    ];

    public $css = [
        'jquery.fileupload.css',
        'jquery.fileupload-ui.css',
    ];
}

/*
$this->registerJsFile('/js/vendor/jquery.ui.widget.js', ['position' => \yii\web\View::POS_END]);
*/