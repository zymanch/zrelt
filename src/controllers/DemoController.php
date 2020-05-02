<?php
namespace controllers;

use yii\filters\AccessControl;
use yii\web\Cookie;

/**
 * Callback controller
 */
class DemoController extends \module\design\Controller
{

    public $menu = [
        ['label'=>'layout','items'=>[
            ['label' => 'default','url'=>['demo/index','layout'=>self::LAYOUT_DEFAULT_MENU]],
            ['label' => 'click menu','url'=>['demo/index','layout'=>self::LAYOUT_CLICK_MENU]],
            ['label' => 'mega menu','url'=>['demo/index','layout'=>self::LAYOUT_MEGA_MENU]],
            ['label' => 'right menu','url'=>['demo/index','layout'=>self::LAYOUT_RIGHT_MENU]],
        ]],
        ['label'=>'menu2','items'=>[
            ['label' => 'sub1','url'=>'#'],
            ['label' => 'sub2','url'=>'#'],
            ['label' => 'sub3','url'=>'#'],
            ['label' => 'sub4','url'=>'#'],
        ]],
        ['label'=>'menu3','items'=>[
            ['label' => 'sub1','url'=>'#'],
            ['label' => 'sub2','url'=>'#'],
            ['label' => 'sub3','url'=>'#'],
            ['label' => 'sub4','url'=>'#'],
        ]]
    ];

    public $sub_menu = [
        ['label' => 'menu1','url'=>'#'],
        ['label' => 'menu2','url'=>'#'],
    ];

    /**
     * @inheritdoc
     *
    public function behaviors()
    {
        return array_merge(parent::behaviors(),[
            'access' => [
                'class' => AccessControl::className(),
                'rules' => [
                    [
                        'actions' => ['index'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
        ]);
    }*/


    /**
     * @return string
     * @throws \yii\base\InvalidParamException
     */
    public function actionIndex($layout = null)
    {
        if (isset(\Yii::$app->request->cookies['layout'])) {
            $this->layout = \Yii::$app->request->cookies['layout'];
        }

        if ($layout) {
            $this->layout = $layout;
            \Yii::$app->response->cookies->add(new Cookie(['name'=>'layout','value'=>$layout]));
        }
        return $this->render('index', [

        ]);
    }


}
