<?php
/* @var $this TarefasController */
/* @var $model Tarefas */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'tarefas-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
        'focus' => array($model, 'titulo'),
)); ?>

	<p class="note">Campos com <span class="required">*</span> são obrigatórios.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'titulo'); ?>
		<?php echo $form->textField($model,'titulo',array('size'=>60,'maxlength'=>255)); ?>
		<?php echo $form->error($model,'titulo'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'descricao'); ?>
		<?php //echo $form->textField($model,'descricao',array('size'=>60,'maxlength'=>255)); ?>
                <?php echo $form->textArea($model,'descricao',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'descricao'); ?>
	</div>

	
        <?php 
          // Verificação de usuário admin
          // Apenas para administradores é exibido as opções abaixo
          if(Yii::app()->user->getState('isAdmin')): ?>
        
	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php //echo $form->textField($model,'status'); 
                      $statusDisponiveis = TarefasController::statusDisponiveis();
                      echo $form->dropDownList($model, 'status', $statusDisponiveis);
                ?>
          
		<?php echo $form->error($model,'status'); ?>
	</div>
        
	<div class="row">
		<?php echo $form->labelEx($model,'comentario'); ?>
		<?php echo $form->textArea($model,'comentario',array('rows'=>6,'cols'=>50)); ?>
		<?php echo $form->error($model,'comentario'); ?>
	</div>
        
        <div class="row">
          <?php echo $form->labelEx($model,'responsavel'); ?>
          <?php //echo $form->textField($model,'responsavel'); ?>
          <?php echo $form->error($model,'responsavel'); 

              // Montar selecet dos responsáveis pela tarefa
//              echo $form->dropDownList(
//                      $model, 
//                      'responsavel', 
//                      CHtml::listData(Usuarios::model()->findAll(), 'id', 'nome')
//              );
              
              
             $setoresDisponiveis =  Usuarios::model()->findAll('setor IN (1,2,3)');
             
             echo $form->dropDownList(
                     $model,
                     'responsavel',
                     CHtml::listData($setoresDisponiveis, 'id', 'nome'), array('empty'=>'- Selecione -')
                     );

             
//$post=Post::model()->find(array(
//    'select'=>'title',
//    'condition'=>'postID=:postID',
//    'params'=>array(':postID'=>10),
//));
              
          ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'setor'); ?>
                <?php echo $form->dropDownList($model,'setor',$setores); ?>
                <?php echo $form->error($model,'setor'); */ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'dt_inicio'); ?>
		<?php echo $form->textField($model,'dt_inicio'); ?>
		<?php echo $form->error($model,'dt_inicio'); */?>
          <b>Abertura da OS: </b><?php echo $model->dataBR($model->dt_inicio); ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'dt_fim'); ?>
		<?php echo $form->textField($model,'dt_fim'); ?>
		<?php echo $form->error($model,'dt_fim');*/ ?>
	</div>

	<div class="row">
		<?php /*echo $form->labelEx($model,'dt_primeiro_contato'); ?>
		<?php echo $form->textField($model,'dt_primeiro_contato'); ?>
		<?php echo $form->error($model,'dt_primeiro_contato');*/ ?>
	</div>
        
        <?php
          // final de verificação de usuário admin
        endif;
        ?>

	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Criar' : 'Salvar'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->