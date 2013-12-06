<?php
/* @var $this UsuariosSetoresController */
/* @var $model UsuariosSetores */

$this->breadcrumbs=array(
	'Usuarios Setores'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List UsuariosSetores', 'url'=>array('index')),
	array('label'=>'Create UsuariosSetores', 'url'=>array('create')),
	array('label'=>'Update UsuariosSetores', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete UsuariosSetores', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage UsuariosSetores', 'url'=>array('admin')),
);
?>

<h1>View UsuariosSetores #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'id_usuario',
		'id_setor',
	),
)); ?>
