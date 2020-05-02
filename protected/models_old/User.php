<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:11
 */
class User extends CUser {

    const TYPE_USER = 'user';
    const TYPE_MANAGER = 'manager';
    const TYPE_ADMIN = 'admin';

    public function buildPasswordHash($password)
    {
        return sha1($this->id.$password.Yii::app()->params['salt']);
    }



    public function attributeLabels()
    {
        return array(
            'id' => 'ID',
            'type' => 'Тип',
            'email' => 'Email',
            'phone' => 'Телефон',
            'password' => 'Пароль',
            'created' => 'Дата создания',
        );
    }
}