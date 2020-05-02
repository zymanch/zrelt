<?php
namespace components;

use controllers\AdvertController;
use controllers\HelpController;
use controllers\UserController;
use module\design\Icon;

class Controller extends \module\design\Controller
{
    public $layout = self::LAYOUT_DEFAULT_MENU;
	public $menu=array();
	public $sub_menu=array();
	/**
	 * @var array the breadcrumbs of the current page. The value of this property will
	 * be assigned to {@link CBreadcrumbs::links}. Please refer to {@link CBreadcrumbs::links}
	 * for more details on how to specify this property.
	 */
	public $breadcrumbs=array();

    public function init() {
        parent::init();
        $this->_initDefaultMenu();
        $this->_initUserMenu();
        $this->_initHelpMenu();
        $this->_initAdvertMenu();
        $this->_initSubMenu();
    }

    private function _initDefaultMenu()
    {

        $this->menu = array(
            array('label'=>'Главная', 'url'=>'/'),
            array('label'=>'Карта', 'url'=>array('advert/map')),
            array('label'=>'Поиск', 'url'=>array('advert/index')),
        );
    }

    private function _initUserMenu()
    {
        $user = \Yii::$app->user;
        $items = [];
        if ($user->can(UserController::PERMISSION_INDEX)) {
            $items[] = ['label'=>'Список', 'url'=>['user/index']];
        }
        if ($user->can(UserController::PERMISSION_CREATE)) {
            $items[] = ['label'=>'Создать', 'url'=>['user/create']];
        }
        if ($items) {
            $this->menu['user'] = ['label'=>'Пользователи','items'=>$items];
        }
    }

    private function _initAdvertMenu()
    {
        $user = \Yii::$app->user;
        $items = [];
        if ($user->can(AdvertController::PERMISSION_ADMIN)) {
            $items[] = ['label'=>'Администрирование', 'url'=>['advert/admin']];
        }
        if ($user->can(AdvertController::PERMISSION_CREATE)) {
            $items[] = ['label'=>'Создать', 'url'=>['advert/create']];
        }
        if ($items) {
            $this->menu['advert'] = ['label'=>'Объявления','items'=>$items];
        }
    }

    private function _initHelpMenu()
    {
        $this->menu['help'] = ['label'=>'Статьи','items'=>[
            ['label'=>'Выбор квартиры', 'url'=>['help/'.HelpController::HELP_CHOOSE_ALIAS]],
            ['label'=>'Проверка квартиры', 'url'=>['help/'.HelpController::HELP_CHECK_ALIAS]],
            ['label'=>'Проверка документов', 'url'=>['help/'.HelpController::HELP_DOCS_CHECK_ALIAS]],
            ['label'=>'О правомочиях продавца', 'url'=>['help/'.HelpController::HELP_SELLER_ALIAS]],
            ['label'=>'О прописанных лицах', 'url'=>['help/'.HelpController::HELP_PEOPLE_ALIAS]],
            ['label'=>'О притязаниях и судебных спорах', 'url'=>['help/'.HelpController::HELP_DISPUTE_ALIAS]],
            ['label'=>'Об обременениях и арестах', 'url'=>['help/'.HelpController::HELP_ENCUMBRANCE_ALIAS]],
            ['label'=>'Долги по коммунальным платежам', 'url'=>['help/'.HelpController::HELP_DEBT_ALIAS]],
            ['label'=>'Проверяем законность перепланировки', 'url'=>['help/'.HelpController::HELP_REDEVELOPMENT_ALIAS]],
            ['label'=>'Как правильно оформить покупку квартиры', 'url'=>['help/'.HelpController::HELP_SALE_ALIAS]],
            ['label'=>'Заключение предварительного договора', 'url'=>['help/'.HelpController::HELP_CONTRACT_ALIAS]],
            ['label'=>'Что нужно знать о задатке', 'url'=>['help/'.HelpController::HELP_DEPOSIT_ALIAS]],
            ['label'=>'Составление документов для регистрации', 'url'=>['help/'.HelpController::HELP_DOCS_ALIAS]],
        ]];
    }

    private function _initSubMenu() {
        if (\Yii::$app->user->isGuest) {
            $this->sub_menu[] = ['label' => 'Вход','icon'=>Icon::LOCK,'url'=>['profile/login']];
            $this->sub_menu[] = ['label' => 'Регистрация','icon'=>Icon::SIGN_IN,'url'=>['profile/register']];
        } else {
            $this->sub_menu[] = ['label' => 'Выход','icon'=>Icon::SIGN_IN,'url'=>['profile/logout']];
        }

    }
}