<?php
/* @var $this FeriadoController */
/* @var $model Feriado */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'idFeriado'); ?>
		<?php echo $form->textField($model,'idFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dtFeriado'); ?>
		<?php echo $form->textField($model,'dtFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaInicial'); ?>
		<?php echo $form->textField($model,'horaInicial'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'horaFinal'); ?>
		<?php echo $form->textField($model,'horaFinal'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'parcial'); ?>
		<?php echo $form->textField($model,'parcial'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->