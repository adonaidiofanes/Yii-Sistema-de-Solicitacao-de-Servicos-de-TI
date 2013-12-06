<?php
/* @var $this UsuariosSetoresController */
/* @var $model UsuariosSetores */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'usuarios-setores-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'id_usuario'); ?>
		<?php echo $form->textField($model,'id_usuario'); ?>
		<?php echo $form->error($model,'id_usuario'); ?>
	</div>

	<div class="row">
		<?php //echo $form->labelEx($model,'id_setor'); ?>
		<?php echo $form->labelEx($model,'Quais setores o usuario faz parte?');

                //echo $form->checkBoxList($model, 'id_setor', CHtml::listData(Setores::model()->findAll(), 'id', 'nome'), array('checkAll' => 'Todos', 'class' => 'colocaremlinha'));
                      
                echo $form->checkBoxList($model, 'serviceSetores',
                            CHtml::listData(Service::model()->findAll(), 'id', 'nome'),
                            array('checkAll' => 'Todos', 'class' => 'colocaremlinha')); ?>
                
                ?>
		<?php echo $form->error($model,'id_setor'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->