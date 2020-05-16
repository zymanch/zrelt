<?php
namespace models\search;
use models\Advert;
use models\base\BaseAddressPeer;
use models\base\BaseAdvertPeer;
use models\base\BaseUserPeer;
use yii\data\ActiveDataProvider;

/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 28.06.14
 * Time: 21:50
 */
class SearchAdvert extends \models\base\BaseAdvert {


    const FILTER_SPACE_TOTAL_FROM = "space_total_from";
    const FILTER_SPACE_TOTAL_TO = "space_total_to";
    const FILTER_SPACE_LIVING_FROM = "space_living_from";
    const FILTER_SPACE_LIVING_TO = "space_living_to";
    const FILTER_SPACE_COOKROOM_FROM = "space_cookroom_from";
    const FILTER_SPACE_COOKROOM_TO = "space_cookroom_to";
    const FILTER_FLOOR_FROM = "floor_from";
    const FILTER_FLOOR_TO = "floor_to";
    const FILTER_FLOOR_MAX_FROM = "floor_max_from";
    const FILTER_FLOOR_MAX_TO = "floor_max_to";
    const FILTER_PRICE_FROM = "price_from";
    const FILTER_PRICE_TO = "price_to";
    const FILTER_COMPLEX = "complex";
    const FILTER_STEEL_DOOR = "steel_door";
    const FILTER_PHONE = "phone";
    const FILTER_BALCONY = "balcony";
    const FILTER_TYPE = "type";
    const FILTER_USER_ID = "user_id";
    const FILTER_SELLER_ID = "seller_id";


    public $space_total_from;
    public $space_total_to;
    public $space_living_from;
    public $space_living_to;
    public $space_cookroom_from;
    public $space_cookroom_to;
    public $floor_from;
    public $floor_to;
    public $floor_max_from;
    public $floor_max_to;
    public $price_from;
    public $price_to;
    public $complex;
    public $steel_door;
    public $phone;
    public $balcony;
    public $type;
    public $user_id;
    public $seller_id;

    public function rules() {
        // NOTE: you should only define rules for those attributes that
        // will receive user inputs.
        return [
            [[self::FILTER_SPACE_TOTAL_FROM, self::FILTER_SPACE_TOTAL_TO], 'integer'],
            [[self::FILTER_SPACE_LIVING_FROM,self::FILTER_SPACE_LIVING_TO], 'integer'],
            [[self::FILTER_SPACE_COOKROOM_FROM,self::FILTER_SPACE_COOKROOM_TO], 'integer'],
            [[self::FILTER_SPACE_COOKROOM_FROM,self::FILTER_SPACE_COOKROOM_TO], 'integer'],
            [[self::FILTER_FLOOR_FROM,self::FILTER_FLOOR_TO],'integer'],
            [[self::FILTER_FLOOR_MAX_FROM,self::FILTER_FLOOR_MAX_TO], 'integer'],
            [[self::FILTER_PRICE_FROM,self::FILTER_PRICE_TO], 'integer'],
            [[self::FILTER_COMPLEX], 'string','max' => 12],
            [[self::FILTER_BALCONY,self::FILTER_STEEL_DOOR, self::FILTER_PHONE], 'string','max' => 3],
            [[self::FILTER_TYPE], 'string','max' => 12],
            [[self::FILTER_USER_ID,self::FILTER_SELLER_ID], 'integer'],
        ];
    }

    public function search($count = 60) {
        $query = Advert::find();
        $dataProvider = new ActiveDataProvider([
            'query' => $query,
            'pagination' => [
                'pageSize' => $count,
            ],
            'sort' => [
                'attributes' => [
                    'type',
                    'floor',
                    'floor_max',
                    'space_total',
                    'space_cookroom',
                    'price',
                    'created',
                ]
            ]
        ]);
        $query->joinWith('seller', true);
        $query->joinWith('address', true);
        $query->andFilterCompare(BaseAdvertPeer::TYPE,$this->type);
        if ($this->balcony) {
            $query->andWhere(['>',BaseAdvertPeer::BALCONY,0]);
        }
        if ($this->steel_door) {
            $query->andWhere([BaseAdvertPeer::STEEL_DOOR,Advert::STEEL_DOOR_YES]);
        }
        if ($this->phone) {
            $query->andWhere([BaseAdvertPeer::PHONE,Advert::PHONE_YES]);
        }
        if ($this->complex) {
            $complex = array_filter(explode(',',$this->complex));
            $query->andWhere(['in',BaseAddressPeer::COMPLEX,$complex]);
        }
        if ($this->user_id) {
            $query
                ->joinWith('seller.user', false)
                ->andWhere(['=','user.'.BaseUserPeer::ID, $this->user_id]);
        }
        $query
            ->andFilterCompare(BaseAdvertPeer::SELLER_ID, $this->seller_id)
            ->andFilterCompare(BaseAdvertPeer::FLOOR,$this->floor_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::FLOOR,$this->floor_to, '<=')

            ->andFilterCompare(BaseAdvertPeer::FLOOR_MAX,$this->floor_max_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::FLOOR_MAX,$this->floor_max_to, '<=')

            ->andFilterCompare(BaseAdvertPeer::SPACE_TOTAL,$this->space_total_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::SPACE_TOTAL,$this->space_total_to, '<=')

            ->andFilterCompare(BaseAdvertPeer::SPACE_LIVING,$this->space_total_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::SPACE_LIVING,$this->space_total_to, '<=')

            ->andFilterCompare(BaseAdvertPeer::SPACE_COOKROOM,$this->space_cookroom_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::SPACE_COOKROOM,$this->space_cookroom_to, '<=')

            ->andFilterCompare(BaseAdvertPeer::PRICE,$this->price_from, '>=')
            ->andFilterCompare(BaseAdvertPeer::PRICE,$this->price_to, '<=');

        return $dataProvider;
    }

}