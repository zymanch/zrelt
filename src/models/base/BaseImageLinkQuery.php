<?php

namespace models\base;
use ActiveGenerator\Criteria;
use models\ImageLinkQuery;

/**
 * This is the ActiveQuery class for [[models\ImageLink]].
 * @method ImageLinkQuery filterById($value, $criteria = null)
 * @method ImageLinkQuery filterByFromImageId($value, $criteria = null)
 * @method ImageLinkQuery filterByToImageId($value, $criteria = null)
 * @method ImageLinkQuery filterByX($value, $criteria = null)
 * @method ImageLinkQuery filterByY($value, $criteria = null)
  * @method ImageLinkQuery orderById($order = Criteria::ASC)
  * @method ImageLinkQuery orderByFromImageId($order = Criteria::ASC)
  * @method ImageLinkQuery orderByToImageId($order = Criteria::ASC)
  * @method ImageLinkQuery orderByX($order = Criteria::ASC)
  * @method ImageLinkQuery orderByY($order = Criteria::ASC)
  * @method ImageLinkQuery withFromImage($params = [])
  * @method ImageLinkQuery joinWithFromImage($params = null, $joinType = 'LEFT JOIN')
  * @method ImageLinkQuery withToImage($params = [])
  * @method ImageLinkQuery joinWithToImage($params = null, $joinType = 'LEFT JOIN')
 */
class BaseImageLinkQuery extends \yii\db\ActiveQuery
{


    use \ActiveGenerator\base\RichActiveMethods;

    /**
     * @inheritdoc
     * @return \models\ImageLink[]|array
     */
    public function all($db = null)
    {
        return parent::all($db);
    }

    /**
     * @inheritdoc
     * @return \models\ImageLink|array|null
     */
    public function one($db = null)
    {
        return parent::one($db);
    }

    /**
     * @return \models\ImageLinkQuery     */
    public static function model()
    {
        return new \models\ImageLinkQuery(\models\ImageLink::class);
    }
}
