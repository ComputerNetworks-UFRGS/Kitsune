<?php

/**
 * This is the model class for table "cf_results".
 *
 * The followings are the available columns in table 'cf_results':
 * @property integer $id
 * @property string $timestamp
 * @property string $status
 * @property string $cpe_id
 * @property string $cpe_ip
 * @property string $wranIfSmManagedChannelStatus
 * @property string $wranIfSmWranOccupiedChannelSet
 * @property string $wranIfSsaTimeLastSensing
 * @property string $wranIfSsaSensingPathRssi
 * @property string $DecisionOperatingChannel
 * @property string $DecisionBackupChannel
 * @property string $DecisionCandidateChannels
 * @property string $DecisionUplinkThroughput
 * @property string $DecisionDownlinkThroughput
 * @property string $SharingStartTime
 * @property string $SharingStopTime
 * @property string $SharingAllocatedBand
 * @property string $wranIfGenericObj5
 * @property string $wranIfGenericObj6
 * @property string $wranIfGenericObj7
 * @property string $wranIfGenericObj8
 */
class cf_results extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'cf_results';
	}

	/**
	 * @return array validation rules for model attributes.
	 */
	public function rules()
	{
		// NOTE: you should only define rules for those attributes that
		// will receive user inputs.
		return array(
			array('timestamp, status, cpe_id, cpe_ip', 'required'),
			array('timestamp, SharingStartTime, SharingStopTime, SharingAllocatedBand', 'length', 'max'=>20),
			array('status, cpe_id, wranIfSmManagedChannelStatus, wranIfSmWranOccupiedChannelSet, wranIfSsaTimeLastSensing, wranIfSsaSensingPathRssi, DecisionOperatingChannel, DecisionBackupChannel, DecisionCandidateChannels, DecisionUplinkThroughput, DecisionDownlinkThroughput, wranIfGenericObj5, wranIfGenericObj6, wranIfGenericObj7, wranIfGenericObj8', 'length', 'max'=>128),
			array('cpe_ip', 'length', 'max'=>10),
			// The following rule is used by search().
			// Please remove those attributes that should not be searched.
			array('id, timestamp, status, cpe_id, cpe_ip, wranIfSmManagedChannelStatus, wranIfSmWranOccupiedChannelSet, wranIfSsaTimeLastSensing, wranIfSsaSensingPathRssi, DecisionOperatingChannel, DecisionBackupChannel, DecisionCandidateChannels, DecisionUplinkThroughput, DecisionDownlinkThroughput, SharingStartTime, SharingStopTime, SharingAllocatedBand, wranIfGenericObj5, wranIfGenericObj6, wranIfGenericObj7, wranIfGenericObj8', 'safe', 'on'=>'search'),
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
			'cpe_id' => 'Cpe',
			'cpe_ip' => 'Cpe Ip',
			'wranIfSmManagedChannelStatus' => 'Wran If Sm Managed Channel Status',
			'wranIfSmWranOccupiedChannelSet' => 'Wran If Sm Wran Occupied Channel Set',
			'wranIfSsaTimeLastSensing' => 'Wran If Ssa Time Last Sensing',
			'wranIfSsaSensingPathRssi' => 'Wran If Ssa Sensing Path Rssi',
			'DecisionOperatingChannel' => 'Decision Operating Channel',
			'DecisionBackupChannel' => 'Decision Backup Channel',
			'DecisionCandidateChannels' => 'Decision Candidate Channels',
			'DecisionUplinkThroughput' => 'Decision Uplink Throughput',
			'DecisionDownlinkThroughput' => 'Decision Downlink Throughput',
			'SharingStartTime' => 'Sharing Start Time',
			'SharingStopTime' => 'Sharing Stop Time',
			'SharingAllocatedBand' => 'Sharing Allocated Band',
			'wranIfGenericObj5' => 'Wran If Generic Obj5',
			'wranIfGenericObj6' => 'Wran If Generic Obj6',
			'wranIfGenericObj7' => 'Wran If Generic Obj7',
			'wranIfGenericObj8' => 'Wran If Generic Obj8',
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

		$criteria->compare('cpe_id',$this->cpe_id,true);

		$criteria->compare('cpe_ip',$this->cpe_ip,true);

		$criteria->compare('wranIfSmManagedChannelStatus',$this->wranIfSmManagedChannelStatus,true);

		$criteria->compare('wranIfSmWranOccupiedChannelSet',$this->wranIfSmWranOccupiedChannelSet,true);

		$criteria->compare('wranIfSsaTimeLastSensing',$this->wranIfSsaTimeLastSensing,true);

		$criteria->compare('wranIfSsaSensingPathRssi',$this->wranIfSsaSensingPathRssi,true);

		$criteria->compare('DecisionOperatingChannel',$this->DecisionOperatingChannel,true);

		$criteria->compare('DecisionBackupChannel',$this->DecisionBackupChannel,true);

		$criteria->compare('DecisionCandidateChannels',$this->DecisionCandidateChannels,true);

		$criteria->compare('DecisionUplinkThroughput',$this->DecisionUplinkThroughput,true);

		$criteria->compare('DecisionDownlinkThroughput',$this->DecisionDownlinkThroughput,true);

		$criteria->compare('SharingStartTime',$this->SharingStartTime,true);

		$criteria->compare('SharingStopTime',$this->SharingStopTime,true);

		$criteria->compare('SharingAllocatedBand',$this->SharingAllocatedBand,true);

		$criteria->compare('wranIfGenericObj5',$this->wranIfGenericObj5,true);

		$criteria->compare('wranIfGenericObj6',$this->wranIfGenericObj6,true);

		$criteria->compare('wranIfGenericObj7',$this->wranIfGenericObj7,true);

		$criteria->compare('wranIfGenericObj8',$this->wranIfGenericObj8,true);

		return new CActiveDataProvider('cf_results', array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * @return cf_results the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}