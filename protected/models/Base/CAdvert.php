<?php

/**
 * This is the model class for table "advert".
 *
 * The followings are the available columns in table 'advert':
 * @property string $id
 * @property string $type
 * @property string $address_id
 * @property string $floor
 * @property integer $floor_max
 * @property integer $houseroom_total
 * @property integer $houseroom_living
 * @property integer $cookroom
 * @property integer $balcony
 * @property integer $phone
 * @property string $steel_door
 * @property string $information
 * @property integer $price
 * @property string $seller_id
 * @property string $status
 * @property string $changed
 */
class CAdvert extends ActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'advert';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('type, address_id, information, price, seller_id, changed', 'required'),
			array('floor_max, houseroom_total, houseroom_living, cookroom, balcony, phone, price', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>6),
			array('address_id, floor, seller_id', 'length', 'max'=>10),
			array('steel_door', 'length', 'max'=>3),
			array('status', 'length', 'max'=>7),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, address_id, floor, floor_max, houseroom_total, houseroom_living, cookroom, balcony, phone, steel_door, information, price, seller_id, status, changed', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'type' => 'Type',
			'address_id' => 'Address',
			'floor' => 'Floor',
			'floor_max' => 'Floor Max',
			'houseroom_total' => 'Houseroom Total',
			'houseroom_living' => 'Houseroom Living',
			'cookroom' => 'Cookroom',
			'balcony' => 'Balcony',
			'phone' => 'Phone',
			'steel_door' => 'Steel Door',
			'information' => 'Information',
			'price' => 'Price',
			'seller_id' => 'Seller',
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
		$criteria->compare('type',$this->type,true);
		$criteria->compare('address_id',$this->address_id,true);
		$criteria->compare('floor',$this->floor,true);
		$criteria->compare('floor_max',$this->floor_max);
		$criteria->compare('houseroom_total',$this->houseroom_total);
		$criteria->compare('houseroom_living',$this->houseroom_living);
		$criteria->compare('cookroom',$this->cookroom);
		$criteria->compare('balcony',$this->balcony);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('steel_door',$this->steel_door,true);
		$criteria->compare('information',$this->information,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('seller_id',$this->seller_id,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CAdvert the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
