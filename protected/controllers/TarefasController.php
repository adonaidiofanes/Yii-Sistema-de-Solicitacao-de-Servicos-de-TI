<?php

class TarefasController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/column2';

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
         * ----------------------
         * 
         * Verificar se o usuario tem o role 'admin' e adiciona as permissoes q ele possui
         * Caso nao seja admin, bloqueie algumas funções 
         * Os papeis que contenham permissao estão no components/UserIdentity.php
         * 
         * ----------------------
	 */
	public function accessRules()
        {
          if( Yii::app()->user->getState('role') =="admin"){
            $permissoes = array('index','view','create','update','admin','delete');
          } else {
            $permissoes = array('index', 'view', 'create');
          }

        return array(
          array('allow', // allow admin user to perform 'admin' and 'delete' actions
            'actions'=> $permissoes,
            'users'=>array('@'),
          ),
          array('deny',  // deny all users
            'users'=>array('*'),
          ),
        );
      }

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new Tarefas;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                //$setores = Setores::model()->findAll();
                $setores = CHtml::listData(Setores::model()->findAll(), 'id', 'nome');
                
		if(isset($_POST['Tarefas']))
		{
			$model->attributes=$_POST['Tarefas'];
                        $model->owner = Yii::app()->user->getId();
                        
                        // Se o objeto ainda nao tiver uma dt_inicio definida
                        // Adicionar uma nova data para o primeiro atendimento
                        if(empty($model->dt_inicio)){
                          $model->dt_inicio = date('Y-m-d H:i:s');
                        }
                        
                        $model->setor = Yii::app()->user->getState('usuarioLogado')->setor;
                        $model->responsavel = NULL;
                        $model->comentario  = NULL;
                        $model->dt_fim = NULL;
                        $model->dt_primeiro_contato = NULL;
                        $model->dt_fim_provisorio = NULL;
                        
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('create',array(
			'model'=>$model,
                        'setores' => $setores,
		));
	}

	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

                $setores = CHtml::listData(Setores::model()->findAll(), 'id', 'nome');
                
		if(isset($_POST['Tarefas']))
		{
                  $dataNow = date('Y-m-d H:i:s');
                  $model->attributes=$_POST['Tarefas'];
                  
                  // Verificar se existe um primeiro contato, caso nao exista nessa hora que é adicionado um primeiro contato de acordo com a data atual
                  if(empty($model->dt_primeiro_contato)){ $model->dt_primeiro_contato = $dataNow; }
                  
//                  echo '<pre>';
//                  print_r($_POST);
//                  echo '</pre>';
                  
                  /*
                   * MANIPULAÇÃO DE DATAS DE ACORDO COM O STATUS DA OS
                   */
                  switch(self::verificarStatus($_POST['Tarefas']['status'])){
                    // RF03 - Requisição Negada – O sistema salva a data atual como “dt_fim” e “dt_primeiro_contato”.
                    case "Negada"    : $model->atualizarNegada(); break;
                    
                    // RF05 - Requisição Resolvida – O sistema grava a data atual como “dt_fim”.
                    case "Resolvida" : $model->dt_fim = $dataNow; break;
                    
                    // RF04 - Requisição Resolvido Provisoriamente – O sistema salva a data atual como “dt_fim_provisorio”.
                    case "Resolvida Provisioriamente" : $model->dt_fim_provisorio = $dataNow; break;

                  }
                  
                  if($model->save()){
                    $this->redirect(array('view','id'=>$model->id));
                  }
		}

		$this->render('update',array(
			'model'=>$model,
                        'setores' => $setores,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
            $dataProvider=new CActiveDataProvider('Tarefas', array(
              'criteria'=>array(
                'condition'=>'owner=:ownerId',
                'params'=>array(':ownerId'=>Yii::app()->user->getId()),
                'order'=>'dt_inicio DESC',
              ),
            ));
            
          $this->render('index',array(
                  'dataProvider'=>$dataProvider,
          ));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Tarefas('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Tarefas']))
			$model->attributes=$_GET['Tarefas'];
                
		$this->render('admin',array(
			'model'=>$model,
		));
	}
        

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return Tarefas the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=Tarefas::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param Tarefas $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='tarefas-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
        
         /*
         * Verificar status da Tarefa
         * 0: Pendente; 1: Em andamento; 2: Resolvida Provisioriamente; 3:Resolvida; 4: Negada
         */
        public function verificarStatus($statusTarefa){
          switch($statusTarefa){
            case 0 : $retorno = 'Pendente'; break;
            case 1 : $retorno = 'Em andamento'; break;
            case 2 : $retorno = 'Resolvida Provisioriamente'; break;
            case 3 : $retorno = 'Resolvida'; break;
            case 4 : $retorno = 'Negada'; break;
            default : $retorno = 'Nao informado';
          }
          return $retorno;
        }
        
        /*
         * Buscar o nome do responsavel por uma tarefa
         */
        public function verificarResponsavel($str){
          if($str == "" || $str == NULL){
            return "Não definido";
          } else if($str != ""){
            return Usuarios::model()->findByPk($str)->nome;
          }
        }
        
        /* 
         * Todos os status disponiveis da tarefa
         */
        public function statusDisponiveis(){
          $r = array('0' => 'Pendente', '1' => 'Em andamento', '2' => 'Resolvida Provisioriamente', '3' => 'Resolvida', '4' => 'Negada');
          return $r;
        }
        
}
