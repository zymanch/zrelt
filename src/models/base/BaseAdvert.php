<?php

namespace models\base;



/**
 * This is the model class for table "zrelt.advert".
 *
 * @property integer $id
 * @property string $type
 * @property integer $address_id
 * @property integer $floor
 * @property integer $floor_max
 * @property integer $space_total
 * @property integer $space_living
 * @property integer $space_cookroom
 * @property integer $balcony
 * @property string $phone
 * @property string $steel_door
 * @property string $information
 * @property string $exchange
 * @property integer $price
 * @property integer $seller_id
 * @property string $source_code
 * @property integer $source_id
 * @property string $url
 * @property string $created
 * @property integer $expired
 * @property string $status
 * @property string $changed
 *
 * @property \models\Address $address
 * @property \models\Seller $seller
 * @property \models\Image[] $images
 */
class BaseAdvert extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zrelt.advert';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseAdvertPeer::TYPE, BaseAdvertPeer::ADDRESS_ID, BaseAdvertPeer::INFORMATION, BaseAdvertPeer::PRICE, BaseAdvertPeer::SELLER_ID, BaseAdvertPeer::SOURCE_ID], 'required'],
            [[BaseAdvertPeer::ADDRESS_ID, BaseAdvertPeer::FLOOR, BaseAdvertPeer::FLOOR_MAX, BaseAdvertPeer::SPACE_TOTAL, BaseAdvertPeer::SPACE_LIVING, BaseAdvertPeer::SPACE_COOKROOM, BaseAdvertPeer::BALCONY, BaseAdvertPeer::PRICE, BaseAdvertPeer::SELLER_ID, BaseAdvertPeer::SOURCE_ID, BaseAdvertPeer::EXPIRED], 'integer'],
            [[BaseAdvertPeer::PHONE, BaseAdvertPeer::STEEL_DOOR, BaseAdvertPeer::INFORMATION, BaseAdvertPeer::EXCHANGE, BaseAdvertPeer::STATUS], 'string'],
            [[BaseAdvertPeer::CREATED, BaseAdvertPeer::CHANGED], 'safe'],
            [[BaseAdvertPeer::TYPE], 'string', 'max' => 12],
            [[BaseAdvertPeer::SOURCE_CODE], 'string', 'max' => 16],
            [[BaseAdvertPeer::URL], 'string', 'max' => 256],
            [[BaseAdvertPeer::ADDRESS_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseAddress::className(), 'targetAttribute' => [BaseAdvertPeer::ADDRESS_ID => BaseAddressPeer::ID]],
            [[BaseAdvertPeer::SELLER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseSeller::className(), 'targetAttribute' => [BaseAdvertPeer::SELLER_ID => BaseSellerPeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseAdvertPeer::ID => 'ID',
            BaseAdvertPeer::TYPE => 'Type',
            BaseAdvertPeer::ADDRESS_ID => 'Address ID',
            BaseAdvertPeer::FLOOR => 'Floor',
            BaseAdvertPeer::FLOOR_MAX => 'Floor Max',
            BaseAdvertPeer::SPACE_TOTAL => 'Space Total',
            BaseAdvertPeer::SPACE_LIVING => 'Space Living',
            BaseAdvertPeer::SPACE_COOKROOM => 'Space Cookroom',
            BaseAdvertPeer::BALCONY => 'Balcony',
            BaseAdvertPeer::PHONE => 'Phone',
            BaseAdvertPeer::STEEL_DOOR => 'Steel Door',
            BaseAdvertPeer::INFORMATION => 'Information',
            BaseAdvertPeer::EXCHANGE => 'Exchange',
            BaseAdvertPeer::PRICE => 'Price',
            BaseAdvertPeer::SELLER_ID => 'Seller ID',
            BaseAdvertPeer::SOURCE_CODE => 'Source Code',
            BaseAdvertPeer::SOURCE_ID => 'Source ID',
            BaseAdvertPeer::URL => 'Url',
            BaseAdvertPeer::CREATED => 'Created',
            BaseAdvertPeer::EXPIRED => 'Expired',
            BaseAdvertPeer::STATUS => 'Status',
            BaseAdvertPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\AddressQuery
     */
    public function getAddress() {
        return $this->hasOne(\models\Address::className(), [BaseAddressPeer::ID => BaseAdvertPeer::ADDRESS_ID]);
    }
        /**
     * @return \models\SellerQuery
     */
    public function getSeller() {
        return $this->hasOne(\models\Seller::className(), [BaseSellerPeer::ID => BaseAdvertPeer::SELLER_ID]);
    }
        /**
     * @return \models\ImageQuery
     */
    public function getImages() {
        return $this->hasMany(\models\Image::className(), [BaseImagePeer::ADVERT_ID => BaseAdvertPeer::ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\AdvertQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\AdvertQuery(get_called_class());
    }
}
