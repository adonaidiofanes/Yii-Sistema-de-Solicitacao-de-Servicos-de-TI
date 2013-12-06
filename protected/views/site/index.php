<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Bem vindo ao <i><?php echo CHtml::encode(Yii::app()->name); ?></i></h1>

<p>Esse sistema tem como objetivo controlar e agilizar o processo de atendimento dos serviços de informática (SINF):</p>

<p>Você deve realizar o login para ter acesso ao gerenciamento de OS's através <a href="<?php echo CHtml::encode(Yii::app()->baseUrl) .'/index.php?r=site/login'; ?>">clicando aqui</a></p>
