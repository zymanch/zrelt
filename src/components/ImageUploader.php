<?php
namespace components;
use models\Advert;
use models\Image;
use yii\base\Model;
use yii\web\UploadedFile;

/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 08.05.2020
 * Time: 7:03
 */
class ImageUploader extends Model{

    const PANORAMA_ASPECT_RATION = 1.5;

    private $_advert;

    public function __construct(Advert $advert)
    {
        $this->_advert = $advert;
        parent::__construct();
    }
    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules()
    {
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg','maxFiles'=>20],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->imageFiles as $imageFile) {
                $basePath = '@web/uploads/'.$this->_advert->id.'/_' . $imageFile->baseName . '.' . $imageFile->extension;
                $imageFile->saveAs($basePath);
                $image = $this->_createImageModel($imageFile);
                $this->_createThumbnail($image);
            }
            return true;
        } else {
            return false;
        }
    }

    private function _createImageModel(UploadedFile $file, $basePath)
    {
        list($width, $height, $type, $attr) = getimagesize($basePath);
        $image = new Image();
        $image->advert_id = $this->_advert->id;
        $image->width = $width;
        $image->height = $height;
        $image->type = $width > $height * self::PANORAMA_ASPECT_RATION ? Image::TYPE_PANORAMA : Image::TYPE_IMAGE;
        $image->filename = basename($basePath);
        $image->save();
        return $image;
    }

    private function _createThumbnail(Image $image)
    {
        $imagine = new \Imagine\Gd\Imagine();
        $gd = $imagine->open($image->getSourceFileAbsolutePath());
        $isVertical = $image->height/Image::THUMB_HEIGHT > $image->width/Image::THUMB_WIDTH;
        if ($isVertical) {

            $newHeight = round($image->height * Image::THUMB_WIDTH/$image->width);
            $gd
                ->resize(new Box(Image::THUMB_WIDTH, $newHeight))
                ->crop(new Point(0, ($newHeight - Image::THUMB_HEIGHT)/2, 0), new Box(Image::THUMB_WIDTH, Image::THUMB_HEIGHT));
        } else {
            $newWidth = round($image->width * Image::THUMB_HEIGHT/$image->height);
            $gd
                ->resize(new Box($newWidth, Image::THUMB_HEIGHT))
                ->crop(new Point(($newWidth - Image::THUMB_WIDTH)/2, 0), new Box(Image::THUMB_WIDTH, Image::THUMB_HEIGHT));
        }
        $gd->save($image->getThumbsAbsolutePath());
    }



}