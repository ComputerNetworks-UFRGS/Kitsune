<?php
$this->breadcrumbs=array(
	'Sensing Infos'=>array('index'),
	$model->sensing_id,
);

$this->menu=array(
	array('label'=>'List SensingInfo','url'=>array('index')),
	array('label'=>'Create SensingInfo','url'=>array('create')),
	array('label'=>'Update SensingInfo','url'=>array('update','id'=>$model->sensing_id)),
	array('label'=>'Delete SensingInfo','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->sensing_id),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage SensingInfo','url'=>array('admin')),
);
?>

<h1>View SensingInfo #<?php echo $model->sensing_id; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'sensing_id',
		'timestamp',
		'cpe_id',
		'wranDevCpeUpgradeFileName',
		'wranIfBsSfld',
		'wranCpeTxThroughput',
		'wranIfSmSizeWranOccupiedChannelSet',
		'wranIfSmWranOccupiedChannelSet',
		'wranIfSsaSensingChannel',
		'wranIfSsaTimeLastSensing',
		'wranIfSsaTimeLastPositive',
		'wranIfSsaSensingPathRssi',
		'wranIfSsaWranPathRssi',
		'wranIfSsaSignalType',
		'wranIfSsaWranServiceAdvertisement',
		'wranIfSsaIdcUpdIndication',
		'wranIfSsaCpeGeolocation',
	),
)); ?>
