<?php

namespace models\base;



/**
 * This is the model class for table "address".
 *
 * @property integer $id
 * @property integer $complex
 * @property string $complex_house
 * @property string $complex_structure
 * @property string $street
 * @property string $street_house
 * @property string $street_structure
 * @property string $map_x
 * @property string $map_y
 * @property integer $construction_year
 * @property string $status
 * @property string $changed
 *
 * @property \models\Advert[] $adverts
 */
class BaseAddress extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'address';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseAddressPeer::COMPLEX, BaseAddressPeer::CONSTRUCTION_YEAR], 'integer'],
            [[BaseAddressPeer::MAP_X, BaseAddressPeer::MAP_Y], 'number'],
            [[BaseAddressPeer::STATUS], 'string'],
            [[BaseAddressPeer::CHANGED], 'safe'],
            [[BaseAddressPeer::COMPLEX_HOUSE, BaseAddressPeer::COMPLEX_STRUCTURE], 'string', 'max' => 6],
            [[BaseAddressPeer::STREET], 'string', 'max' => 64],
            [[BaseAddressPeer::STREET_HOUSE, BaseAddressPeer::STREET_STRUCTURE], 'string', 'max' => 16],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseAddressPeer::ID => 'ID',
            BaseAddressPeer::COMPLEX => 'Complex',
            BaseAddressPeer::COMPLEX_HOUSE => 'Complex House',
            BaseAddressPeer::COMPLEX_STRUCTURE => 'Complex Structure',
            BaseAddressPeer::STREET => 'Street',
            BaseAddressPeer::STREET_HOUSE => 'Street House',
            BaseAddressPeer::STREET_STRUCTURE => 'Street Structure',
            BaseAddressPeer::MAP_X => 'Map X',
            BaseAddressPeer::MAP_Y => 'Map Y',
            BaseAddressPeer::CONSTRUCTION_YEAR => 'Construction Year',
            BaseAddressPeer::STATUS => 'Status',
            BaseAddressPeer::CHANGED => 'Changed',
        ];
    }
    /**
     * @return \models\AdvertQuery
     */
    public function getAdverts() {
        return $this->hasMany(\models\Advert::className(), [BaseAdvertPeer::ADDRESS_ID => BaseAddressPeer::ID]);
    }
    
    /**
     * @inheritdoc
     * @return \models\AddressQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\AddressQuery(get_called_class());
    }
}
