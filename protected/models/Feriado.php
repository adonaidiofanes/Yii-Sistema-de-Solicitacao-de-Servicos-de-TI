<?php

/**
 * This is the model class for table "feriado".
 *
 * The followings are the available columns in table 'feriado':
 * @property integer $idFeriado
 * @property string $nomeFeriado
 * @property string $dtFeriado
 * @property string $horaInicial
 * @property string $horaFinal
 * @property integer $parcial
 */
class Feriado extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'feriado';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('nomeFeriado, dtFeriado', 'required'),
			array('parcial', 'numerical', 'integerOnly'=>true),
			array('nomeFeriado', 'length', 'max'=>80),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFeriado, nomeFeriado, dtFeriado, horaInicial, horaFinal, parcial', 'safe', 'on'=>'search'),
                        array('parcial', 'ext.YiiConditionalValidator',
                                'if' => array(
                                    array('parcial', 'compare', 'compareValue'=>'1'),
                                ),
                                'then' => array( array('horaInicial, horaFinal', 'required') ),
                            ),
		);
	}
        
/*
public function rules()
{
    return array(
        array('customer_type', 'ext.YiiConditionalValidator',
            'if' => array(
                array('customer_type', 'compare', 'compareValue'=>"active"),
            ),
            'then' => array(
                array('birthdate, city', 'required'),
            ),
        ),
    );
}
 *  */

	/**
	 * @return array relational rules.
	 */
	public function relations()
	{
		// NOTE: you may need to adjust the relation name and the related
		// class name for the relations automatically generated below.
		return array(
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFeriado' => 'Id Feriado',
			'nomeFeriado' => 'Nome Feriado',
			'dtFeriado' => 'Dt Feriado',
			'horaInicial' => 'Hora Inicial',
			'horaFinal' => 'Hora Final',
			'parcial' => 'Parcial',
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

		$criteria->compare('idFeriado',$this->idFeriado);
		$criteria->compare('nomeFeriado',$this->nomeFeriado,true);
		$criteria->compare('dtFeriado',$this->dtFeriado,true);
		$criteria->compare('horaInicial',$this->horaInicial,true);
		$criteria->compare('horaFinal',$this->horaFinal,true);
		$criteria->compare('parcial',$this->parcial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}
        
        public function verificarParcial($str){
          if( $str == '1' ){
            return 'Sim';
          } else {
            return 'Não';
          }
        }

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Feriado the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
