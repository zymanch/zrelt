<?php

namespace models\base;



/**
 * This is the model class for table "zrelt.seller_phone".
 *
 * @property integer $id
 * @property integer $seller_id
 * @property string $phone
 * @property string $status
 * @property string $changed
 *
 * @property \models\Seller $seller
 */
class BaseSellerPhone extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zrelt.seller_phone';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseSellerPhonePeer::SELLER_ID, BaseSellerPhonePeer::PHONE], 'required'],
            [[BaseSellerPhonePeer::SELLER_ID], 'integer'],
            [[BaseSellerPhonePeer::STATUS], 'string'],
            [[BaseSellerPhonePeer::CHANGED], 'safe'],
            [[BaseSellerPhonePeer::PHONE], 'string', 'max' => 16],
            [[BaseSellerPhonePeer::SELLER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseSeller::className(), 'targetAttribute' => [BaseSellerPhonePeer::SELLER_ID => BaseSellerPeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseSellerPhonePeer::ID => 'ID',
            BaseSellerPhonePeer::SELLER_ID => 'Seller ID',
            BaseSellerPhonePeer::PHONE => 'Phone',
            BaseSellerPhonePeer::STATUS => 'Status',
            BaseSellerPhonePeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\SellerQuery
     */
    public function getSeller() {
        return $this->hasOne(\models\Seller::className(), [BaseSellerPeer::ID => BaseSellerPhonePeer::SELLER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\SellerPhoneQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\SellerPhoneQuery(get_called_class());
    }
}
