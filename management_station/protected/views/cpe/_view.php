<div class="cpeview">

	<b><?php echo CHtml::encode('CPE ID (IP)'); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->cpeid),array('view','id'=>$data->cpeid)); ?>
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

        <b><?php echo CHtml::encode('Base Station'); ?>:</b>
        <?php echo CHtml::link(CHtml::encode(BaseStation::model()->findByPk($data->bs_id)->name), array('//baseStation/view', 'id'=>$data->bs_id)); ?>
        <br />
</div>