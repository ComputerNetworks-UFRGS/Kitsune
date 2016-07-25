<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */
/* @var $form CActiveForm */
?>

<div class="form">

<?php $form=$this->beginWidget('CActiveForm', array(
	'id'=>'cpe-config-form',
	// Please note: When you enable ajax validation, make sure the corresponding
	// controller action is handling ajax validation correctly.
	// There is a call to performAjaxValidation() commented in generated controller code.
	// See class documentation of CActiveForm for details on this.
	'enableAjaxValidation'=>false,
)); ?>

	<p class="note">Fields with <span class="required">*</span> are required.</p>

	<?php echo $form->errorSummary($model); ?>

	<div class="row">
		<?php echo $form->labelEx($model,'cpe_id'); ?>
		<?php echo $form->textField($model,'cpe_id',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'cpe_id'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'time_stamp'); ?>
		<?php echo $form->textField($model,'time_stamp'); ?>
		<?php echo $form->error($model,'time_stamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpe_timestamp'); ?>
		<?php echo $form->textField($model,'cpe_timestamp',array('size'=>20,'maxlength'=>20)); ?>
		<?php echo $form->error($model,'cpe_timestamp'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'status'); ?>
		<?php echo $form->textField($model,'status',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'status'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'cpe_ids'); ?>
		<?php echo $form->textField($model,'cpe_ids',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'cpe_ids'); ?>
	</div>
-->
	<div class="row">
		<?php echo $form->labelEx($model,'wranIfSmSsaChAvailabilityCheckTime'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaChAvailabilityCheckTime',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfSmSsaChAvailabilityCheckTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfSmSsaNonOccupancyPeriod'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaNonOccupancyPeriod',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfSmSsaNonOccupancyPeriod'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfSmSsaChannelOpeningTxTime'); ?>
		<?php echo $form->textField($model,'wranIfSmSsaChannelOpeningTxTime',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfSmSsaChannelOpeningTxTime'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfSmManagedChannel'); ?>
		<?php echo $form->textField($model,'wranIfSmManagedChannel',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfSmManagedChannel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfSsaSensingChannel'); ?>
		<?php echo $form->textField($model,'wranIfSsaSensingChannel',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfSsaSensingChannel'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DecisionGamaWeight'); ?>
		<?php echo $form->textField($model,'DecisionGamaWeight',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'DecisionGamaWeight'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DecisionRssiMinValue'); ?>
		<?php echo $form->textField($model,'DecisionRssiMinValue',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'DecisionRssiMinValue'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'DecisionRssiMaxValue'); ?>
		<?php echo $form->textField($model,'DecisionRssiMaxValue',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'DecisionRssiMaxValue'); ?>
	</div>
<!--
	<div class="row">
		<?php echo $form->labelEx($model,'wranIfGenericObj1'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj1',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfGenericObj1'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfGenericObj2'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj2',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfGenericObj2'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfGenericObj3'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj3',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfGenericObj3'); ?>
	</div>

	<div class="row">
		<?php echo $form->labelEx($model,'wranIfGenericObj4'); ?>
		<?php echo $form->textField($model,'wranIfGenericObj4',array('size'=>60,'maxlength'=>128)); ?>
		<?php echo $form->error($model,'wranIfGenericObj4'); ?>
	</div>
-->
	<div class="row buttons">
		<?php echo CHtml::submitButton($model->isNewRecord ? 'Create' : 'Save'); ?>
	</div>

<?php $this->endWidget(); ?>

</div><!-- form -->
