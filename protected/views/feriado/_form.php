<?php
/* @var $this FeriadoController */
/* @var $model Feriado */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'feriado-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nomeFeriado'); ?>
		<?php echo $form->textField($model,'nomeFeriado',array('size'=>60,'maxlength'=>80)); ?>
                <small>(Ex: Natal, Ano novo)</small>
		<?php echo $form->error($model,'nomeFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'dtFeriado'); ?>
		<?php echo $form->textField($model,'dtFeriado'); ?>
		<?php echo $form->error($model,'dtFeriado'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'parcial'); ?>
		<?php //echo $form->textField($model,'parcial'); ?>
                <?php echo $form->dropDownList($model, 'parcial', array('0'=>'Não', '1'=>'Sim')); ?>
		<?php echo $form->error($model,'parcial'); ?>
	</div>
        
	<div class="row horaInicial hide">
		<?php echo $form->labelEx($model,'horaInicial'); ?>
		<?php echo $form->textField($model,'horaInicial'); ?>
		<?php echo $form->error($model,'horaInicial'); ?>
	</div>

	<div class="row horaFinal hide">
		<?php echo $form->labelEx($model,'horaFinal'); ?>
		<?php echo $form->textField($model,'horaFinal'); ?>
		<?php echo $form->error($model,'horaFinal'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->