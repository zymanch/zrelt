<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\UserQuery;

/**
 * This is the ActiveQuery class for [[models\User]].
 * @method UserQuery filterById($value, $criteria = null)
 * @method UserQuery filterBySellerId($value, $criteria = null)
 * @method UserQuery filterByType($value, $criteria = null)
 * @method UserQuery filterByEmail($value, $criteria = null)
 * @method UserQuery filterByPhone($value, $criteria = null)
 * @method UserQuery filterByPassword($value, $criteria = null)
 * @method UserQuery filterByAuthKey($value, $criteria = null)
 * @method UserQuery filterByCreated($value, $criteria = null)
 * @method UserQuery filterByStatus($value, $criteria = null)
 * @method UserQuery filterByChanged($value, $criteria = null)
  * @method UserQuery orderById($order = Criteria::ASC)
  * @method UserQuery orderBySellerId($order = Criteria::ASC)
  * @method UserQuery orderByType($order = Criteria::ASC)
  * @method UserQuery orderByEmail($order = Criteria::ASC)
  * @method UserQuery orderByPhone($order = Criteria::ASC)
  * @method UserQuery orderByPassword($order = Criteria::ASC)
  * @method UserQuery orderByAuthKey($order = Criteria::ASC)
  * @method UserQuery orderByCreated($order = Criteria::ASC)
  * @method UserQuery orderByStatus($order = Criteria::ASC)
  * @method UserQuery orderByChanged($order = Criteria::ASC)
  * @method UserQuery withSeller($params = [])
  * @method UserQuery joinWithSeller($params = null, $joinType = 'LEFT JOIN')
 */
class BaseUserQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\User[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\User|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\UserQuery     */
    public static function model()
    {
        return new \models\UserQuery(\models\User::class);
    }
}
