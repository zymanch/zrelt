<?php
namespace components;
use Imagine\Image\Box;
use Imagine\Image\Point;
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
    public $files;

    public function rules()
    {
        return [
            [['files'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg','maxFiles'=>20],
        ];
    }

    public function upload()
    {
        if ($this->validate()) {
            foreach ($this->files as $index => $imageFile) {
                $transaction = \Yii::$app->db->beginTransaction();
                try {

                    $basePath = \Yii::getAlias('@webroot/'.Image::IMAGE_DIR.'/' . $this->_advert->id . '/' . time().'_'.$index . '_source.' . $imageFile->extension);
                    $this->_createDir($basePath);
                    $imageFile->saveAs($basePath);
                    $image = $this->_createImageModel($basePath);
                    $this->_createThumbnail($image);
                    $this->_createPreview($image);
                    $this->_createFullImage($image);
                    if ($image->type === Image::TYPE_PANORAMA) {
                        $this->_createPanorama($image, Image::PANORAMA_HEIGHT, $image->getPanoramaPath());
                    }
                    $transaction->commit();
                } catch (\Exception $e) {
                    $transaction->rollBack();
                    throw $e;
                }
            }
            return true;
        } else {
            var_dump($this->errors);die();
            return false;
        }
    }

    private function _createDir($fileName)
    {
        $dir = dirname($fileName);
        if (!file_exists($dir) && !mkdir($dir,0777,true)) {
            throw new \Exception('Ошибка создания папки фотографий');
        }
    }

    private function _createImageModel($basePath)
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
        $this->_resizeImage($image, Image::THUMB_WIDTH, Image::THUMB_HEIGHT, $image->getThumbsAbsolutePath());
    }

    private function _createPreview(Image $image)
    {
        $this->_resizeImage($image, Image::PREVIEW_WIDTH, Image::PREVIEW_HEIGHT, $image->getPreviewAbsolutePath());
    }

    private function _createFullImage(Image $image)
    {
        $this->_resizeImage($image, Image::FULL_WIDTH, Image::FULL_HEIGHT, $image->getFullImageAbsolutePath());
    }

    private function _createPanorama(Image $image, $height, $filename)
    {
        $imagine = new \Imagine\Gd\Imagine();
        $gd = $imagine->open($image->getSourceFileAbsolutePath());
        $width = round($image->width * $height / $image->height);
        if ($image->height > $height) {
            $gd->resize(new Box($width, $height));
        }

        $gd->save($filename);
    }

    private function _resizeImage(Image $image, $width, $height, $filename)
    {
        $imagine = new \Imagine\Gd\Imagine();
        $gd = $imagine->open($image->getSourceFileAbsolutePath());
        $isVertical = $image->height/$height > $image->width/$width;
        if ($isVertical) {

            $newHeight = round($image->height * $width/$image->width);
            $gd
                ->resize(new Box($width, $newHeight))
                ->crop(new Point(0, ($newHeight - $height)/2), new Box($width, $height));
        } else {
            $newWidth = round($image->width * $height/$image->height);
            $gd
                ->resize(new Box($newWidth, $height))
                ->crop(new Point(($newWidth - $width)/2, 0), new Box($width, $height));
        }
        $gd->save($filename);
    }

    public function fileUploadMaxSize() {
        static $max_size = -1;

        if ($max_size < 0) {
            $post_max_size = $this->_parseSize(ini_get('post_max_size'));
            if ($post_max_size > 0) {
                $max_size = $post_max_size;
            }

            $upload_max = $this->_parseSize(ini_get('upload_max_filesize'));
            if ($upload_max > 0 && $upload_max < $max_size) {
                $max_size = $upload_max;
            }
        }
        return $max_size;
    }

    private function _parseSize($size) {
        $unit = preg_replace('/[^bkmgtpezy]/i', '', $size); // Remove the non-unit characters from the size.
        $size = preg_replace('/[^0-9\.]/', '', $size); // Remove the non-numeric characters from the size.
        if ($unit) {
            // Find the position of the unit in the ordered string which is the power of magnitude to multiply a kilobyte by.
            return round($size * pow(1024, stripos('bkmgtpezy', $unit[0])));
        }
        else {
            return round($size);
        }
    }


}