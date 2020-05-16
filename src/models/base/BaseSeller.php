<?php

namespace models\base;



/**
 * This is the model class for table "seller".
 *
 * @property integer $id
 * @property integer $user_id
 * @property string $type
 * @property string $name
 * @property string $info
 * @property string $site
 * @property string $status
 * @property string $changed
 *
 * @property \models\Advert[] $adverts
 * @property \models\User $user
 * @property \models\SellerPhone[] $sellerPhones
 */
class BaseSeller extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'seller';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseSellerPeer::USER_ID], 'integer'],
            [[BaseSellerPeer::TYPE, BaseSellerPeer::NAME, BaseSellerPeer::INFO, BaseSellerPeer::SITE], 'required'],
            [[BaseSellerPeer::INFO, BaseSellerPeer::STATUS], 'string'],
            [[BaseSellerPeer::CHANGED], 'safe'],
            [[BaseSellerPeer::TYPE], 'string', 'max' => 6],
            [[BaseSellerPeer::NAME, BaseSellerPeer::SITE], 'string', 'max' => 128],
            [[BaseSellerPeer::USER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseUser::className(), 'targetAttribute' => [BaseSellerPeer::USER_ID => BaseUserPeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseSellerPeer::ID => 'ID',
            BaseSellerPeer::USER_ID => 'User ID',
            BaseSellerPeer::TYPE => 'Type',
            BaseSellerPeer::NAME => 'Name',
            BaseSellerPeer::INFO => 'Info',
            BaseSellerPeer::SITE => 'Site',
            BaseSellerPeer::STATUS => 'Status',
            BaseSellerPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\AdvertQuery
     */
    public function getAdverts() {
        return $this->hasMany(\models\Advert::className(), [BaseAdvertPeer::SELLER_ID => BaseSellerPeer::ID]);
    }
        /**
     * @return \models\UserQuery
     */
    public function getUser() {
        return $this->hasOne(\models\User::className(), [BaseUserPeer::ID => BaseSellerPeer::USER_ID]);
    }
        /**
     * @return \models\SellerPhoneQuery
     */
    public function getSellerPhones() {
        return $this->hasMany(\models\SellerPhone::className(), [BaseSellerPhonePeer::SELLER_ID => BaseSellerPeer::ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\SellerQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\SellerQuery(get_called_class());
    }
}
