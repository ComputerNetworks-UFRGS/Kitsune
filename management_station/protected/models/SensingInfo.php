<?php

/**
 * This is the model class for table "kitsune_sensing_info".
 *
 * The followings are the available columns in table 'kitsune_sensing_info':
 * @property integer $sensing_id
 * @property string $timestamp
 * @property string $cpe_id
 * @property string $wranDevCpeUpgradeFileName
 * @property string $wranIfBsSfld
 * @property string $wranCpeTxThroughput
 * @property string $wranIfSmSizeWranOccupiedChannelSet
 * @property string $wranIfSmWranOccupiedChannelSet
 * @property string $wranIfSsaSensingChannel
 * @property string $wranIfSsaTimeLastSensing
 * @property string $wranIfSsaTimeLastPositive
 * @property string $wranIfSsaSensingPathRssi
 * @property string $wranIfSsaWranPathRssi
 * @property string $wranIfSsaSignalType
 * @property string $wranIfSsaWranServiceAdvertisement
 * @property string $wranIfSsaIdcUpdIndication
 * @property string $wranIfSsaCpeGeolocation
 * @property string $wranIfSmManagedChannelStatus
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
 *
 * The followings are the available model relations:
 * @property Cpe $cpe
 */
class SensingInfo extends CActiveRecord
{
	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return 'kitsune_sensing_info';
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
			array('cpe_id, wranIfSmManagedChannelStatus, DecisionOperatingChannel, DecisionBackupChannel, DecisionCandidateChannels, DecisionUplinkThroughput, DecisionDownlinkThroughput, wranIfGenericObj5, wranIfGenericObj6, wranIfGenericObj7, wranIfGenericObj8', 'length', 'max'=>128),
			array('SharingStartTime, SharingStopTime, SharingAllocatedBand', 'length', 'max'=>20),
			array('timestamp, wranDevCpeUpgradeFileName, wranIfBsSfld, wranCpeTxThroughput, wranIfSmSizeWranOccupiedChannelSet, wranIfSmWranOccupiedChannelSet, wranIfSsaSensingChannel, wranIfSsaTimeLastSensing, wranIfSsaTimeLastPositive, wranIfSsaSensingPathRssi, wranIfSsaWranPathRssi, wranIfSsaSignalType, wranIfSsaWranServiceAdvertisement, wranIfSsaIdcUpdIndication, wranIfSsaCpeGeolocation', 'safe'),
			// The following rule is used by search().
			// @todo Please remove those attributes that should not be searched.
			array('sensing_id, timestamp, cpe_id, wranDevCpeUpgradeFileName, wranIfBsSfld, wranCpeTxThroughput, wranIfSmSizeWranOccupiedChannelSet, wranIfSmWranOccupiedChannelSet, wranIfSsaSensingChannel, wranIfSsaTimeLastSensing, wranIfSsaTimeLastPositive, wranIfSsaSensingPathRssi, wranIfSsaWranPathRssi, wranIfSsaSignalType, wranIfSsaWranServiceAdvertisement, wranIfSsaIdcUpdIndication, wranIfSsaCpeGeolocation, wranIfSmManagedChannelStatus, DecisionOperatingChannel, DecisionBackupChannel, DecisionCandidateChannels, DecisionUplinkThroughput, DecisionDownlinkThroughput, SharingStartTime, SharingStopTime, SharingAllocatedBand, wranIfGenericObj5, wranIfGenericObj6, wranIfGenericObj7, wranIfGenericObj8', 'safe', 'on'=>'search'),
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
			'sensing_id' => 'Sensing',
			'timestamp' => 'Timestamp',
			'cpe_id' => 'Cpe',
			'wranDevCpeUpgradeFileName' => 'Wran Dev Cpe Upgrade File Name',
			'wranIfBsSfld' => 'Wran If Bs Sfld',
			'wranCpeTxThroughput' => 'Wran Cpe Tx Throughput',
			'wranIfSmSizeWranOccupiedChannelSet' => 'Wran If Sm Size Wran Occupied Channel Set',
			'wranIfSmWranOccupiedChannelSet' => 'Wran If Sm Wran Occupied Channel Set',
			'wranIfSsaSensingChannel' => 'Wran If Ssa Sensing Channel',
			'wranIfSsaTimeLastSensing' => 'Wran If Ssa Time Last Sensing',
			'wranIfSsaTimeLastPositive' => 'Wran If Ssa Time Last Positive',
			'wranIfSsaSensingPathRssi' => 'Wran If Ssa Sensing Path Rssi',
			'wranIfSsaWranPathRssi' => 'Wran If Ssa Wran Path Rssi',
			'wranIfSsaSignalType' => 'Wran If Ssa Signal Type',
			'wranIfSsaWranServiceAdvertisement' => 'Wran If Ssa Wran Service Advertisement',
			'wranIfSsaIdcUpdIndication' => 'Wran If Ssa Idc Upd Indication',
			'wranIfSsaCpeGeolocation' => 'Wran If Ssa Cpe Geolocation',
			'wranIfSmManagedChannelStatus' => 'Wran If Sm Managed Channel Status',
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
	 * @return CActiveDataProvider the data provider that can return the models
	 * based on the search/filter conditions.
	 */
	public function search()
	{
		// @todo Please modify the following code to remove attributes that should not be searched.

		$criteria=new CDbCriteria;

		$criteria->compare('sensing_id',$this->sensing_id);
		$criteria->compare('timestamp',$this->timestamp,true);
		$criteria->compare('cpe_id',$this->cpe_id,true);
		$criteria->compare('wranDevCpeUpgradeFileName',$this->wranDevCpeUpgradeFileName,true);
		$criteria->compare('wranIfBsSfld',$this->wranIfBsSfld,true);
		$criteria->compare('wranCpeTxThroughput',$this->wranCpeTxThroughput,true);
		$criteria->compare('wranIfSmSizeWranOccupiedChannelSet',$this->wranIfSmSizeWranOccupiedChannelSet,true);
		$criteria->compare('wranIfSmWranOccupiedChannelSet',$this->wranIfSmWranOccupiedChannelSet,true);
		$criteria->compare('wranIfSsaSensingChannel',$this->wranIfSsaSensingChannel,true);
		$criteria->compare('wranIfSsaTimeLastSensing',$this->wranIfSsaTimeLastSensing,true);
		$criteria->compare('wranIfSsaTimeLastPositive',$this->wranIfSsaTimeLastPositive,true);
		$criteria->compare('wranIfSsaSensingPathRssi',$this->wranIfSsaSensingPathRssi,true);
		$criteria->compare('wranIfSsaWranPathRssi',$this->wranIfSsaWranPathRssi,true);
		$criteria->compare('wranIfSsaSignalType',$this->wranIfSsaSignalType,true);
		$criteria->compare('wranIfSsaWranServiceAdvertisement',$this->wranIfSsaWranServiceAdvertisement,true);
		$criteria->compare('wranIfSsaIdcUpdIndication',$this->wranIfSsaIdcUpdIndication,true);
		$criteria->compare('wranIfSsaCpeGeolocation',$this->wranIfSsaCpeGeolocation,true);
		$criteria->compare('wranIfSmManagedChannelStatus',$this->wranIfSmManagedChannelStatus,true);
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

		return new CActiveDataProvider($this, array(
			'criteria'=>$criteria,
		));
	}

	/**
	 * Returns the static model of the specified AR class.
	 * Please note that you should have this exact method in all your CActiveRecord descendants!
	 * @param string $className active record class name.
	 * @return SensingInfo the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}
}
