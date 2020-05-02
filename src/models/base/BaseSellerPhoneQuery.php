<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\SellerPhoneQuery;

/**
 * This is the ActiveQuery class for [[models\SellerPhone]].
 * @method SellerPhoneQuery filterById($value, $criteria = null)
 * @method SellerPhoneQuery filterBySellerId($value, $criteria = null)
 * @method SellerPhoneQuery filterByPhone($value, $criteria = null)
 * @method SellerPhoneQuery filterByStatus($value, $criteria = null)
 * @method SellerPhoneQuery filterByChanged($value, $criteria = null)
  * @method SellerPhoneQuery orderById($order = Criteria::ASC)
  * @method SellerPhoneQuery orderBySellerId($order = Criteria::ASC)
  * @method SellerPhoneQuery orderByPhone($order = Criteria::ASC)
  * @method SellerPhoneQuery orderByStatus($order = Criteria::ASC)
  * @method SellerPhoneQuery orderByChanged($order = Criteria::ASC)
  * @method SellerPhoneQuery withSeller($params = [])
  * @method SellerPhoneQuery joinWithSeller($params = null, $joinType = 'LEFT JOIN')
 */
class BaseSellerPhoneQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\SellerPhone[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\SellerPhone|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\SellerPhoneQuery     */
    public static function model()
    {
        return new \models\SellerPhoneQuery(\models\SellerPhone::class);
    }
}
