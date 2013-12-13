<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	$model->idFeriado,
);

$this->menu=array(
	array('label'=>'Listar Feriados', 'url'=>array('index')),
	array('label'=>'Criar Feriado', 'url'=>array('create')),
	array('label'=>'Editar Feriado', 'url'=>array('update', 'id'=>$model->idFeriado)),
	array('label'=>'Apagar Feriado', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->idFeriado),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Gerenciar Feriado', 'url'=>array('admin')),
);
?>

<h1>Ver Feriado #<?php echo $model->idFeriado; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'idFeriado',
		'nomeFeriado',
		'dtFeriado',
		'horaInicial',
		'horaFinal',
		'parcial',
	),
)); ?>
