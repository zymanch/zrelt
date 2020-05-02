<?php

/* @var $this yii\web\View */

/* @var $name string */
/* @var $message string */
/* @var $exception Exception */

$this->title = $name;
?>

<?php \module\design\section\Error::begin([
    'message' => yii\helpers\Html::encode($this->title),
    'buttons' => [
        ['label'=>'На главную','url'=>['advert/map']],
    ]
]);?>
<?= nl2br(yii\helpers\Html::encode($message)) ?>

<?php \module\design\section\Error::end();?>