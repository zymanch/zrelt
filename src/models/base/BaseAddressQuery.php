<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\AddressQuery;

/**
 * This is the ActiveQuery class for [[models\Address]].
 * @method AddressQuery filterById($value, $criteria = null)
 * @method AddressQuery filterByComplex($value, $criteria = null)
 * @method AddressQuery filterByComplexHouse($value, $criteria = null)
 * @method AddressQuery filterByComplexStructure($value, $criteria = null)
 * @method AddressQuery filterByStreet($value, $criteria = null)
 * @method AddressQuery filterByStreetHouse($value, $criteria = null)
 * @method AddressQuery filterByStreetStructure($value, $criteria = null)
 * @method AddressQuery filterByMapX($value, $criteria = null)
 * @method AddressQuery filterByMapY($value, $criteria = null)
 * @method AddressQuery filterByConstructionYear($value, $criteria = null)
 * @method AddressQuery filterByStatus($value, $criteria = null)
 * @method AddressQuery filterByChanged($value, $criteria = null)
  * @method AddressQuery orderById($order = Criteria::ASC)
  * @method AddressQuery orderByComplex($order = Criteria::ASC)
  * @method AddressQuery orderByComplexHouse($order = Criteria::ASC)
  * @method AddressQuery orderByComplexStructure($order = Criteria::ASC)
  * @method AddressQuery orderByStreet($order = Criteria::ASC)
  * @method AddressQuery orderByStreetHouse($order = Criteria::ASC)
  * @method AddressQuery orderByStreetStructure($order = Criteria::ASC)
  * @method AddressQuery orderByMapX($order = Criteria::ASC)
  * @method AddressQuery orderByMapY($order = Criteria::ASC)
  * @method AddressQuery orderByConstructionYear($order = Criteria::ASC)
  * @method AddressQuery orderByStatus($order = Criteria::ASC)
  * @method AddressQuery orderByChanged($order = Criteria::ASC)
  * @method AddressQuery withAdverts($params = [])
  * @method AddressQuery joinWithAdverts($params = null, $joinType = 'LEFT JOIN')
 */
class BaseAddressQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Address[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Address|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\AddressQuery     */
    public static function model()
    {
        return new \models\AddressQuery(\models\Address::class);
    }
}
