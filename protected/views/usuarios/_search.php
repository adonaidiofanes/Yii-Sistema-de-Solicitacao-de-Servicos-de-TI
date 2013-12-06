<?php
/* @var $this UsuariosController */
/* @var $model Usuarios */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'nome'); ?>
		<?php echo $form->textField($model,'nome',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'email'); ?>
		<?php echo $form->textField($model,'email',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setor'); ?>
		<?php //echo $form->textField($model,'setor'); ?>
          	<?php echo $form->dropDownList( $model, 'setor', CHtml::listData(Setores::model()->findAll(), 'id', 'nome') ); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>
  
	<div class="row">
		<?php echo $form->label($model,'administrador'); ?>
		<?php echo $form->dropDownList( $model, 'administrador', array('1' => 'Sim', '0' => 'Não')); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->