<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\SourceQuery;

/**
 * This is the ActiveQuery class for [[models\Source]].
 * @method SourceQuery filterById($value, $criteria = null)
 * @method SourceQuery filterByName($value, $criteria = null)
 * @method SourceQuery filterByShortname($value, $criteria = null)
 * @method SourceQuery filterByUrl($value, $criteria = null)
 * @method SourceQuery filterByStatus($value, $criteria = null)
 * @method SourceQuery filterByChanged($value, $criteria = null)
  * @method SourceQuery orderById($order = Criteria::ASC)
  * @method SourceQuery orderByName($order = Criteria::ASC)
  * @method SourceQuery orderByShortname($order = Criteria::ASC)
  * @method SourceQuery orderByUrl($order = Criteria::ASC)
  * @method SourceQuery orderByStatus($order = Criteria::ASC)
  * @method SourceQuery orderByChanged($order = Criteria::ASC)
 */
class BaseSourceQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Source[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Source|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\SourceQuery     */
    public static function model()
    {
        return new \models\SourceQuery(\models\Source::class);
    }
}
