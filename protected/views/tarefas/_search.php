<?php
/* @var $this TarefasController */
/* @var $model Tarefas */
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
		<?php echo $form->label($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'descricao'); ?>
		<?php echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>255)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'responsavel'); ?>
		<?php echo $form->textField($model,'responsavel'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'setor'); ?>
                <?php echo $form->dropDownList( $model, 'setor', CHtml::listData(Setores::model()->findAll(), 'id', 'nome') ); ?>
		<?php //echo $form->textField($model,'setor'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt_inicio'); ?>
		<?php echo $form->textField($model,'dt_inicio'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt_fim'); ?>
		<?php echo $form->textField($model,'dt_fim'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'dt_primeiro_contato'); ?>
		<?php echo $form->textField($model,'dt_primeiro_contato'); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Procurar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->