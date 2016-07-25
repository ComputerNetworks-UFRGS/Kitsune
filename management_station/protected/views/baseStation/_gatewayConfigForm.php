<?php $form=$this->beginWidget('bootstrap.widgets.TbActiveForm',array(
	'id'=>'base-station-form',
	'enableAjaxValidation'=>false,
)); ?>

	<p class="help-block">Fields with <span class="required">*</span> are required.</p>

	<div class="row">
		<?php echo $form->errorSummary($model); ?>
	</div>

	<div class="row">
		<?php echo $form->textFieldRow($model,'polling',array('maxlength'=>128)); ?>
	</div>
	
	<div class="row">
	<?php echo $form->textFieldRow($model,'timeout',array('maxlength'=>128)); ?>
	</div>
	
	<div class="row">
	<?php echo $form->dropDownListRow($model,'cache',array('no'=>'no', 'yes'=>'yes')); ?>
	</div>
	
	
	<?php // echo $form->textAreaRow($model,'geolocation',array('rows'=>6, 'cols'=>50, 'class'=>'span8')); ?>

	<?php // echo $form->textFieldRow($model,'network_id',array('class'=>'span5','maxlength'=>128)); ?>

	<div class="form-actions">
		<?php $this->widget('bootstrap.widgets.TbButton', array(
			'buttonType'=>'submit',
			'type'=>'btn primary',
			'label'=>'Save',
		)); ?>
	</div>

<?php $this->endWidget(); ?>
