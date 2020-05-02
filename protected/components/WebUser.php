<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 07.06.14
 * Time: 14:12
 */
class WebUser extends CWebUser {

    protected $_user;

    public $guestName='Гость';

    /**
     * @return User
     */
    public function getUser() {
        var_dump($this->id);die();
        if (!$this->id) {
            return null;
        }
        if ($this->_user) {
            return $this->_user;
        }
        $this->_user = User::model()->findByPk($this->id);
        return $this->_user;
    }
}