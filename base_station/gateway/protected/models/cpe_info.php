<?php

/**
 * This is the model class for table "cpe_info".
 *
 * The followings are the available columns in table 'cpe_info':
 * @property integer $id
 * @property string $cpe_ip
 * @property string $config_id
 * @property string $status
 */
class cpe_info extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cpe_info';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpe_ip, config_id, status', 'required'),
			array('cpe_ip', 'length', 'max'=>20),
			array('config_id, status', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, cpe_ip, config_id, status', 'safe', 'on'=>'search'),
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
			'id' => 'Id',
			'cpe_ip' => 'Cpe Ip',
			'config_id' => 'Config',
			'status' => 'Status',
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
	 * @return CActiveDataProvider the data provider that can return the models based on the search/filter conditions.
	 */
	public function search()
	{
		// Warning: Please modify the following code to remove attributes that
		// should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('id',$this->id);

		$criteria->compare('cpe_ip',$this->cpe_ip,true);

		$criteria->compare('config_id',$this->config_id,true);

		$criteria->compare('status',$this->status,true);

		return new CActiveDataProvider('cpe_info', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return cpe_info the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}