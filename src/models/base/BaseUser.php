<?php

namespace models\base;



/**
 * This is the model class for table "user".
 *
 * @property integer $id
 * @property string $type
 * @property string $email
 * @property string $phone
 * @property string $password
 * @property string $auth_key
 * @property string $created
 * @property string $status
 * @property string $changed
 *
 * @property \models\Seller[] $sellers
 */
class BaseUser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'user';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseUserPeer::TYPE, BaseUserPeer::STATUS], 'string'],
            [[BaseUserPeer::EMAIL, BaseUserPeer::PASSWORD, BaseUserPeer::AUTH_KEY], 'required'],
            [[BaseUserPeer::PHONE], 'integer'],
            [[BaseUserPeer::CREATED, BaseUserPeer::CHANGED], 'safe'],
            [[BaseUserPeer::EMAIL, BaseUserPeer::PASSWORD], 'string', 'max' => 50],
            [[BaseUserPeer::AUTH_KEY], 'string', 'max' => 64],
            [[BaseUserPeer::EMAIL], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseUserPeer::ID => 'ID',
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
    public function getSellers() {
        return $this->hasMany(\models\Seller::className(), [BaseSellerPeer::USER_ID => BaseUserPeer::ID]);
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
