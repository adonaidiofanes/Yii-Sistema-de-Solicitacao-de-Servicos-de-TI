<?php
/* @var $this UsuariosSetoresController */
/* @var $model UsuariosSetores */

$this->breadcrumbs=array(
	'Usuarios Setores'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List UsuariosSetores', 'url'=>array('index')),
	array('label'=>'Manage UsuariosSetores', 'url'=>array('admin')),
);
?>

<h1>Create UsuariosSetores</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>