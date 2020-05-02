<?php
namespace models;

use models\base;

class User extends base\BaseUser implements \yii\web\IdentityInterface{

    const SCENARIO_CREATE = 'create';
    const SCENARIO_UPDATE = 'update';

    const TYPE_USER = 'user';
    const TYPE_MANAGER = 'manager';
    const TYPE_ADMIN = 'admin';

    public function rules()
    {
        $rules = parent::rules();
        $result = [];
        foreach ($rules as $rule) {
            if ($rule[1]=='required') {
                $rule['on'] = self::SCENARIO_CREATE;
                $result[] = $rule;

                $rule['on'] = self::SCENARIO_UPDATE;
                $rule[0] = array_diff($rule[0],['password']);
                $result[] = $rule;
            } else {
                $result[] = $rule;
            }
        }
        return $result;

    }

    public static function findIdentity($id) {
        return self::find()->where('id = :id', [':id' => $id])->one();
    }

    public function checkPassword($password)
    {
        return $this->password === $this->buildPasswordHash($password);
    }

    public static function findIdentityByAccessToken($token, $type = null) {
        throw new \Exception('Site not support auto authentication system');
    }

    /**
     * @return string
     * @throws \yii\base\Exception
     */
    public function generatePassword()
    {
        return \Yii::$app->getSecurity()->generateRandomString(10);
    }

    public function generateAuthKey()
    {
        return sha1($this->generatePassword());
    }


    /**
     * Returns an ID that can uniquely identify a user identity.
     * @return string|integer an ID that uniquely identifies a user identity.
     */
    public function getId() {
        return $this->id;
    }

    public function getAuthKey() {
        return $this->auth_key;
    }

    public function validateAuthKey($authKey) {
        return $this->getAuthKey() === $authKey;
    }

    public function validatePassword($password) {
        return $this->password === $this->_makePasswordHash($password);
    }

    public function setPassword($password) {
        $this->password = $this->_makePasswordHash($password);
        return $this;
    }

    private function _makePasswordHash($password)
    {
        return sha1($this->id.$password.\Yii::$app->params['salt_for_user']);
    }

}