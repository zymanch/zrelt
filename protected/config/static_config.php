<?php
/**
 * Created by PhpStorm.
 * User: ZyManch
 * Date: 29.06.14
 * Time: 7:14
 */
return array(
    'basePath'=>dirname(__FILE__).DIRECTORY_SEPARATOR.'..',
    'name'=>'My Web Application',
    // preloading 'log' component
    'preload'=>array('log'),
    'sourceLanguage' => 'en',
    'language' => 'ru',
    // autoloading model and component classes
    'import'=>array(
        'application.models.base.*',
        'application.models.*',
        'application.models.search.*',
        'application.forms.*',
        'application.components.*',
        'application.controllers.*',
        'application.behaviors.*',
    ),


    // application components
    'components'=>array(
        'user'=>array(
            'class'=>'WebUser',
            'allowAutoLogin'=>true,
        ),
        'bootstrap'=>array(
            'class'=>'bootstrap.components.Bootstrap',
        ),
        'urlManager'=>array(
            'urlFormat'=>'path',
            'showScriptName'=>false,
            'caseSensitive'=>false,
            'rules'=>array(
                '<controller:\w+>/<id:\d+>'=>'<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'=>'<controller>/<action>',
                '<controller:\w+>/<action:\w+>'=>'<controller>/<action>',
            ),
        ),
        'db'=>array(
            'connectionString' => 'mysql:host=localhost;dbname=zrelt',
            'emulatePrepare' => true,
            'username' => 'root',
            'password' => '',
            'charset' => 'utf8',
        ),
        'errorHandler'=>array(
            // use 'site/error' action to display errors
            'errorAction'=>'site/error',
        ),
        'log'=>array(
            'class'=>'CLogRouter',
            'routes'=>array(
                array(
                    'class'=>'CFileLogRoute',
                    'levels'=>'error, warning',
                ),
            ),
        ),
    ),


    'params'=>array(
        // this is used in contact page
        'adminEmail'=>'webmaster@example.com',
        'salt' => 'salt',
    ),
);