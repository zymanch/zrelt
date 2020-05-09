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

class AdvertController extends \components\Controller
{

    public $layout = self::LAYOUT_DEFAULT_MENU;


    const PERMISSION_VIEW = \components\AuthManager::GUEST;
    const PERMISSION_INDEX = \components\AuthManager::GUEST;
    const PERMISSION_MAP = \components\AuthManager::GUEST;
    const PERMISSION_UPDATE = \components\AuthManager::USER;
    const PERMISSION_ADMIN = \components\AuthManager::MANAGER;
    const PERMISSION_DELETE = \components\AuthManager::USER;
    const PERMISSION_CREATE = \components\AuthManager::USER;


    public function init()
    {
        parent::init();
        $this->_initAdvertMenu();
    }

    private function _initAdvertMenu()
    {
        $user = \Yii::$app->user;
        $id = \Yii::$app->request->get('id');
        if (!$id) {
            return;
        }
        if ($user->can(AdvertController::PERMISSION_VIEW, $id)) {
            $this->menu['advert']['items'][] = ['label'=>'Просмотр', 'url'=>['advert/view','id'=>$id]];
        }
        if ($user->can(AdvertController::PERMISSION_UPDATE, $id)) {
            $this->menu['advert']['items'][] = ['label'=>'Редактировать', 'url'=>['advert/update','id'=>$id]];
        }
        if ($user->can(AdvertController::PERMISSION_DELETE, $id)) {
            $this->menu['advert']['items'][] = ['label'=>'Удалить', 'url'=>['advert/delete','id'=>$id]];
        }
    }
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow'=>true,'actions'=>['index'],'roles'=>[self::PERMISSION_INDEX]],
                    ['allow'=>true,'actions'=>['view'],'roles'=>[self::PERMISSION_VIEW]],
                    ['allow'=>true,'actions'=>['map'],'roles'=>[self::PERMISSION_MAP]],
                    ['allow'=>true,'actions'=>['create'],'roles'=>[self::PERMISSION_CREATE]],
                    ['allow'=>true,'actions'=>['update'],'roles'=>[self::PERMISSION_UPDATE]],
                    ['allow'=>true,'actions'=>['admin'],'roles'=>[self::PERMISSION_ADMIN]],
                    ['allow'=>true,'actions'=>['delete'],'roles'=>[self::PERMISSION_DELETE]],
                ],
            ],
        ];
    }


    /**
     * Lists all models.
     */
    public function actionIndex()
    {
        $advert = new SearchAdvert();
        $advert->setAttributes($_GET);
        if (!$advert->validate() ) {
            $advert->refresh();
        }
        return $this->render('index',array(
            'model' => $advert,
        ));
    }

    public function actionMap() {
	    $this->layout = self::LAYOUT_RIGHT_MENU;
        $advert = new SearchAdvert();
        $advert->setAttributes($_GET);
        if (!$advert->validate() ) {
            $advert->refresh();
        }
        return $this->render('map',array(
            'model' => $advert,
        ));
    }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
        return $this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
	    /** @var User $user */
	    $user = \Yii::$app->user->identity;
		$model=new Advert;
        if ($user->seller_id) {
            $model->seller_id = $user->seller_id;
        }
        $uploader = new ImageUploader($model);
		if($model->load($_POST)) {
			$address = AddressQuery::model()->findOrCreate($model->address_name);
			$model->address_id = $address?$address->id : null;
            if ($user->type === User::TYPE_USER) {
                $model->seller_id = $user->seller_id;
            }
			if($model->save()) {
                \Yii::$app->session->setFlash('success','Объявление успешно создано');
                $this->redirect(array('view', 'id' => $model->id));
            }
		}

        return $this->render('create',array(
			'model'=>$model,
            'uploader' => $uploader
		));
	}

    /**
     * @param $id
     * @return string
     * @throws ForbiddenHttpException
     * @throws NotFoundHttpException
     */
    public function actionUpdate($id)
	{
        /** @var User $user */
        $user = \Yii::$app->user->identity;
		$model=$this->loadModel($id);
        if ($user->type === User::TYPE_USER && $model->seller_id!==$user->seller_id) {
            throw new ForbiddenHttpException();
        }
        $model->address_name = (string)$model->address;
        $uploader = new ImageUploader($model);
		if($model->load($_POST)) {
            $address = AddressQuery::model()->findOrCreate($model->address_name);
            $model->address_id = $address?$address->id : null;
            if ($user->type === User::TYPE_USER) {
                $model->seller_id = $user->seller_id;
            }
			if($model->save()) {
                $uploader->files = UploadedFile::getInstances($uploader, 'files');
                if ($uploader->upload()) {
                    \Yii::$app->session->setFlash('success','Объявление успешно сохранено');
                } else {
                    \Yii::$app->session->setFlash('error','Ошибка загрузки файлов');
                }

                $this->redirect(array('view', 'id' => $model->id));
            }
		}

        return $this->render('update',array(
			'model'=>$model,
            'uploader' => $uploader
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(\Yii::$app->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax'])) {
                \Yii::$app->user->setFlash('success','Объявление успешно удалено');
                $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
            }
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}


	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new SearchAdvert();
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Advert']))
			$model->attributes=$_GET['Advert'];

        return $this->render('admin',array(
			'model'=>$model,
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
