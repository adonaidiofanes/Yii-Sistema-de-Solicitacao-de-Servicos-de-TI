<?php
/* @var $this UsuariosSetoresController */
/* @var $model UsuariosSetores */

$this->breadcrumbs=array(
	'Usuarios Setores'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List UsuariosSetores', 'url'=>array('index')),
	array('label'=>'Create UsuariosSetores', 'url'=>array('create')),
	array('label'=>'View UsuariosSetores', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage UsuariosSetores', 'url'=>array('admin')),
);
?>

<h1>Update UsuariosSetores <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>