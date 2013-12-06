<?php
/* @var $this SetoresController */
/* @var $model Setores */

$this->breadcrumbs=array(
	'Setores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar Setores', 'url'=>array('index')),
	array('label'=>'Criar Setor', 'url'=>array('create')),
	array('label'=>'Ver Setor', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Setores', 'url'=>array('admin')),
);
?>

<h1>Editar Setor <b><?php echo $model->nome; ?></b></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>