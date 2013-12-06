<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>'Listar Usuários', 'url'=>array('index')),
	array('label'=>'Gerenciar Usuários', 'url'=>array('admin')),
);
?>

<h1>Criar Usuários</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'setores' => $setores)); ?>