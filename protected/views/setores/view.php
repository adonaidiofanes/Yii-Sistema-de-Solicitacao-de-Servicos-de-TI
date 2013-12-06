<?php
/* @var $this SetoresController */
/* @var $model Setores */

$this->breadcrumbs=array(
	'Setores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'Listar Setores', 'url'=>array('index')),
	array('label'=>'Criar Setor', 'url'=>array('create')),
	array('label'=>'Editar Setor', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Setor', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Tem certeza que deseja apagar esse setor?')),
	array('label'=>'Gerenciar Setores', 'url'=>array('admin')),
);
?>

<h1>View Setores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
	),
)); ?>
