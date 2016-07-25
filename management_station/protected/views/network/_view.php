<div class="view">

	<b><?php echo CHtml::encode($data->getAttributeLabel('networkid')); ?>:</b>
	<?php echo CHtml::link(CHtml::encode($data->networkid),array('view','id'=>$data->networkid)); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('name')); ?>:</b>
	<?php echo CHtml::encode($data->name); ?>
	<br />

	<b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>
	<?php echo CHtml::encode($data->description); ?>
	<br />


</div>