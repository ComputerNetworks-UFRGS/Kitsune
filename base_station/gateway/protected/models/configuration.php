<?php

/**
 * This is the model class for table "configuration".
 *
 * The followings are the available columns in table 'configuration':
 * @property integer $id
 * @property string $status
 * @property integer $pollInterval
 * @property integer $requestTimeout
 * @property string $clearCache
 */
class configuration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('status, pollInterval, requestTimeout, clearCache', 'required'),
			array('pollInterval, requestTimeout', 'numerical', 'integerOnly'=>true),
			array('status, clearCache', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, status, pollInterval, requestTimeout, clearCache', 'safe', 'on'=>'search'),
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
			'status' => 'Status',
			'pollInterval' => 'Poll Interval',
			'requestTimeout' => 'Request Timeout',
			'clearCache' => 'Clear Cache',
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

		$criteria->compare('status',$this->status,true);

		$criteria->compare('pollInterval',$this->pollInterval);

		$criteria->compare('requestTimeout',$this->requestTimeout);

		$criteria->compare('clearCache',$this->clearCache,true);

		return new CActiveDataProvider('configuration', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return configuration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}