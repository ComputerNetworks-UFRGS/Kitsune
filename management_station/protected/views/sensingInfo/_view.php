<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('sensing_id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->sensing_id),array('view','id'=>$data->sensing_id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpe_id')); ?>:</b>
	<?php echo CHtml::encode($data->cpe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranDevCpeUpgradeFileName')); ?>:</b>
	<?php echo CHtml::encode($data->wranDevCpeUpgradeFileName); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfBsSfld')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfBsSfld); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranCpeTxThroughput')); ?>:</b>
	<?php echo CHtml::encode($data->wranCpeTxThroughput); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmSizeWranOccupiedChannelSet')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmSizeWranOccupiedChannelSet); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmWranOccupiedChannelSet')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmWranOccupiedChannelSet); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaSensingChannel')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaSensingChannel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaTimeLastSensing')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaTimeLastSensing); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaTimeLastPositive')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaTimeLastPositive); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaSensingPathRssi')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaSensingPathRssi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaWranPathRssi')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaWranPathRssi); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaSignalType')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaSignalType); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaWranServiceAdvertisement')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaWranServiceAdvertisement); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaIdcUpdIndication')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaIdcUpdIndication); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaCpeGeolocation')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaCpeGeolocation); ?>
	<br />

	*/ ?>

</div>