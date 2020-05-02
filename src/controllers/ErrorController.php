<?php
namespace controllers;

/**
 * Site controller
 */
class ErrorController extends \components\Controller
{
    public $layout = self::LAYOUT_DEFAULT_MENU;


    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
        ];
    }

}
