<?php
/* @var $this TarefasController */
/* @var $model Tarefas */

$this->breadcrumbs=array(
	"OS's"=>array('index'),
	'Criar',
);

$this->menu=array(
	array('label'=>"Listar OS's", 'url'=>array('index')),
	array('label'=>"Gerenciar OS's", 'url'=>array('admin'), 'visible'=>Yii::app()->user->getState('isAdmin')),
);
?>

<h1>Criar OS</h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'setores' => $setores)); ?>