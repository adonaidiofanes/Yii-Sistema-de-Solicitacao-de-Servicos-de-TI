<?php
/* @var $this FeriadoController */
/* @var $data Feriado */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('idFeriado')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->idFeriado), array('view', 'id'=>$data->idFeriado)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('dtFeriado')); ?>:</b>
	<?php echo CHtml::encode($data->dtFeriado); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaInicial')); ?>:</b>
	<?php echo CHtml::encode($data->horaInicial); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('horaFinal')); ?>:</b>
	<?php echo CHtml::encode($data->horaFinal); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('parcial')); ?>:</b>
	<?php echo CHtml::encode($data->parcial); ?>
	<br />


</div>