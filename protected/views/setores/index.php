<?php
/* @var $this SetoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Setores',
);

$this->menu=array(
	array('label'=>'Criar Setor', 'url'=>array('create')),
	array('label'=>'Gerenciar Setores', 'url'=>array('admin')),
);
?>

<h1>Setores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
