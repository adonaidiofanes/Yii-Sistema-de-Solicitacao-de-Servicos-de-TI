<?php
/* @var $this TarefasController */
/* @var $data Tarefas */
/* ============================================================== */
/* LOOP DA PAGINA: tarefas/index */
/* ============================================================== */
?>

<div class="view">

        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />
        */ ?>
        
        <b><?php echo CHtml::link(CHtml::encode('#' . $data->id . ' - '. $data->titulo), array('view', 'id'=>$data->id)); ?></b>
	<br />

        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('titulo')); ?>:</b>
	<?php echo CHtml::encode($data->titulo); ?>
	<br />
         * 
         */ ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('descricao')); ?>:</b>
	<?php echo CHtml::encode($data->descricao); ?>
	<br />
        
        <?php if($data->responsavel != ''):?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('responsavel')); ?>:</b>
	<?php echo CHtml::encode($data->responsavel0->nome); ?>
	<br />
        <?php endif; ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode(TarefasController::verificarStatus($data->status)); ?>
	<br />
        
        <?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('setor')); ?>:</b>
	<?php echo CHtml::encode($data->setor0->nome); ?>
	<br />
        */
        ?>

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_inicio')); ?>:</b>
	<?php echo CHtml::encode(Yii::app()->dateFormatter->format("dd/MM/yyyy HH:mm:ss",$data->dt_inicio))?>
	<br />
        
        <?php if($data->comentario != ''):?>
	<b><?php echo CHtml::encode($data->getAttributeLabel('comentario')); ?>:</b>
	<?php echo CHtml::encode($data->comentario); ?>
	<br />
        <?php endif; ?>

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_fim')); ?>:</b>
	<?php echo CHtml::encode($data->dt_fim); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dt_primeiro_contato')); ?>:</b>
	<?php echo CHtml::encode($data->dt_primeiro_contato); ?>
	<br />

	*/ ?>

</div>