<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace commands;

use yii\console\Controller;

class ArController extends Controller
{

    public $tables;

    public function options($actionID)
    {
        return ['tables'];
    }

    public function actionIndex()
    {
        if (!$this->tables) {
            // not for all tables need AR
            $this->tables = 'zrelt:' . implode(',', [
                    'address',
                    'advert',
                    'seller',
                    'seller_phone',
                    'source',
                    'user',
                ]);
        }
        $helper = new \ActiveGenerator\generator\ScriptHelper();
        $helper->baseClass = 'yii\db\ActiveRecord';
        $helper->queryBaseClass = 'yii\db\ActiveQuery';
        $helper->namespace = 'models';
        $helper->prefix = 'Base';
        $helper->sub = 'base';
        $helper->path = \Yii::getAlias('@models');
        $helper->generate(
            \Yii::$app->db->masterPdo,
            $this->tables
        );
    }

}
