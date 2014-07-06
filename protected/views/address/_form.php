<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'address-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'complex',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'complex_house',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'complex_structure',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'street',array('class'=>'span5','maxlength'=>64)); ?>

	<?php echo $form->textFieldRow($model,'street_house',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'street_structure',array('class'=>'span5','maxlength'=>12)); ?>

	<?php echo $form->textFieldRow($model,'map_x',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'map_y',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'status',array('class'=>'span5','maxlength'=>7)); ?>

	<?php echo $form->textFieldRow($model,'changed',array('class'=>'span5')); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'primary',
			'label'=>$model->isNewRecord ? 'Create' : 'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
