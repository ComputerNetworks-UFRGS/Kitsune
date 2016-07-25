<?php
/* @var $this CpeConfigController */
/* @var $data CpeConfig */
?>

<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('id')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->id), array('view', 'id'=>$data->id)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpe_id')); ?>:</b>
	<?php echo CHtml::encode($data->cpe_id); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('time_stamp')); ?>:</b>
	<?php echo CHtml::encode($data->time_stamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpe_timestamp')); ?>:</b>
	<?php echo CHtml::encode($data->cpe_timestamp); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('status')); ?>:</b>
	<?php echo CHtml::encode($data->status); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('cpe_ids')); ?>:</b>
	<?php echo CHtml::encode($data->cpe_ids); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmSsaChAvailabilityCheckTime')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmSsaChAvailabilityCheckTime); ?>
	<br />

	<?php /*
	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmSsaNonOccupancyPeriod')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmSsaNonOccupancyPeriod); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmSsaChannelOpeningTxTime')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmSsaChannelOpeningTxTime); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSmManagedChannel')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSmManagedChannel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfSsaSensingChannel')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfSsaSensingChannel); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DecisionGamaWeight')); ?>:</b>
	<?php echo CHtml::encode($data->DecisionGamaWeight); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DecisionRssiMinValue')); ?>:</b>
	<?php echo CHtml::encode($data->DecisionRssiMinValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('DecisionRssiMaxValue')); ?>:</b>
	<?php echo CHtml::encode($data->DecisionRssiMaxValue); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfGenericObj1')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfGenericObj1); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfGenericObj2')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfGenericObj2); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfGenericObj3')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfGenericObj3); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('wranIfGenericObj4')); ?>:</b>
	<?php echo CHtml::encode($data->wranIfGenericObj4); ?>
	<br />

	*/ ?>

</div>