<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuarios'=>array('index'),
	//$model->id=>array('view','id'=>$model->id),
        $model->nome=>array('view','id'=>$model->id),
	'Atualizar',
);

$this->menu=array(
	array('label'=>'Listar Usuarios', 'url'=>array('index')),
	array('label'=>'Criar Usuário', 'url'=>array('create')),
	array('label'=>'Ver Usuários', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Gerenciar Usuários', 'url'=>array('admin')),
);
?>

<h1>Atualizar Dados de <b><?php echo $model->nome; ?></b></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>