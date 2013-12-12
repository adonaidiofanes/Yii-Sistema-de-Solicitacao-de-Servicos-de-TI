<?php
/* @var $this FeriadoController */
/* @var $model Feriado */

$this->breadcrumbs=array(
	'Feriados'=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	array('label'=>'Listar Feriados', 'url'=>array('index')),
	array('label'=>'Criar Feriado', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#feriado-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar feriados</h1>

<p>
<ul>
  <li><strong>Feriado parcial</strong> significa se o feriado vai ser meio período ou período completo.<br><small>Ex: Feriado parcial começa às 08:00 e termina 12:00</small></li>  
</ul>
</p>

<?php echo CHtml::link('Busca avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'feriado-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'nomeFeriado',
                array(
                    'name'  => 'dtFeriado',
                    'value' => 'date("d/m/Y",strtotime($data->dtFeriado))'
                ),
		'horaInicial',
		'horaFinal',
		//'parcial',
                array('name' => 'parcial', 'value' => '$data->verificarParcial($data->parcial)',  'filter' => array('0' => 'Não', '1' => 'Sim') ),
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
