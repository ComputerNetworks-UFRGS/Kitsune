#!/bin/bash

# Lucas Bondan - 05/08/2013
#
# Script to create the MIB objects files with default values.
# OBS.: Run as root!

defaultDIR=/usr/local/etc/CrObjectsFiles

if [ -d "$defaultDIR" ]; then	# if dir does not exist
	rm -rf $defaultDIR/*			# clear default dir
else
	mkdir $defaultDIR				# create default dir
fi

#### Old MIB ####
#echo -n "SW Version: 2.0" > $defaultDIR/wranDevCpeUpgradeFileName
#echo -n "1" > $defaultDIR/wranIfBsCpeNotificationObjectsTable
#echo -n "1" > $defaultDIR/wranIfBsSfld
#echo -n "10" > $defaultDIR/wranCpeTxThroughput
#echo -n "1" > $defaultDIR/wranIfSmSsaChannelDetectionTime
#echo -n "2" > $defaultDIR/wranSsaSensingWindow
#echo -n "95" > $defaultDIR/wranSsaSensingConfidenceLevel
#echo -n "111" > $defaultDIR/wranSsaRssi
#echo -n "10101011" > $defaultDIR/wranSsaSignalTypeVector
#echo -n "-29.039526,-52.295051" > $defaultDIR/wranIfBsMgmtLocation
#echo -n "Cognitive Radio MIB Identifier (1300)" > $defaultDIR/wranCognitiveRadio

#### MIB 08/08 ####
#echo -n "SW Version: 2.0" > $defaultDIR/wranDevCpeUpgradeFileName
#echo -n "1" > $defaultDIR/wranIfBsSfld
#echo -n "10" > $defaultDIR/wranCpeTxThroughput
#echo -n "8" > $defaultDIR/wranIfSmSizeWranOccupiedChannelSet
#echo -n "10101110" > $defaultDIR/wranIfSmWranOccupiedChannelSet
#echo -n "1/2" > $defaultDIR/wranIfSsaSensingChannel
#echo -n "12:40:35/12:40:40" > $defaultDIR/wranIfSsaTimeLastSensing
#echo -n "12:35:35/12:35:40" > $defaultDIR/wranIfSsaTimeLastPositive
#echo -n "-111/-83" > $defaultDIR/wranIfSsaSensingPathRssi
#echo -n "-111/-83" > $defaultDIR/wranIfSsaWranPathRssi
#echo -n "1001010001010101" > $defaultDIR/wranIfSsaSignalType 
#echo -n "none" > $defaultDIR/wranIfSsaWranServiceAdvertisement
#echo -n "no" > $defaultDIR/wranIfSsaIdcUpdIndication
#-- added 14/08
#echo -n "-29.039526" > $defaultDIR/wranIfSsaCpeLatitude
#echo -n "-52.295051" > $defaultDIR/wranIfSsaCpeLongitude
#-- added 23/08:
# latitude e longitude no mesmo elemento, igual ao formato do google
#echo -n "-29.039526,-52.295051" > $defaultDIR/wranIfSsaCpeGeolocation

#### MIB Dissertation ####
echo -n "Lucas" > $defaultDIR/wranIfSmSsaChAvailabilityCheckTime
echo -n "Lucas" > $defaultDIR/wranIfSmSsaNonOccupancyPeriod
echo -n "Lucas" > $defaultDIR/wranIfSmSsaChannelOpeningTxTime
echo -n "Lucas" > $defaultDIR/wranIfSmManagedChannel
echo -n "Lucas" > $defaultDIR/wranIfSmManagedChannelStatus
echo -n "Lucas" > $defaultDIR/wranIfSmWranOccupiedChannelSet
echo -n "Lucas" > $defaultDIR/wranIfSsaSensingChannel
echo -n "Lucas" > $defaultDIR/wranIfSsaTimeLastSensing
echo -n "Lucas" > $defaultDIR/wranIfSsaSensingPathRssi
echo -n "Lucas" > $defaultDIR/DecisionOperatingChannel
echo -n "Lucas" > $defaultDIR/DecisionBackupChannel
echo -n "Lucas" > $defaultDIR/DecisionCandidateChannels
echo -n "Lucas" > $defaultDIR/DecisionGamaWeight
echo -n "Lucas" > $defaultDIR/DecisionRssiMinValue
echo -n "Lucas" > $defaultDIR/DecisionRssiMaxValue
echo -n "Lucas" > $defaultDIR/DecisionUplinkThroughput
echo -n "Lucas" > $defaultDIR/DecisionDownlinkThroughput
echo -n "Lucas" > $defaultDIR/SharingStartTime
echo -n "Lucas" > $defaultDIR/SharingStopTime
echo -n "Lucas" > $defaultDIR/SharingAllocatedBand
echo -n "Lucas" > $defaultDIR/wranIfGenericObj1
echo -n "Lucas" > $defaultDIR/wranIfGenericObj2
echo -n "Lucas" > $defaultDIR/wranIfGenericObj3
echo -n "Lucas" > $defaultDIR/wranIfGenericObj4
echo -n "Lucas" > $defaultDIR/wranIfGenericObj5
echo -n "Lucas" > $defaultDIR/wranIfGenericObj6
echo -n "Lucas" > $defaultDIR/wranIfGenericObj7
echo -n "Lucas" > $defaultDIR/wranIfGenericObj8

chmod a+rw $defaultDIR/wran*
