<?php

/**
 * This is the model class for table "feriado".
 *
 * The followings are the available columns in table 'feriado':
 * @property integer $idFeriado
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
			array('idFeriado, dtFeriado, horaInicial, horaFinal', 'required'),
			array('idFeriado, parcial', 'numerical', 'integerOnly'=>true),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('idFeriado, dtFeriado, horaInicial, horaFinal, parcial', 'safe', 'on'=>'search'),
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
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'idFeriado' => 'Id Feriado',
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
		$criteria->compare('dtFeriado',$this->dtFeriado,true);
		$criteria->compare('horaInicial',$this->horaInicial,true);
		$criteria->compare('horaFinal',$this->horaFinal,true);
		$criteria->compare('parcial',$this->parcial);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
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
