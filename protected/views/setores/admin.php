<?php
/* @var $this SetoresController */
/* @var $model Setores */

$this->breadcrumbs=array(
	'Setores'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Setores', 'url'=>array('index')),
	array('label'=>'Criar Setor', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#setores-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar Setores</h1>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'setores-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'nome',
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
