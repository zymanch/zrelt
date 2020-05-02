<?php
/**
 * @link http://www.yiiframework.com/
 * @copyright Copyright (c) 2008 Yii Software LLC
 * @license http://www.yiiframework.com/license/
 */

namespace commands;


use yii\console\Controller;

class UserController extends Controller
{


    public $username;
    public $email;
    public $password;

    public function options($actionID)
    {
        return ['username', 'email','password'];
    }


    public function actionCreate()
    {
       $projects = Project::find()->all();
       $user = User::create();
       $user->username = $this->username;
       $user->email = $this->email;
       $user->white_ips = '127.0.0.1,185.120.71.3';
       $user->role = User::ROLE_ADMIN;
       $user->setInputPassword($this->password);
       $user->setProjects($projects);
       if (!$user->save()) {
           throw new \Exception('Error durring create user: '.json_encode($user->getFirstErrors()));
       }
       foreach ($projects as $project) {
           $link = new UserHasProject();
           $link->user_id = $user->user_id;
           $link->project_id = $project->project_id;
           $link->save(false);
       }
    }


}
