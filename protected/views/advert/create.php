<?php
$this->breadcrumbs=array(
	'Adverts'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Advert','url'=>array('index')),
	array('label'=>'Manage Advert','url'=>array('admin')),
);
?>

<h1>Create Advert</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>