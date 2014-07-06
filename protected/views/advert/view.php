<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List Advert','url'=>array('index')),
	array('label'=>'Create Advert','url'=>array('create')),
	array('label'=>'Update Advert','url'=>array('update','id'=>$model->id)),
	array('label'=>'Delete Advert','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Advert','url'=>array('admin')),
);
?>

<h1>View Advert #<?php echo $model->id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'type',
		'address_id',
		'floor',
		'floor_max',
		'space_total',
		'space_living',
		'space_cookroom',
		'balcony',
		'phone',
		'steel_door',
		'information',
		'price',
		'seller_id',
		'source_id',
		'url',
		'created',
		'expired',
		'status',
		'changed',
	),
)); ?>
