<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	$model->idFeriado=>array('view','id'=>$model->idFeriado),
	'Update',
);

$this->menu=array(
	array('label'=>'List Feriado', 'url'=>array('index')),
	array('label'=>'Create Feriado', 'url'=>array('create')),
	array('label'=>'View Feriado', 'url'=>array('view', 'id'=>$model->idFeriado)),
	array('label'=>'Manage Feriado', 'url'=>array('admin')),
);
?>

<h1>Update Feriado <?php echo $model->idFeriado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>