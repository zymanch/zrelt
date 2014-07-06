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
 * @property integer $space_total
 * @property integer $space_living
 * @property integer $space_cookroom
 * @property integer $balcony
 * @property integer $phone
 * @property string $steel_door
 * @property string $information
 * @property integer $price
 * @property string $seller_id
 * @property string $source_id
 * @property string $url
 * @property string $created
 * @property string $expired
 * @property string $status
 * @property string $changed
 *
 * The followings are the available model relations:
 * @property Seller $seller
 * @property Source $source
 * @property Address $address
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
			array('type, address_id, seller_id, source_id, url', 'required'),
			array('floor_max, space_total, space_living, space_cookroom, balcony, price', 'numerical', 'integerOnly'=>true),
			array('type', 'length', 'max'=>12),
			array('information', 'safe'),
			array('address_id, floor, seller_id, source_id', 'length', 'max'=>10),
			array('steel_door, phone', 'length', 'max'=>3),
			array('url', 'length', 'max'=>256),
			array('status', 'length', 'max'=>7),
			array('created, expired', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, type, address_id, floor, floor_max, space_total, space_living, space_cookroom, balcony, phone, steel_door, information, price, seller_id, source_id, url, created, expired, status, changed', 'safe', 'on'=>'search'),
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
			'seller' => array(self::BELONGS_TO, 'Seller', 'seller_id'),
			'source' => array(self::BELONGS_TO, 'Source', 'source_id'),
			'address' => array(self::BELONGS_TO, 'Address', 'address_id'),
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
			'source_id' => 'Source',
			'url' => 'Url',
			'created' => 'Created',
			'expired' => 'Expired',
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
		$criteria->compare('space_total',$this->space_total);
		$criteria->compare('space_living',$this->space_living);
		$criteria->compare('space_cookroom',$this->space_cookroom);
		$criteria->compare('balcony',$this->balcony);
		$criteria->compare('phone',$this->phone);
		$criteria->compare('steel_door',$this->steel_door,true);
		$criteria->compare('information',$this->information,true);
		$criteria->compare('price',$this->price);
		$criteria->compare('seller_id',$this->seller_id,true);
		$criteria->compare('source_id',$this->source_id,true);
		$criteria->compare('url',$this->url,true);
		$criteria->compare('created',$this->created,true);
		$criteria->compare('expired',$this->expired,true);
		$criteria->compare('status',$this->status,true);
		$criteria->compare('changed',$this->changed,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
            'pagination' => array('pageSize' => 60)
		));
	}

}
