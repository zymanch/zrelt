<?php
namespace controllers;
use components\ImageUploader;
use models\AddressQuery;
use models\Advert;
use models\search\SearchAdvert;
use models\User;
use yii\filters\AccessControl;
use yii\web\ForbiddenHttpException;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;

class PanoramaController extends \components\Controller
{

    public $layout = null;


    const PERMISSION_VIEW = \components\AuthManager::GUEST;


    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow'=>true,'actions'=>['view'],'roles'=>[self::PERMISSION_VIEW]],
                ],
            ],
        ];
    }


    public function actionView($id)
    {
        $model = $this->loadModel($id);
        $images = $model->getPanoramas();
        if (!$images) {
            throw new NotFoundHttpException('Панорама не найдена');
        }
        return $this->render('view',array(
            'model'=>$model,
            'images'=>$images,
        ));
	}

    /**
     * @param integer the ID of the model to be loaded
     * @return Advert|null
     * @throws NotFoundHttpException
     */
	public function loadModel($id)
	{
		$model=Advert::findOne((int)$id);
		if($model===null)
			throw new NotFoundHttpException('The requested page does not exist.');
		return $model;
	}


}
