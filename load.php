<?php
$secure = json_decode(file_get_contents(__DIR__.'/config.secure.json'), true);
// Load app configs from config.local (depends from environment)
include(__DIR__ . '/vendor/yiisoft/yii2/helpers/BaseArrayHelper.php');
include(__DIR__ . '/vendor/yiisoft/yii2/helpers/ArrayHelper.php');
$config = yii\helpers\ArrayHelper::merge(
    require(__DIR__ . '/static_config.php'),
    require(__DIR__ . '/config.local.php')
);
// Initialize application
defined('YII_DEBUG') or define('YII_DEBUG', $config['params']['debug']);
defined('YII_ENV') or define('YII_ENV', $config['params']['env']);

require(__DIR__ . '/vendor/autoload.php');
require(__DIR__ . '/vendor/yiisoft/yii2/Yii.php');

// Initialize aliases
Yii::setAlias('@web', __DIR__.'/public');
Yii::setAlias('@assets', __DIR__.'/src/assets');
Yii::setAlias('@behaviours', __DIR__.'/src/behaviours');
Yii::setAlias('@commands', __DIR__ . '/src/commands');
Yii::setAlias('@components', __DIR__ . '/src/components');
Yii::setAlias('@controllers', __DIR__ . '/src/controllers');
Yii::setAlias('@module', __DIR__ . '/src/module');
Yii::setAlias('@models', __DIR__ . '/src/models');
Yii::setAlias('@forms', __DIR__ . '/src/forms');

