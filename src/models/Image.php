<?php
namespace models;

use models\base;

class Image extends base\BaseImage {

    const IMAGE_DIR = 'uploads';

    const TYPE_IMAGE = 'image';
    const TYPE_PANORAMA = 'panorama';

    const THUMB_WIDTH = 370;
    const THUMB_HEIGHT = 300;

    const PREVIEW_WIDTH = 450;
    const PREVIEW_HEIGHT = 400;

    const FULL_WIDTH = 1024;
    const FULL_HEIGHT = 768;

    const PANORAMA_HEIGHT = 1024;


    public static function getImageDir()
    {
        return \Yii::getAlias('@webroot/'.self::IMAGE_DIR.'/');
    }

    public function getSourceFileAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/' . $this->filename;
    }

    public function getThumbsAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/_'.$this->id.'_thumb.jpg';
    }


    public function getThumbsUrl()
    {
        return '/'.self::IMAGE_DIR.'/'.$this->advert_id.'/_'.$this->id.'_thumb.jpg';
    }

    public function getPreviewAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/_'.$this->id.'_preview.jpg';
    }


    public function getPreviewUrl()
    {
        return '/'.self::IMAGE_DIR.'/'.$this->advert_id.'/_'.$this->id.'_preview.jpg';
    }

    public function getFullImageAbsolutePath()
    {
        return self::getImageDir().$this->advert_id.'/_'.$this->id.'_full.jpg';
    }


    public function getFullImageUrl()
    {
        return '/'.self::IMAGE_DIR.'/'.$this->advert_id.'/_'.$this->id.'_full.jpg';
    }


    public function getPanoramaPath()
    {
        return self::getImageDir().$this->advert_id.'/_'.$this->id.'_panorama.jpg';
    }


    public function getPanoramaUrl()
    {
        return '/'.self::IMAGE_DIR.'/'.$this->advert_id.'/_'.$this->id.'_panorama.jpg';
    }


}