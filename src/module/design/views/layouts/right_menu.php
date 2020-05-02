<?php

/* @var $this \yii\web\View */

/* @var $content string */
use yii\helpers\Html;
/** @var \module\design\Controller $context */
$context = $this->context;
if (!$this->title) {
    $this->title = Yii::$app->name;
};
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <link rel="apple-touch-icon" sizes="180x180" href="/apple-touch-icon.png">
    <link rel="icon" href="/favicon.ico"/>
    <meta name="theme-color" content="#ffffff">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<?php $menu = \module\design\menu\RightMenu::begin([
    'logo' =>  \Yii::$app->params['logo']??null,
    'sub_logo' =>  \Yii::$app->params['sub_logo']??null,
    'menu' => $context->menu
]);?>

<?php \module\design\menu\RightMenu::end();?>

<?=$content;?>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
