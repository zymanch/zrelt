<?php

namespace models\base;



/**
 * This is the model class for table "image_link".
 *
 * @property integer $id
 * @property integer $from_image_id
 * @property integer $to_image_id
 * @property integer $x
 * @property integer $y
 *
 * @property \models\Image $fromImage
 * @property \models\Image $toImage
 */
class BaseImageLink extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'image_link';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseImageLinkPeer::FROM_IMAGE_ID, BaseImageLinkPeer::TO_IMAGE_ID, BaseImageLinkPeer::X, BaseImageLinkPeer::Y], 'required'],
            [[BaseImageLinkPeer::FROM_IMAGE_ID, BaseImageLinkPeer::TO_IMAGE_ID, BaseImageLinkPeer::X, BaseImageLinkPeer::Y], 'integer'],
            [[BaseImageLinkPeer::FROM_IMAGE_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseImage::className(), 'targetAttribute' => [BaseImageLinkPeer::FROM_IMAGE_ID => BaseImagePeer::ID]],
            [[BaseImageLinkPeer::TO_IMAGE_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseImage::className(), 'targetAttribute' => [BaseImageLinkPeer::TO_IMAGE_ID => BaseImagePeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseImageLinkPeer::ID => 'ID',
            BaseImageLinkPeer::FROM_IMAGE_ID => 'From Image ID',
            BaseImageLinkPeer::TO_IMAGE_ID => 'To Image ID',
            BaseImageLinkPeer::X => 'X',
            BaseImageLinkPeer::Y => 'Y',
        ];
    }
    /**
     * @return \models\ImageQuery
     */
    public function getFromImage() {
        return $this->hasOne(\models\Image::className(), [BaseImagePeer::ID => BaseImageLinkPeer::FROM_IMAGE_ID]);
    }
        /**
     * @return \models\ImageQuery
     */
    public function getToImage() {
        return $this->hasOne(\models\Image::className(), [BaseImagePeer::ID => BaseImageLinkPeer::TO_IMAGE_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\ImageLinkQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\ImageLinkQuery(get_called_class());
    }
}
