<?php

/**
 * This is the model class for table "tarefas".
 *
 * The followings are the available columns in table 'tarefas':
 * @property integer $id
 * @property string  $titulo
 * @property string  $descricao
 * @property integer $responsavel
 * @property integer $status
 * @property integer $setor
 * @property string  $dt_inicio
 * @property string  $dt_fim
 * @property string  $dt_primeiro_contato
 * @property string  $dt_fim_provisorio
 * @property integer $owner
 * @property string  $comentario
 *
 * The followings are the available model relations:
 * @property Usuarios $responsavel0
 * @property Setores $setor0
 */
class Tarefas extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'tarefas';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        // definir campos obrigatorios
                        array('titulo, descricao', 'required'),
			array('responsavel, status, setor', 'numerical', 'integerOnly'=>true),
			array('titulo', 'length', 'max'=>255),
                        
			array('dt_inicio, dt_fim, dt_primeiro_contato, dt_fim_provisorio', 'safe'),
                        array('comentario, responsavel','required', 'on' => 'update'),
                    
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, titulo, descricao, responsavel, status, comentario, setor, dt_inicio, dt_fim, dt_primeiro_contato, dt_fim_provisorio, owner', 'safe', 'on'=>'search'),
		);
	}

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
			'responsavel0' => array(self::BELONGS_TO, 'Usuarios', 'responsavel'),
			'setor0' => array(self::BELONGS_TO, 'Setores', 'setor'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'id' => 'ID',
			'titulo' => 'Título',
			'descricao' => 'Descrição',
			'responsavel' => 'Responsável',
			'status' => 'Status',
			'setor' => 'Setor',
			'dt_inicio' => 'Abertura da OS',
			'dt_fim' => 'Data Fim',
                        'dt_fim_provisorio' => 'Data de resolução provisória',
			'dt_primeiro_contato' => 'Data Primeiro Contato',
                        'comentario' => 'Comentário',
		);
	}

	/**
	 * Retrieves a list of models based on the current search/filter conditions.
	 *
	 * Typical usecase:
	 * - Initialize the model fields with values from filter form.
	 * - Execute this method to get CActiveDataProvider instance which will filter
	 * models according to data in model fields.
	 * - Pass data provider to CGridView, CListView or any similar widget.
	 *
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);
		$criteria->compare('titulo',$this->titulo,true);
		$criteria->compare('descricao',$this->descricao,true);
		$criteria->compare('responsavel',$this->responsavel);
		$criteria->compare('status',$this->status);
		$criteria->compare('setor',$this->setor);
		$criteria->compare('dt_inicio',$this->dt_inicio,true);
		$criteria->compare('dt_fim',$this->dt_fim,true);
		$criteria->compare('dt_primeiro_contato',$this->dt_primeiro_contato,true);
                $criteria->compare('comentario',$this->comentario,true);
                //$criteria->compare('owner', $this->owner,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
                        // Ordenar por ID ordem decrescente -----------------------------------------------------------------------------
                        'sort' => array(
                           'defaultOrder' => array(
                              'id' => CSort::SORT_DESC
                           ),
                        ),
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Tarefas the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        // RF03 - Requisição Negada – O sistema salva a data atual como “dt_fim” e “dt_primeiro_contato”.
        public function atualizarNegada(){
          $dataNow = date('Y-m-d H:i:s');
          
          if(!empty($this->dt_inicio)){
            $this->dt_inicio = $dataNow;
          }
          
          /* Verificar se aidna não existe uma dt_fim e popular ela */
          if(empty($this->dt_fim)){ 
            $this->dt_fim = $dataNow; 
          }
          /* Verificar se existe uma data de primeiro contato. Caso nao exista, adicione uma nova data no campo primeiro_contato */
          if(empty($this->dt_primeiro_contato)){
            $this->dt_primeiro_contato = $dataNow; 
          }
        }
        
        /* Formatar datas do modelo padrao BR */
        public function dataBR($str){
          return Yii::app()->dateFormatter->format("dd/MM/yyyy HH:mm:ss", $str);
        }
        
        
        
}
