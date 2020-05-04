<?php
namespace controllers;
use models\AddressQuery;
use models\Advert;
use models\search\SearchAddress;
use models\search\SearchAdvert;
use models\User;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;

class AddressController extends \components\Controller
{

    public $layout = self::LAYOUT_DEFAULT_MENU;


    const PERMISSION_AUTOCOMPLETE = \components\AuthManager::USER;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow'=>true,'actions'=>['autocomplete'],'roles'=>[self::PERMISSION_AUTOCOMPLETE]],
                ],
            ],
        ];
    }


    /**
     * Lists all models.
     */
    public function actionAutocomplete($term)
    {
        $address = new SearchAddress();
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;
        $result = $address->autocomplete($term);
        return ['items'=>array_map('strval',$result)];
    }


}
