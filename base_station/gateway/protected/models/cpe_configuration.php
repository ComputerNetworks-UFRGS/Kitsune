<?php

/**
 * This is the model class for table "cpe_configuration".
 *
 * The followings are the available columns in table 'cpe_configuration':
 * @property integer $id
 * @property string $timestamp
 * @property string $status
 * @property string $cpe_ids
 * @property string $wranIfSmSsaChAvailabilityCheckTime
 * @property string $wranIfSmSsaNonOccupancyPeriod
 * @property string $wranIfSmSsaChannelOpeningTxTime
 * @property string $wranIfSmManagedChannel
 * @property string $wranIfSsaSensingChannel
 * @property string $DecisionGamaWeight
 * @property string $DecisionRssiMinValue
 * @property string $DecisionRssiMaxValue
 * @property string $wranIfGenericObj1
 * @property string $wranIfGenericObj2
 * @property string $wranIfGenericObj3
 * @property string $wranIfGenericObj4
 */
class cpe_configuration extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cpe_configuration';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timestamp, status, cpe_ids', 'required'),
			array('timestamp', 'length', 'max'=>20),
			array('status, cpe_ids, wranIfSmSsaChAvailabilityCheckTime, wranIfSmSsaNonOccupancyPeriod, wranIfSmSsaChannelOpeningTxTime, wranIfSmManagedChannel, wranIfSsaSensingChannel, DecisionGamaWeight, DecisionRssiMinValue, DecisionRssiMaxValue, wranIfGenericObj1, wranIfGenericObj2, wranIfGenericObj3, wranIfGenericObj4', 'length', 'max'=>128),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, timestamp, status, cpe_ids, wranIfSmSsaChAvailabilityCheckTime, wranIfSmSsaNonOccupancyPeriod, wranIfSmSsaChannelOpeningTxTime, wranIfSmManagedChannel, wranIfSsaSensingChannel, DecisionGamaWeight, DecisionRssiMinValue, DecisionRssiMaxValue, wranIfGenericObj1, wranIfGenericObj2, wranIfGenericObj3, wranIfGenericObj4', 'safe', 'on'=>'search'),
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
			'timestamp' => 'Timestamp',
			'status' => 'Status',
			'cpe_ids' => 'Cpe Ids',
			'wranIfSmSsaChAvailabilityCheckTime' => 'Wran If Sm Ssa Ch Availability Check Time',
			'wranIfSmSsaNonOccupancyPeriod' => 'Wran If Sm Ssa Non Occupancy Period',
			'wranIfSmSsaChannelOpeningTxTime' => 'Wran If Sm Ssa Channel Opening Tx Time',
			'wranIfSmManagedChannel' => 'Wran If Sm Managed Channel',
			'wranIfSsaSensingChannel' => 'Wran If Ssa Sensing Channel',
			'DecisionGamaWeight' => 'Decision Gama Weight',
			'DecisionRssiMinValue' => 'Decision Rssi Min Value',
			'DecisionRssiMaxValue' => 'Decision Rssi Max Value',
			'wranIfGenericObj1' => 'Wran If Generic Obj1',
			'wranIfGenericObj2' => 'Wran If Generic Obj2',
			'wranIfGenericObj3' => 'Wran If Generic Obj3',
			'wranIfGenericObj4' => 'Wran If Generic Obj4',
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

		$criteria->compare('timestamp',$this->timestamp,true);

		$criteria->compare('status',$this->status,true);

		$criteria->compare('cpe_ids',$this->cpe_ids,true);

		$criteria->compare('wranIfSmSsaChAvailabilityCheckTime',$this->wranIfSmSsaChAvailabilityCheckTime,true);

		$criteria->compare('wranIfSmSsaNonOccupancyPeriod',$this->wranIfSmSsaNonOccupancyPeriod,true);

		$criteria->compare('wranIfSmSsaChannelOpeningTxTime',$this->wranIfSmSsaChannelOpeningTxTime,true);

		$criteria->compare('wranIfSmManagedChannel',$this->wranIfSmManagedChannel,true);

		$criteria->compare('wranIfSsaSensingChannel',$this->wranIfSsaSensingChannel,true);

		$criteria->compare('DecisionGamaWeight',$this->DecisionGamaWeight,true);

		$criteria->compare('DecisionRssiMinValue',$this->DecisionRssiMinValue,true);

		$criteria->compare('DecisionRssiMaxValue',$this->DecisionRssiMaxValue,true);

		$criteria->compare('wranIfGenericObj1',$this->wranIfGenericObj1,true);

		$criteria->compare('wranIfGenericObj2',$this->wranIfGenericObj2,true);

		$criteria->compare('wranIfGenericObj3',$this->wranIfGenericObj3,true);

		$criteria->compare('wranIfGenericObj4',$this->wranIfGenericObj4,true);

		return new CActiveDataProvider('cpe_configuration', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return cpe_configuration the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}