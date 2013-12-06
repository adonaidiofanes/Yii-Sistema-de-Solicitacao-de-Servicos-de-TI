<?php
/* @var $this FieldstestesController */
/* @var $model Fieldstestes */

$this->breadcrumbs=array(
	'Fieldstestes'=>array('index'),
	$model->Id,
);

$this->menu=array(
	array('label'=>'List Fieldstestes', 'url'=>array('index')),
	array('label'=>'Create Fieldstestes', 'url'=>array('create')),
	array('label'=>'Update Fieldstestes', 'url'=>array('update', 'id'=>$model->Id)),
	array('label'=>'Delete Fieldstestes', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->Id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Fieldstestes', 'url'=>array('admin')),
);
?>

<h1>View Fieldstestes #<?php echo $model->Id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'Id',
		'nome',
		'isAdmin',
	),
)); ?>
