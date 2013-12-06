<?php
/* @var $this UsuariosSetoresController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Usuarios Setores',
);

$this->menu=array(
	array('label'=>'Create UsuariosSetores', 'url'=>array('create')),
	array('label'=>'Manage UsuariosSetores', 'url'=>array('admin')),
);
?>

<h1>Usuarios Setores</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
