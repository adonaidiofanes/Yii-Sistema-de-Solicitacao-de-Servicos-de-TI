<?php
/* @var $this TarefasController */
/* @var $model Tarefas */

/* ============================================================== */
/* Detalhe: tarefas/view&id= */
/* ============================================================== */


$this->breadcrumbs=array(
	'OS'=>array('index'),
	$model->titulo,
);
//  array('label'=>'Gerenciar Tarefas', 'url'=>array('/tarefas/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
$this->menu=array(
	array('label'=>"Listar OS's", 'url'=>array('index')),
	array('label'=>'Criar OS', 'url'=>array('create')),
	array('label'=>'Editar OS', 'url'=>array('update', 'id'=>$model->id), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
	array('label'=>'Apagar OS', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Você tem certeza que deseja excluir esse item?'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
	array('label'=>"Gerenciar OS's", 'url'=>array('admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
);

//$date = '01/03/2010';
//echo date('Y-m-d',strtotime($date));                           // INCORRECT: 2010-01-03
//echo date_create_from_format('d/m/Y', $model->dt_inicio)->format('Y-m-d'); // CORRECT:   2010-03-01



?>

<h1>Detalhe OS #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'id',
		'titulo',
		'descricao',
		//'responsavel',
                array('label'=>'Responsavel','type'=>'raw', 'value' => CHtml::encode(TarefasController::verificarResponsavel($model->responsavel) )),
                array(               
                    'label' => 'Status',
                    'type'  => 'raw',
                    'value' => CHtml::encode(TarefasController::verificarStatus($model->status)),
                ),
                array('label'=>'Setor','type'=>'raw', 'value' => $model->setor0->nome ),
		//'status',
		//'setor',
                // 
                
                array('label' => 'Abertura da OS', 'type' => 'raw', 'value' => Yii::app()->dateFormatter->format("dd/MM/yyyy HH:mm:ss",$model->dt_inicio) ),

                //'dt_fim',
		//'dt_primeiro_contato',
	),
)); 



?>
