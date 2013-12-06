<?php
/* @var $this TarefasController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	"Os's",
);

$this->menu=array(
	array('label'=>'Criar Nova OS', 'url'=>array('create')),
	//array('label'=>'Gerenciar Tarefas', 'url'=>array('admin'), 'visible'=>!Yii::app()->user->getState('isAdmin')),
        array('label'=>"Gerenciar OS's", 'url'=>array('/tarefas/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
);
?>

<h1>Ordens de Serviço</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
        'itemView'=>'_view',
)); ?>
