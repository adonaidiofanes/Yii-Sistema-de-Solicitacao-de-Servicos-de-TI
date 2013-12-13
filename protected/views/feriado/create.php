<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Feriados', 'url'=>array('index')),
	array('label'=>'Gerenciar Feriados', 'url'=>array('admin')),
);
?>

<h1>Criar Feriado</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>