<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\SellerQuery;

/**
 * This is the ActiveQuery class for [[models\Seller]].
 * @method SellerQuery filterById($value, $criteria = null)
 * @method SellerQuery filterByType($value, $criteria = null)
 * @method SellerQuery filterByName($value, $criteria = null)
 * @method SellerQuery filterByInfo($value, $criteria = null)
 * @method SellerQuery filterBySite($value, $criteria = null)
 * @method SellerQuery filterByStatus($value, $criteria = null)
 * @method SellerQuery filterByChanged($value, $criteria = null)
  * @method SellerQuery orderById($order = Criteria::ASC)
  * @method SellerQuery orderByType($order = Criteria::ASC)
  * @method SellerQuery orderByName($order = Criteria::ASC)
  * @method SellerQuery orderByInfo($order = Criteria::ASC)
  * @method SellerQuery orderBySite($order = Criteria::ASC)
  * @method SellerQuery orderByStatus($order = Criteria::ASC)
  * @method SellerQuery orderByChanged($order = Criteria::ASC)
  * @method SellerQuery withAdverts($params = [])
  * @method SellerQuery joinWithAdverts($params = null, $joinType = 'LEFT JOIN')
  * @method SellerQuery withSellerPhones($params = [])
  * @method SellerQuery joinWithSellerPhones($params = null, $joinType = 'LEFT JOIN')
 */
class BaseSellerQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Seller[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Seller|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\SellerQuery     */
    public static function model()
    {
        return new \models\SellerQuery(\models\Seller::class);
    }
}
