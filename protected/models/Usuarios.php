<?php

/**
 * This is the model class for table "usuarios".
 *
 * The followings are the available columns in table 'usuarios':
 * @property integer $id
 * @property string $nome
 * @property string $email
 * @property integer $setor
 * @property integer $administrador
 *
 * The followings are the available model relations:
 * @property Tarefas[] $tarefases
 * @property Setores $setor0
 */
class Usuarios extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'usuarios';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
                        array('nome, email', 'required'),
                        array('email', 'unique'),
			array('setor', 'numerical', 'integerOnly'=>true),
			array('nome', 'length', 'max'=>255),
                        array('email', 'email'),
                        array('administrador', 'numerical', 'integerOnly'=>true),
                        array('senha', 'required', 'on' => 'insert'),
                        //array('senha', 'authenticate'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('id, nome, email, setor, administrador', 'safe', 'on'=>'search'),
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
			'tarefases' => array(self::HAS_MANY, 'Tarefas', 'responsavel'),
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
			'nome' => 'Nome',
			'email' => 'Email',
			'setor' => 'Setor',
                        'senha' => 'Senha',
                        'administrador' => 'Administrador',
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
		$criteria->compare('nome',$this->nome,true);
		$criteria->compare('email',$this->email,true);
		$criteria->compare('setor',$this->setor);
                $criteria->compare('administrador', $this->administrador);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Usuarios the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
        
        public function isAdminUser() {
                return $this->getState('isAdminUser');  
        }
        
        public function chkAdmin(){
          if($this->administrador == 1)
            return true;
          else
            return false;
        }
        
        public function verificarAdmin($str){
          if( $str == '1' ){
            return 'Sim';
          } else {
            return 'Não';
          }
        }
        
}