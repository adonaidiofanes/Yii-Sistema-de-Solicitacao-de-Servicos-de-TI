<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	$model->nome,
);

$this->menu=array(
	array('label'=>'Listar Usuários', 'url'=>array('index')),
	array('label'=>'Criar Usuários', 'url'=>array('create')),
	array('label'=>'Atualizar Usuários', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Apagar Usuários', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja excluir esse item?')),
	array('label'=>'Gerenciar Usuários', 'url'=>array('admin')),
);
?>

<h1>#<?php echo $model->id; ?> - <?php echo $model->nome; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'nome',
		'email',
		//'setor',
                array(
                    'name'=>'setor',
                    'value' => $model->setor0->nome
                    ),
	),
)); ?>
