<?php

namespace models\base;



/**
 * This is the model class for table "zrelt.source".
 *
 * @property integer $id
 * @property string $name
 * @property string $shortname
 * @property string $url
 * @property string $status
 * @property string $changed
 */
class BaseSource extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'zrelt.source';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [[BaseSourcePeer::NAME, BaseSourcePeer::SHORTNAME, BaseSourcePeer::URL], 'required'],
            [[BaseSourcePeer::STATUS], 'string'],
            [[BaseSourcePeer::CHANGED], 'safe'],
            [[BaseSourcePeer::NAME, BaseSourcePeer::URL], 'string', 'max' => 64],
            [[BaseSourcePeer::SHORTNAME], 'string', 'max' => 32],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            BaseSourcePeer::ID => 'ID',
            BaseSourcePeer::NAME => 'Name',
            BaseSourcePeer::SHORTNAME => 'Shortname',
            BaseSourcePeer::URL => 'Url',
            BaseSourcePeer::STATUS => 'Status',
            BaseSourcePeer::CHANGED => 'Changed',
        ];
    }

    /**
     * @inheritdoc
     * @return \models\SourceQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new \models\SourceQuery(get_called_class());
    }
}
