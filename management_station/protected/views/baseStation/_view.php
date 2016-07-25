<div class="bsview">

	<b><?php echo CHtml::encode( "Base Station ID"); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->bsid),array('view','id'=>$data->bsid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('geolocation')); ?>:</b>
	<?php echo CHtml::encode($data->geolocation); ?>
	<br />

	<b><?php echo CHtml::encode('Network ID'); ?>:</b>
	<?php echo CHtml::encode($data->network_id); ?>
	<br />

    <b><?php echo CHtml::encode('-> Gateway Configuration'); ?>:</b>
	<?php echo CHtml::encode($data->gatewayConfigs[end((array_keys($data->gatewayConfigs)))]['id']); ?>
	<br />

    <b><?php echo CHtml::encode('Status'); ?>:</b>
	<?php echo CHtml::encode($data->gatewayConfigs[end((array_keys($data->gatewayConfigs)))]['status']); ?>
	<br />

    <b><?php echo CHtml::encode('Polling Interval'); ?>:</b>
	<?php echo CHtml::encode($data->gatewayConfigs[end((array_keys($data->gatewayConfigs)))]['pollInterval']); ?>
	<br />

    <b><?php echo CHtml::encode('Request Timeout'); ?>:</b>
	<?php echo CHtml::encode($data->gatewayConfigs[end((array_keys($data->gatewayConfigs)))]['requestTimeout']); ?>
	<br />

    <b><?php echo CHtml::encode('Clear Cache?'); ?>:</b>
	<?php echo CHtml::encode($data->gatewayConfigs[end((array_keys($data->gatewayConfigs)))]['clearCache']); ?>
	<br />

</div>
