<?php

namespace models\base;



/**
 * This is the model class for table "zrelt.image".
 *
 * @property integer $id
 * @property integer $advert_id
 * @property string $type
 * @property integer $width
 * @property integer $height
 * @property string $filename
 * @property string $created
 *
 * @property \models\Advert $advert
 */
class BaseImage extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zrelt.image';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseImagePeer::ADVERT_ID, BaseImagePeer::WIDTH, BaseImagePeer::HEIGHT, BaseImagePeer::FILENAME], 'required'],
            [[BaseImagePeer::ADVERT_ID, BaseImagePeer::WIDTH, BaseImagePeer::HEIGHT], 'integer'],
            [[BaseImagePeer::TYPE], 'string'],
            [[BaseImagePeer::CREATED], 'safe'],
            [[BaseImagePeer::FILENAME], 'string', 'max' => 128],
            [[BaseImagePeer::ADVERT_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAdvert::className(), 'targetAttribute' => [BaseImagePeer::ADVERT_ID => BaseAdvertPeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseImagePeer::ID => 'ID',
            BaseImagePeer::ADVERT_ID => 'Advert ID',
            BaseImagePeer::TYPE => 'Type',
            BaseImagePeer::WIDTH => 'Width',
            BaseImagePeer::HEIGHT => 'Height',
            BaseImagePeer::FILENAME => 'Filename',
            BaseImagePeer::CREATED => 'Created',
        ];
    }
    /**
     * @return \models\AdvertQuery
     */
    public function getAdvert() {
        return $this->hasOne(\models\Advert::className(), [BaseAdvertPeer::ID => BaseImagePeer::ADVERT_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\ImageQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\ImageQuery(get_called_class());
    }
}
