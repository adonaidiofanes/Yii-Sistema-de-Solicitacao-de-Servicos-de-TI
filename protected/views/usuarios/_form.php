<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'nome'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'email'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'senha'); ?>
		<?php echo $form->passwordField($model,'senha',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'senha'); ?>
	</div>        

	<div class="row">
		<?php echo $form->labelEx($model,'setor'); ?>
		<?php //echo $form->textField($model,'setor'); ?>
                <?php // Montar selecet dos responsáveis pela tarefa
                      echo $form->dropDownList(
                              $model, 
                              'setor', 
                              CHtml::listData(Setores::model()->findAll(), 'id', 'nome')
                      ); ?>
		<?php echo $form->error($model,'setor'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'administrador'); ?>
		<?php echo $form->checkBox($model,'administrador', array('checked'=> $model->chkAdmin() )); ?>
		<?php echo $form->error($model,'administrador'); ?>
	</div>      


	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->