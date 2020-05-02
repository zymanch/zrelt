<?php
/* @var $this ProfileController */
/* @var $model LoginForm */
/* @var $form CActiveForm  */

?>
<?php \module\design\section\Error::begin([
    'message' => 'Страница в разработке',
    'buttons' => [
        ['label'=>'На главную','url'=>['advert/map']],
    ]
]);?>
Страница в разработке, пожалуйста, воспользуйтесь другими пунктами меню.

<?php \module\design\section\Error::end();?>

<?php return; ?>
<div class="modal-backdrop fade in"></div>
<div class="modal fade in" style="display: block;">
    <div class="modal-dialog">
        <div class="modal-body">
            <div class="form">
                <?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm', array(
                    'id'=>'login-form',
                    'type'=>'horizontal',
                    'enableClientValidation'=>true,
                    'clientOptions'=>array(
                        'validateOnSubmit'=>true,
                    ),
                )); ?>
                <div class="tab-content">
                    <div id="signup">
                        <h1>Регистрация</h1>
                        <form action="/" method="post">
                            <div class="top-row">
                                <div class="field-wrap">
                                    <label> Имя<span class="req">*</span> </label>
                                    <input type="text" required autocomplete="off" />
                                </div>
                                <div class="field-wrap">
                                    <label> Фамилия<span class="req">*</span> </label>
                                    <input type="text" required autocomplete="off"/>
                                </div>
                            </div>
                            <div class="field-wrap">
                                <label> Email<span class="req">*</span> </label>
                                <input type="email" required autocomplete="off"/>
                            </div>
                            <div class="field-wrap">
                                <div class="form-group margin-bottom-0">
                                    <select class="form-control">
                                        <option value="">-- Property -- </option>
                                        <option value="1">Property 1</option>
                                        <option value="2">Property 2</option>
                                        <option value="3">Property 3</option>
                                        <option value="4">Property 4</option>
                                        <option value="5">Property 5+</option>
                                    </select>
                                </div>
                            </div>
                            <div class="field-wrap">
                                <label> Massage<span class="req">*</span> </label>
                                <textarea cols="4" rows="4"></textarea>
                            </div>


                            <?php echo $form->textFieldRow($model,'username'); ?>

                            <?php echo $form->passwordFieldRow($model,'password'); ?>

                            <?php echo $form->checkBoxRow($model,'rememberMe'); ?>
                            <button type="submit" class="button button-block hvr-bounce-to-bottom"> Зарегистрироваться </button>
                        </form>
                    </div>
                </div>
                <!-- tab-content -->

                <?php $this->endWidget(); ?>
            </div>
        </div>
    </div>
</div>