<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id),array('view','id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complex')); ?>:</b>
	<?php echo CHtml::encode($data->complex); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complex_house')); ?>:</b>
	<?php echo CHtml::encode($data->complex_house); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('complex_structure')); ?>:</b>
	<?php echo CHtml::encode($data->complex_structure); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street')); ?>:</b>
	<?php echo CHtml::encode($data->street); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street_house')); ?>:</b>
	<?php echo CHtml::encode($data->street_house); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('street_structure')); ?>:</b>
	<?php echo CHtml::encode($data->street_structure); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('map_x')); ?>:</b>
	<?php echo CHtml::encode($data->map_x); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('map_y')); ?>:</b>
	<?php echo CHtml::encode($data->map_y); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('changed')); ?>:</b>
	<?php echo CHtml::encode($data->changed); ?>
	<br />

	*/ ?>

</div>