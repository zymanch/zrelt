<?php
/* @var $this UserController */

use yii\bootstrap\ActiveForm;
use yii\bootstrap\Html;
use models\User;

/* @var $model User */
/* @var $form ActiveForm */
?>

<div class="form">

<?php $form = ActiveForm::begin([
	'id'=>'user-form',
    'options' => [
        'class' => 'form-horizontal',
    ],
    'method'=>'post',
    'layout'  => 'horizontal',
]); ?>


    <?php echo $form->field($model,'type')->dropDownList([User::TYPE_ADMIN => 'Администратор',User::TYPE_MANAGER => 'Менеджер',User::TYPE_USER => 'Пользователь']); ?>
    <?php echo $form->field($model,'email')->textInput(['size'=>50,'maxlength'=>50]); ?>
    <?php echo $form->field($model,'phone')->textInput(['size'=>20,'maxlength'=>20]); ?>
    <?php echo $form->field($model,'password')->passwordInput(['size'=>50,'maxlength'=>50,'value'=>'']); ?>

    <div class="form-group">
        <div class="col-sm-3"></div>
        <div class="col-sm-9">
		    <?php echo Html::submitButton($model->isNewRecord ? 'Создать' : 'Сохранить',['class'=>'btn-slide']); ?>
	    </div>
	</div>

<?php ActiveForm::end(); ?>

</div><!-- form -->