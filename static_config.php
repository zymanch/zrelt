<?php

return [
    'id'                  => 'virt360',
    'name'                => 'Virt360',
    'vendorPath'          => __DIR__ . '/vendor',
    'basePath'            => __DIR__ . '/src',
    'timeZone'            => 'Europe/Moscow',
    'controllerNamespace' => 'controllers',
    'defaultRoute'        => 'advert/map',
    'language'            => 'ru-RU',
    'controllerMap'       => [
        'migrate' => [
            'class'          => 'yii\console\controllers\MigrateController',
            'migrationTable' => 'zrelt._migration',
            'interactive'    => false,
        ],
    ],
    'aliases'             => [
        '@bower' => '@vendor/bower-asset',
        '@npm'   => '@vendor/npm-asset',
    ],
    'components'          => [
        'db'           => [
            'class'               => 'yii\db\Connection',
            'dsn'                 => 'mysql:host=' . $secure['mysql']['hostname'] . ';dbname='.$secure['mysql']['database'],
            'username'            => $secure['mysql']['username'],
            'password'            => $secure['mysql']['password'],
            'charset'             => 'utf8',
            'enableSchemaCache'   => true,
            'schemaCacheDuration' => 3600,
            'schemaCache'         => 'cache',
        ],
        'cache'        => [
            'class' => 'yii\caching\FileCache',
        ],
        'request'      => [
            'csrfParam'           => '_csrf-backend',
            'cookieValidationKey' => 'f1n861g104fvf-p13f1fv1cv19731c13-[mt',
        ],
        'user'         => [
            'identityClass'   => 'models\User',
            'enableAutoLogin' => true,
            'identityCookie'  => ['name' => '_identity-backend', 'httpOnly' => true],
            'loginUrl'        => ['login/index'],
        ],
        'session'      => [
            // this is the name of the session cookie used for login on the backend
            'name' => 'SESSID',
        ],
        'assetManager' => [
            'class' => 'components\AssetManager',
        ],
        'errorHandler' => [
            'errorAction' => 'error/error',
        ],
        'authManager' => [
            'class'=>'components\AuthManager'
        ],
        'urlManager'   => [
            'class'           => 'components\UrlManager',
            'enablePrettyUrl' => true,
            'showScriptName'  => false,
            'rules'           => [
                '<controller:\w+>/<id:\d+>'                     => '<controller>/view',
                '<controller:\w+>/<action:\w+>/<id:\d+>'        => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>/<id:\w+>'        => '<controller>/<action>',
                '<controller:\w+>/<action:\w+>'                 => '<controller>/<action>',
            ],
        ],
    ],
    'params'              => [
        'salt_for_user' => $secure['config']['salt_for_intranet'],
        'email'=>'sasha@zrelt.com',
        'phone'=>'+79274162066',
        'skype'=>'virt360',
        'yandex_map_key' => 'e7c23b6e-ab16-4781-9848-d53df3f6da76',
        'logo' => '/images/logo.png',
        'sub_logo' => '/images/logo.png',
        'social_networks' => [
            'vk' => 'http://vk.com',
            'facebook' => 'http://facebook.com',
        ]
    ],
];