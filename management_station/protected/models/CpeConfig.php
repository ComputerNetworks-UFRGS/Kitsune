<?php

/**
 * This is the model class for table "kitsune_cpe_config".
 *
 * The followings are the available columns in table 'kitsune_cpe_config':
 * @property string $cpe_id
 * @property string $time_stamp
 * @property integer $id
 * @property string $cpe_timestamp
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
 *
 * The followings are the available model relations:
 * @property Cpe $cpe
 */
class CpeConfig extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kitsune_cpe_config';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('cpe_id', 'required'),
			array('cpe_id, status, cpe_ids, wranIfSmSsaChAvailabilityCheckTime, wranIfSmSsaNonOccupancyPeriod, wranIfSmSsaChannelOpeningTxTime, wranIfSmManagedChannel, wranIfSsaSensingChannel, DecisionGamaWeight, DecisionRssiMinValue, DecisionRssiMaxValue, wranIfGenericObj1, wranIfGenericObj2, wranIfGenericObj3, wranIfGenericObj4', 'length', 'max'=>128),
			array('cpe_timestamp', 'length', 'max'=>20),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('cpe_id, time_stamp, id, cpe_timestamp, status, cpe_ids, wranIfSmSsaChAvailabilityCheckTime, wranIfSmSsaNonOccupancyPeriod, wranIfSmSsaChannelOpeningTxTime, wranIfSmManagedChannel, wranIfSsaSensingChannel, DecisionGamaWeight, DecisionRssiMinValue, DecisionRssiMaxValue, wranIfGenericObj1, wranIfGenericObj2, wranIfGenericObj3, wranIfGenericObj4', 'safe', 'on'=>'search'),
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
			'cpe' => array(self::BELONGS_TO, 'Cpe', 'cpe_id'),
		);
	}

	/**
	 * @return array customized attribute labels (name=>label)
	 */
	public function attributeLabels()
	{
		return array(
			'cpe_id' => 'Cpe',
			'time_stamp' => 'Time Stamp',
			'id' => 'ID',
			'cpe_timestamp' => 'Cpe Timestamp',
			'status' => 'Status',
			'cpe_ids' => 'Cpe Ids',
			'wranIfSmSsaChAvailabilityCheckTime' => 'Sensing Window',
			'wranIfSmSsaNonOccupancyPeriod' => 'Silent Time',
			'wranIfSmSsaChannelOpeningTxTime' => 'Max. Transmission Time',
			'wranIfSmManagedChannel' => 'Managed Channel',
			'wranIfSsaSensingChannel' => 'Sensing Channel List',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('cpe_id',$this->cpe_id,true);
		$criteria->compare('time_stamp',$this->time_stamp,true);
		$criteria->compare('id',$this->id);
		$criteria->compare('cpe_timestamp',$this->cpe_timestamp,true);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return CpeConfig the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
