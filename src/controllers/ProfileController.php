<?php
namespace controllers;

class ProfileController extends \components\Controller {

    public $layout = self::LAYOUT_RIGHT_MENU;
	/**
	 * Displays the login page
	 */
	public function actionLogin()
	{
		$model=new \forms\Login;


		if(isset($_POST['Login']))
		{
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->load(\Yii::$app->request->post()) && $model->login()) {
                return $this->redirect(\Yii::$app->user->returnUrl);
            }
		}
		// display the login form
		return $this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		\Yii::$app->user->logout();
		$this->redirect(\Yii::$app->homeUrl);
	}

    public function actionForgot()
    {
        return $this->render('forgot');
	}


    public function actionRegister()
    {
        return $this->render('register');
    }
}