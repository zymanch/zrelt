<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\AdvertQuery;

/**
 * This is the ActiveQuery class for [[models\Advert]].
 * @method AdvertQuery filterById($value, $criteria = null)
 * @method AdvertQuery filterByType($value, $criteria = null)
 * @method AdvertQuery filterByAddressId($value, $criteria = null)
 * @method AdvertQuery filterByFloor($value, $criteria = null)
 * @method AdvertQuery filterByFloorMax($value, $criteria = null)
 * @method AdvertQuery filterBySpaceTotal($value, $criteria = null)
 * @method AdvertQuery filterBySpaceLiving($value, $criteria = null)
 * @method AdvertQuery filterBySpaceCookroom($value, $criteria = null)
 * @method AdvertQuery filterByBalcony($value, $criteria = null)
 * @method AdvertQuery filterByPhone($value, $criteria = null)
 * @method AdvertQuery filterBySteelDoor($value, $criteria = null)
 * @method AdvertQuery filterByInformation($value, $criteria = null)
 * @method AdvertQuery filterByExchange($value, $criteria = null)
 * @method AdvertQuery filterByPrice($value, $criteria = null)
 * @method AdvertQuery filterBySellerId($value, $criteria = null)
 * @method AdvertQuery filterBySourceCode($value, $criteria = null)
 * @method AdvertQuery filterBySourceId($value, $criteria = null)
 * @method AdvertQuery filterByUrl($value, $criteria = null)
 * @method AdvertQuery filterByCreated($value, $criteria = null)
 * @method AdvertQuery filterByExpired($value, $criteria = null)
 * @method AdvertQuery filterByStatus($value, $criteria = null)
 * @method AdvertQuery filterByChanged($value, $criteria = null)
  * @method AdvertQuery orderById($order = Criteria::ASC)
  * @method AdvertQuery orderByType($order = Criteria::ASC)
  * @method AdvertQuery orderByAddressId($order = Criteria::ASC)
  * @method AdvertQuery orderByFloor($order = Criteria::ASC)
  * @method AdvertQuery orderByFloorMax($order = Criteria::ASC)
  * @method AdvertQuery orderBySpaceTotal($order = Criteria::ASC)
  * @method AdvertQuery orderBySpaceLiving($order = Criteria::ASC)
  * @method AdvertQuery orderBySpaceCookroom($order = Criteria::ASC)
  * @method AdvertQuery orderByBalcony($order = Criteria::ASC)
  * @method AdvertQuery orderByPhone($order = Criteria::ASC)
  * @method AdvertQuery orderBySteelDoor($order = Criteria::ASC)
  * @method AdvertQuery orderByInformation($order = Criteria::ASC)
  * @method AdvertQuery orderByExchange($order = Criteria::ASC)
  * @method AdvertQuery orderByPrice($order = Criteria::ASC)
  * @method AdvertQuery orderBySellerId($order = Criteria::ASC)
  * @method AdvertQuery orderBySourceCode($order = Criteria::ASC)
  * @method AdvertQuery orderBySourceId($order = Criteria::ASC)
  * @method AdvertQuery orderByUrl($order = Criteria::ASC)
  * @method AdvertQuery orderByCreated($order = Criteria::ASC)
  * @method AdvertQuery orderByExpired($order = Criteria::ASC)
  * @method AdvertQuery orderByStatus($order = Criteria::ASC)
  * @method AdvertQuery orderByChanged($order = Criteria::ASC)
  * @method AdvertQuery withAddress($params = [])
  * @method AdvertQuery joinWithAddress($params = null, $joinType = 'LEFT JOIN')
  * @method AdvertQuery withSeller($params = [])
  * @method AdvertQuery joinWithSeller($params = null, $joinType = 'LEFT JOIN')
 */
class BaseAdvertQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Advert[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Advert|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\AdvertQuery     */
    public static function model()
    {
        return new \models\AdvertQuery(\models\Advert::class);
    }
}
