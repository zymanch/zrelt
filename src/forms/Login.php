<?php
namespace forms;
use models\User;
use Yii;
use yii\base\Model;

/**
 * LoginForm class.
 * LoginForm is the data structure for keeping
 * user login form data. It is used by the 'login' action of 'SiteController'.
 */
class Login extends Model
{
	public $username;
	public $password;
	public $rememberMe;

    private $_user;

    /**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return [
			[['username','password'], 'required'],
			[['username','password'], 'string','min'=>3,'max'=>50],
			['rememberMe', 'boolean'],
			['password', 'validatePassword'],
		];
	}

	/**
	 * Declares attribute labels.
	 */
	public function attributeLabels()
	{
		return [
			'username'=>'Email',
			'password'=>'Пароль',
			'rememberMe'=>'Запомнить меня',
		];
	}

    public function validatePassword($attribute, $params)
    {
        if (!$this->hasErrors()) {
            $identity = $this->getUserIdentity();
            if (!$identity || !$identity->validatePassword($this->password)) {
                $this->addError($attribute, 'Неверный Email либо пароль.');
            }
        }
    }

    /**
     * Logs in a user using the provided username and password.
     *
     * @return boolean whether the user is logged in successfully
     */
    public function login()
    {
        if ($this->validate()) {
            return Yii::$app->user->login($this->getUserIdentity(), $this->rememberMe ? 3600 * 24 * 30 : 0);
        } else {
            return false;
        }
    }

    /**
     * Finds user by [[username]]
     *
     * @return User|null
     */
    protected function getUserIdentity()
    {
        if ($this->_user === null) {
            $this->_user = User::find()->where('email = :email', [':email' => $this->username])->one();
        }
        return $this->_user;
    }
}
