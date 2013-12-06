<?php
/* @var $this FieldstestesController */
/* @var $model Fieldstestes */

$this->breadcrumbs=array(
	'Fieldstestes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Fieldstestes', 'url'=>array('index')),
	array('label'=>'Manage Fieldstestes', 'url'=>array('admin')),
);
?>

<h1>Create Fieldstestes</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>