<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */
/* @var $form CActiveForm */
?>

<div class="wide form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'action'=>Yii::app()->createUrl($this->route),
	'method'=>'get',
)); ?>

	<div class="row">
		<?php echo $form->label($model,'cpe_id'); ?>
		<?php echo $form->textField($model,'cpe_id',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'time_stamp'); ?>
		<?php echo $form->textField($model,'time_stamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'id'); ?>
		<?php echo $form->textField($model,'id'); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpe_timestamp'); ?>
		<?php echo $form->textField($model,'cpe_timestamp',array('size'=>20,'maxlength'=>20)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'cpe_ids'); ?>
		<?php echo $form->textField($model,'cpe_ids',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfSmSsaChAvailabilityCheckTime'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaChAvailabilityCheckTime',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfSmSsaNonOccupancyPeriod'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaNonOccupancyPeriod',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfSmSsaChannelOpeningTxTime'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaChannelOpeningTxTime',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfSmManagedChannel'); ?>
		<?php echo $form->textField($model,'wranIfSmManagedChannel',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfSsaSensingChannel'); ?>
		<?php echo $form->textField($model,'wranIfSsaSensingChannel',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DecisionGamaWeight'); ?>
		<?php echo $form->textField($model,'DecisionGamaWeight',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DecisionRssiMinValue'); ?>
		<?php echo $form->textField($model,'DecisionRssiMinValue',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'DecisionRssiMaxValue'); ?>
		<?php echo $form->textField($model,'DecisionRssiMaxValue',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfGenericObj1'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj1',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfGenericObj2'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj2',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfGenericObj3'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj3',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row">
		<?php echo $form->label($model,'wranIfGenericObj4'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj4',array('size'=>60,'maxlength'=>128)); ?>
	</div>

	<div class="row buttons">
		<?php echo CHtml::submitButton('Search'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- search-form -->