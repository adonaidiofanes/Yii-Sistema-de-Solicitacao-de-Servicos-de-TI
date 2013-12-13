<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	$model->idFeriado=>array('view','id'=>$model->idFeriado),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Feriado', 'url'=>array('index')),
	array('label'=>'Criar Feriado', 'url'=>array('create')),
	array('label'=>'Ver Feriado', 'url'=>array('view', 'id'=>$model->idFeriado)),
	array('label'=>'Gerenciar Feriados', 'url'=>array('admin')),
);
?>

<h1>Atualizar Feriado <?php echo $model->idFeriado; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>