<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	$model->idFeriado,
);

$this->menu=array(
	array('label'=>'List Feriado', 'url'=>array('index')),
	array('label'=>'Create Feriado', 'url'=>array('create')),
	array('label'=>'Update Feriado', 'url'=>array('update', 'id'=>$model->idFeriado)),
	array('label'=>'Delete Feriado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFeriado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Feriado', 'url'=>array('admin')),
);
?>

<h1>View Feriado #<?php echo $model->idFeriado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFeriado',
		'dtFeriado',
		'horaInicial',
		'horaFinal',
		'parcial',
	),
)); ?>
