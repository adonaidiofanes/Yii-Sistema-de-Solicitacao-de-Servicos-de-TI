<?php
/* @var $this FieldstestesController */
/* @var $model Fieldstestes */

$this->breadcrumbs=array(
	'Fieldstestes'=>array('index'),
	$model->Id=>array('view','id'=>$model->Id),
	'Update',
);

$this->menu=array(
	array('label'=>'List Fieldstestes', 'url'=>array('index')),
	array('label'=>'Create Fieldstestes', 'url'=>array('create')),
	array('label'=>'View Fieldstestes', 'url'=>array('view', 'id'=>$model->Id)),
	array('label'=>'Manage Fieldstestes', 'url'=>array('admin')),
);
?>

<h1>Update Fieldstestes <?php echo $model->Id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>