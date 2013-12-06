<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */

$this->breadcrumbs=array(
	'Usuários'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Usuários', 'url'=>array('index')),
	array('label'=>'Criar Usuários', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#usuarios-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Usuários</h1>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'usuarios-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nome',
		'email',
                array(
                    'name'=>'setor',
                    'value'=>'$data->setor0->nome',
                    'filter' => 
                        CHtml::listData(
                                Setores::model()->findAll(), 'id', 'nome'),
                ),
                array('name' => 'administrador', 'value' => '$data->verificarAdmin($data->administrador)',  'filter' => array('0' => 'Não', '1' => 'Sim') ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
