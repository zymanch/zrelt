<?php

namespace models\base;



/**
 * This is the model class for table "zrelt.user".
 *
 * @property integer $id
 * @property integer $seller_id
 * @property string $type
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $auth_key
 * @property string $created
 * @property string $status
 * @property string $changed
 *
 * @property \models\Seller $seller
 */
class BaseUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zrelt.user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseUserPeer::SELLER_ID, BaseUserPeer::PHONE], 'integer'],
            [[BaseUserPeer::TYPE, BaseUserPeer::STATUS], 'string'],
            [[BaseUserPeer::EMAIL, BaseUserPeer::PASSWORD, BaseUserPeer::AUTH_KEY], 'required'],
            [[BaseUserPeer::CREATED, BaseUserPeer::CHANGED], 'safe'],
            [[BaseUserPeer::EMAIL, BaseUserPeer::PASSWORD], 'string', 'max' => 50],
            [[BaseUserPeer::AUTH_KEY], 'string', 'max' => 64],
            [[BaseUserPeer::EMAIL], 'unique'],
            [[BaseUserPeer::SELLER_ID], 'exist', 'skipOnError' => true, 'targetClass' => BaseSeller::className(), 'targetAttribute' => [BaseUserPeer::SELLER_ID => BaseSellerPeer::ID]],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseUserPeer::ID => 'ID',
            BaseUserPeer::SELLER_ID => 'Seller ID',
            BaseUserPeer::TYPE => 'Type',
            BaseUserPeer::EMAIL => 'Email',
            BaseUserPeer::PHONE => 'Phone',
            BaseUserPeer::PASSWORD => 'Password',
            BaseUserPeer::AUTH_KEY => 'Auth Key',
            BaseUserPeer::CREATED => 'Created',
            BaseUserPeer::STATUS => 'Status',
            BaseUserPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\SellerQuery
     */
    public function getSeller() {
        return $this->hasOne(\models\Seller::className(), [BaseSellerPeer::ID => BaseUserPeer::SELLER_ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\UserQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\UserQuery(get_called_class());
    }
}
