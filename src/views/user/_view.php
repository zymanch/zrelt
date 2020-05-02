<?php
/* @var $this \yii\web\View */

use yii\bootstrap\Html;
use models\User;

/* @var $model \models\User */
?>

<div class="col-sm-3 service_block">
    <div class="row m0 inner">
        <div class="row m0 block_title"><?=Html::encode($model->email);?></div>
        <div class="row m0 block_icon">
            <?php if ($model->type == User::TYPE_ADMIN):?>
                <i class="fa fa-certificate"></i>
            <?php elseif($model->type == User::TYPE_MANAGER):?>
                <i class="fa fa-at"></i>
            <?php else:?>
                <i class="fa fa-user"></i>
            <?php endif;?>
        </div>
        <?=Html::a('Редактировать',['user/update','id'=>$model->id],['class'=>'read_more']);?>
    </div>
</div>
