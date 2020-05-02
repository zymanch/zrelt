<?php
/* @var $this \yii\web\View */

use yii\widgets\ActiveForm;

/* @var $model \forms\Login */
/* @var $form ActiveForm  */

?>
<div class="modal-backdrop fade in"></div>
<div class="modal fade in" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="form">

                <div class="tab-content">

                    <div id="login" style="display: block">
                        <h1>Вход</h1>
                        <?php $form=ActiveForm::begin([
                            'id'=>'login-form',
                            'method'=>'post'
                        ]); ?>
                            <div class="field-wrap">
                                <?php echo $form->field($model, 'username')->textInput(['required'=>'required','autocomplete'=>'off'])->label(null,['class'=>'control-label asd'.($model->username?' active':'')]);?>
                            </div>
                            <div class="field-wrap">
                                <?php echo $form->field($model,'password')->passwordInput(['value'=>'','required'=>'required','autocomplete'=>'off']); ?>
                            </div>
                            <p class="forgot"><?=\yii\helpers\Html::a('Забыли пароль?',['profile/forgot']);?></p>


                            <button type="submit" class="button button-block hvr-bounce-to-bottom"> Войти </button>
                        <?php ActiveForm::end(); ?>
                    </div>
                </div>
                <!-- tab-content -->


            </div>
        </div>
    </div>
</div>
