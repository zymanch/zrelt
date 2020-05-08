<?php
namespace models;

use models\base;

class Image extends base\BaseImage {

    const IMAGE_DIR = 'upload';

    const TYPE_IMAGE = 'image';
    const TYPE_PANORAMA = 'panorama';

    const THUMB_WIDTH = 370;
    const THUMB_HEIGHT = 300;

    const PREVIEW_WIDTH = 450;
    const PREVIEW_HEIGHT = 400;


    public static function getImageDir()
    {
        return \Yii::getAlias('@web/'.self::IMAGE_DIR.'/');
    }

    public function getSourceFileAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/' . $this->filename;
    }

    public function getThumbsAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/thumb.jpg';
    }


    public function getThumbsUrl()
    {
        return '/'.self::IMAGE_DIR.'/'.$this->advert_id.'/thumb.jpg';
    }

}