<?php
/* @var $this TarefasController */
/* @var $model Tarefas */

$this->breadcrumbs=array(
	'OS'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Editar',
);

$this->menu=array(
	array('label'=>'Listar OS', 'url'=>array('index')),
	array('label'=>'Criar OS', 'url'=>array('create')),
	array('label'=>'Detalhes da OS', 'url'=>array('view', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
	array('label'=>'Gerenciar OS', 'url'=>array('admin')),
    
);
?>

<h1>Editar OS#<?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model, 'setores' => $setores)); ?>