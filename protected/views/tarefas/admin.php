<?php
/* @var $this TarefasController */
/* @var $model Tarefas */

$this->breadcrumbs=array(
	"OS's"=>array('index'),
	'Gerenciar',
);

$this->menu=array(
	//array('label'=>'Listar Tarefas', 'url'=>array('index')),
	array('label'=>'Criar OS', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#tarefas-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Gerenciar OS's</h1>

<p>
Você tem a opção de utilizar um operador de comparação (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
ou <b>=</b>) no início de cada um dos seus valores de pesquisa para especificar como a comparação deve ser feita.
</p>

<?php echo CHtml::link('Busca Avançada','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array('model'=>$model)); ?>

</div><!-- search-form -->
<?php
function verificarStatus($str){
  switch($str){
    case 0 : $retorno  = 'Pendente';      break;
    case 1 : $retorno  = 'Em andamento';  break;
    case 2 : $retorno  = 'Resolvida Provisioriamente'; break;
    case 3 : $retorno  = 'Resolvida';     break;
    case 4 : $retorno  = 'Negada';        break;
    default : $retorno = 'Nao informado';
  }
  return $retorno;
}

function verificarResponsavel($str){
  if($str == "" || $str == NULL){
    return "Não definido";
  } else if($str != ""){
    return Usuarios::model()->findByPk($str)->nome;
  }
}
  
?>
<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'tarefas-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'id',
		'titulo',
//		'descricao',
		//'status',
                array('name' => 'status', 'value' => 'verificarStatus($data->status)', 'filter' => TarefasController::statusDisponiveis() ),
                array(
                    'name'   =>'responsavel',
                    'value'  =>'verificarResponsavel($data->responsavel)',
                    'filter' => CHtml::listData( Usuarios::model()->findAll(), 'id', 'nome'),
                ),
                array(
                    'name'   =>'setor',
                    'value'  =>'$data->setor0->nome',
                    'filter' => CHtml::listData( Setores::model()->findAll(), 'id', 'nome'),
                ),
                array(
                    'name'  => 'dt_inicio',
                    'value' => 'date("d/m/Y H:m:s",strtotime($data->dt_inicio))'
                ),

		array(
                    'class' => 'CButtonColumn',
		),
	),
    
)); ?>
