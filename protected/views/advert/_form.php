<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'advert-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<?php echo $form->textFieldRow($model,'type',array('class'=>'span5','maxlength'=>9)); ?>

	<?php echo $form->textFieldRow($model,'address_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'floor',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'floor_max',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'space_total',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'space_living',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'space_cookroom',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'balcony',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'phone',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textFieldRow($model,'steel_door',array('class'=>'span5','maxlength'=>3)); ?>

	<?php echo $form->textAreaRow($model,'information',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php echo $form->textFieldRow($model,'price',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'seller_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'source_id',array('class'=>'span5','maxlength'=>10)); ?>

	<?php echo $form->textFieldRow($model,'url',array('class'=>'span5','maxlength'=>256)); ?>

	<?php echo $form->textFieldRow($model,'created',array('class'=>'span5')); ?>

	<?php echo $form->textFieldRow($model,'expired',array('class'=>'span5')); ?>

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
