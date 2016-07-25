<?php

/**
 * This is the model class for table "kitsune_cpe".
 *
 * The followings are the available columns in table 'kitsune_cpe':
 * @property string $cpeid
 * @property string $name
 * @property string $description
 * @property string $bs_id
 * @property string $geolocation
 *
 * The followings are the available model relations:
 * @property BaseStation $bs
 * @property SensingInfo[] $sensingInfos
 */
class Cpe extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kitsune_cpe';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpeid, bs_id', 'required'),
			array('cpeid, bs_id', 'length', 'max'=>128),
			array('name, description, geolocation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cpeid, name, description, bs_id, geolocation', 'safe', 'on'=>'search'),
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
			'bs' => array(self::BELONGS_TO, 'BaseStation', 'bs_id'),
			'sensingInfos' => array(self::HAS_MANY, 'SensingInfo', 'cpe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cpeid' => 'Cpeid',
			'name' => 'Name',
			'description' => 'Description',
			'bs_id' => 'Bs',
			'geolocation' => 'Geolocation',
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

		$criteria->compare('cpeid',$this->cpeid,true);
		$criteria->compare('name',$this->name,true);
		$criteria->compare('description',$this->description,true);
		$criteria->compare('bs_id',$this->bs_id,true);
		$criteria->compare('geolocation',$this->geolocation,true);

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return Cpe the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
