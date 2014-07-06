<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<?php echo $form->textFieldRow($model,'id',array('class'=>'span5','maxlength'=>10)); ?>

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
			'label'=>'Search',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
