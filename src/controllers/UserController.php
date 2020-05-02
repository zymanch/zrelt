<?php
namespace controllers;

use models\search\SearchUser;
use models\User;
use yii\filters\AccessControl;
use yii\web\NotFoundHttpException;

class UserController extends \components\Controller
{

    const PERMISSION_INDEX = \components\AuthManager::MANAGER;
    const PERMISSION_UPDATE = \components\AuthManager::ADMIN;
    const PERMISSION_DELETE = \components\AuthManager::ADMIN;
    const PERMISSION_CREATE = \components\AuthManager::ADMIN;



    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'rules' => [
                    ['allow'=>true,'actions'=>['index'],'roles'=>[self::PERMISSION_INDEX]],
                    ['allow'=>true,'actions'=>['update'],'roles'=>[self::PERMISSION_UPDATE]],
                    ['allow'=>true,'actions'=>['delete'],'roles'=>[self::PERMISSION_DELETE]],
                    ['allow'=>true,'actions'=>['create'],'roles'=>[self::PERMISSION_CREATE]],
                ],
            ],
        ];
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new \models\User;
		$model->scenario = \models\User::SCENARIO_CREATE;
        $model->type = User::TYPE_MANAGER;
        $model->auth_key = md5(rand(0,time()).rand(0,time()).__CLASS__);
		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if($model->load(\Yii::$app->request->post()) && $model->validate()) {
		    $model->auth_key = $model->generateAuthKey();
			if($model->save()) {
                $model->setPassword($model->password)->save(false);
                \Yii::$app->session->setFlash('success','Аккаунт успешно создан');
                return $this->redirect(array('update', 'id' => $model->id));
            }
		}

		return $this->render('create',array(
			'model'=>$model,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);
        $oldPassword = $model->password;
		if($model->load(\Yii::$app->request->post()) && $model->validate()){
		    if ($model->password) {
                $model->setPassword($model->password);
            } else {
		        $model->password = $oldPassword;
            }
			if($model->save()) {
			    \Yii::$app->session->setFlash('success','Успешно сохранено');
                return $this->redirect(array('update', 'id' => $model->id));
            }
		}

        return $this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax'])) {
            \Yii::$app->session->setFlash('success','Пользователь успешно удален');
            return $this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
        }
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$model=new SearchUser();
        return $this->render('index',array(
			'model'=>$model,
		));
	}

	public function loadModel($id)
	{
		$model=\models\User::find()->filterById((int)$id)->one();
		if($model===null)
			throw new NotFoundHttpException('Пользователь не найден.');
        $model->scenario = \models\User::SCENARIO_UPDATE;
		return $model;
	}

}
