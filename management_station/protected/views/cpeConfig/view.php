<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */

$this->breadcrumbs=array(
	'Cpe Configs'=>array('index'),
	$model->id,
);

$this->menu=array(
	array('label'=>'List CpeConfig', 'url'=>array('index')),
	array('label'=>'Create CpeConfig', 'url'=>array('create')),
	array('label'=>'Update CpeConfig', 'url'=>array('update', 'id'=>$model->id)),
	array('label'=>'Delete CpeConfig', 'url'=>'#', 'linkOptions'=>array('submit'=>array('delete','id'=>$model->id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage CpeConfig', 'url'=>array('admin')),
);
?>

<h1>View CpeConfig #<?php echo $model->id; ?></h1>

<?php $this->widget('zii.widgets.CDetailView', array(
	'data'=>$model,
	'attributes'=>array(
		'cpe_id',
		'time_stamp',
		'id',
		'cpe_timestamp',
		'status',
		'cpe_ids',
		'wranIfSmSsaChAvailabilityCheckTime',
		'wranIfSmSsaNonOccupancyPeriod',
		'wranIfSmSsaChannelOpeningTxTime',
		'wranIfSmManagedChannel',
		'wranIfSsaSensingChannel',
		'DecisionGamaWeight',
		'DecisionRssiMinValue',
		'DecisionRssiMaxValue',
		// 'wranIfGenericObj1',
		// 'wranIfGenericObj2',
		// 'wranIfGenericObj3',
		// 'wranIfGenericObj4',
	),
)); ?>
