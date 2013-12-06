<?php /* @var $this Controller */ ?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
	<meta name="language" content="en" />

	<!-- blueprint CSS framework -->
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/screen.css" media="screen, projection" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/print.css" media="print" />
	<!--[if lt IE 8]>
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/ie.css" media="screen, projection" />
	<![endif]-->

	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/main.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->request->baseUrl; ?>/css/form.css" />

	<title><?php echo CHtml::encode($this->pageTitle); ?></title>
</head>

<body>

<div class="container" id="page">

	<div id="header">
          <div id="logo">
            <img src="<?php echo Yii::app()->request->baseUrl; ?>/images/logo.png" /> <?php echo CHtml::encode(Yii::app()->name); ?>
            
            <?php if(!Yii::app()->user->isGuest):?>
            <br /> Bem vindo <strong><?php echo Yii::app()->user->usuarioLogado->nome; //echo Yii::app()->user->getState('usuarioLogado')->nome; ?></strong>
            <?php endif; ?>
          </div>
	</div><!-- header -->

	<div id="mainmenu">
		<?php $this->widget('zii.widgets.CMenu',array(
			'items'=>array(
				array('label'=>'Home',      'url'=>array('/site/index')),
                                
                                # TAREFAS
				array('label'=>"OS's",   'url'=>array('/tarefas/'), 'visible'=>!Yii::app()->user->isGuest && !Yii::app()->user->getState('isAdmin')),
                                array('label'=>"OS's",   'url'=>array('/tarefas/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
                                
                                #USUARIOS E SETORES
                                array('label'=>'Usuários',  'url'=>array('/usuarios/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
                                array('label'=>'Setores',   'url'=>array('/setores/admin'), 'visible'=>!Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin')),
                                array('label'=>'Usuarios&Setores',   'url'=>array('/usuariossetores/admin'), 'visible'=> !Yii::app()->user->isGuest && Yii::app()->user->getState('isAdmin') ),
                            
				array('label'=>'Contato',   'url'=>array('/site/contact')),
				array('label'=>'Logar',     'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
				array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)
			),
		)); ?>
	</div><!-- mainmenu -->
       
	<?php if(isset($this->breadcrumbs)):?>
		<?php $this->widget('zii.widgets.CBreadcrumbs', array(
			'links'=>$this->breadcrumbs,
		)); ?><!-- breadcrumbs -->
	<?php endif?>

	<?php echo $content; ?>

	<div class="clear"></div>

	<div id="footer">
		Copyright &copy; <?php echo date('Y'); ?> por EPSJV<br/>
		Todos os direitos reservados.<br/>
		
	</div><!-- footer -->

</div><!-- page -->

</body>
</html>
