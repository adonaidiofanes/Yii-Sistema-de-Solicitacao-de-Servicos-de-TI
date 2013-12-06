<?php
/* @var $this FieldstestesController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Fieldstestes',
);

$this->menu=array(
	array('label'=>'Create Fieldstestes', 'url'=>array('create')),
	array('label'=>'Manage Fieldstestes', 'url'=>array('admin')),
);
?>

<h1>Fieldstestes</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
