<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\ImageQuery;

/**
 * This is the ActiveQuery class for [[models\Image]].
 * @method ImageQuery filterById($value, $criteria = null)
 * @method ImageQuery filterByAdvertId($value, $criteria = null)
 * @method ImageQuery filterByType($value, $criteria = null)
 * @method ImageQuery filterByWidth($value, $criteria = null)
 * @method ImageQuery filterByHeight($value, $criteria = null)
 * @method ImageQuery filterByFilename($value, $criteria = null)
 * @method ImageQuery filterByCreated($value, $criteria = null)
  * @method ImageQuery orderById($order = Criteria::ASC)
  * @method ImageQuery orderByAdvertId($order = Criteria::ASC)
  * @method ImageQuery orderByType($order = Criteria::ASC)
  * @method ImageQuery orderByWidth($order = Criteria::ASC)
  * @method ImageQuery orderByHeight($order = Criteria::ASC)
  * @method ImageQuery orderByFilename($order = Criteria::ASC)
  * @method ImageQuery orderByCreated($order = Criteria::ASC)
  * @method ImageQuery withAdvert($params = [])
  * @method ImageQuery joinWithAdvert($params = null, $joinType = 'LEFT JOIN')
 */
class BaseImageQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\Image[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\Image|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\ImageQuery     */
    public static function model()
    {
        return new \models\ImageQuery(\models\Image::class);
    }
}
