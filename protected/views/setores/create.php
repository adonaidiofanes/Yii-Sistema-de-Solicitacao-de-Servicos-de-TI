<?php
/* @var $this SetoresController */
/* @var $model Setores */

$this->breadcrumbs=array(
	'Setores'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Setores', 'url'=>array('index')),
	array('label'=>'Gerenciar Setores', 'url'=>array('admin')),
);
?>

<h1>Criar Setor</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>