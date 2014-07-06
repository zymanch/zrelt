<?php

/**
 * This is the model class for table "address".
 *
 * The followings are the available columns in table 'address':
 * @property string $id
 * @property integer $complex
 * @property integer $complex_house
 * @property string $complex_structure
 * @property string $street
 * @property integer $street_house
 * @property string $street_structure
 * @property string $map_x
 * @property string $map_y
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Advert[] $adverts
 */
class CAddress extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'address';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('complex, complex_house, street_house, complex_structure, street_structure', 'length', 'max'=>12),
			array('street,', 'length', 'max'=>64),
			array('map_x, map_y', 'length', 'max'=>10),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, complex, complex_house, complex_structure, street, street_house, street_structure, map_x, map_y, status, changed', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'adverts' => array(self::HAS_MANY, 'Advert', 'address_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'complex' => 'Complex',
			'complex_house' => 'Complex House',
			'complex_structure' => 'Complex Structure',
			'street' => 'Street',
			'street_house' => 'Street House',
			'street_structure' => 'Street Structure',
			'map_x' => 'Map X',
			'map_y' => 'Map Y',
			'status' => 'Status',
			'changed' => 'Changed',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id,true);
		$criteria->compare('complex',$this->complex);
		$criteria->compare('complex_house',$this->complex_house);
		$criteria->compare('complex_structure',$this->complex_structure,true);
		$criteria->compare('street',$this->street,true);
		$criteria->compare('street_house',$this->street_house);
		$criteria->compare('street_structure',$this->street_structure,true);
		$criteria->compare('map_x',$this->map_x,true);
		$criteria->compare('map_y',$this->map_y,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
}
