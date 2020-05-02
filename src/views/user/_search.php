<?php
/* @var $this UserController */

use yii\bootstrap\ActiveForm;
use \models\User;

/* @var $model SearchUser */
/* @var $form CActiveForm */
?>

<?php $form=ActiveForm::begin([
	'action'=>['user/index'],
	'method'=>'get'
]); ?>


<div class="col-md-3 col-sm-6">
		<?php echo $form->field($model,'type',['options'=>['class'=>'single-query']])->dropDownList([User::TYPE_ADMIN => 'Администратор',User::TYPE_MANAGER => 'Менеджер',User::TYPE_USER => 'Пользователь']); ?>

</div>

<div class="col-md-3 col-sm-6">
        <?php echo $form->field($model,'id',['options'=>['class'=>'single-query']])->textInput(array('size'=>10,'maxlength'=>10)); ?>
</div>
<div class="col-md-3 col-sm-6">
		<?php echo $form->field($model,'email',['options'=>['class'=>'single-query']])->textInput(array('size'=>50,'maxlength'=>50)); ?>
</div>


<div class="col-md-6 text-right">
    <div class="query-submit-button">
        <input type="submit" class="btn-slide" value="Найти">
    </div>
</div>

<?php ActiveForm::end(); ?>
