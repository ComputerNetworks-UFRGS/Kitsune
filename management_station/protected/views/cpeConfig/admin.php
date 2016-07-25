<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */

$this->breadcrumbs=array(
	'Cpe Configs'=>array('index'),
	'Manage',
);

$this->menu=array(
	array('label'=>'List CpeConfig', 'url'=>array('index')),
	array('label'=>'Create CpeConfig', 'url'=>array('create')),
);

Yii::app()->clientScript->registerScript('search', "
$('.search-button').click(function(){
	$('.search-form').toggle();
	return false;
});
$('.search-form form').submit(function(){
	$('#cpe-config-grid').yiiGridView('update', {
		data: $(this).serialize()
	});
	return false;
});
");
?>

<h1>Manage Cpe Configs</h1>

<p>
You may optionally enter a comparison operator (<b>&lt;</b>, <b>&lt;=</b>, <b>&gt;</b>, <b>&gt;=</b>, <b>&lt;&gt;</b>
or <b>=</b>) at the beginning of each of your search values to specify how the comparison should be done.
</p>

<?php echo CHtml::link('Advanced Search','#',array('class'=>'search-button')); ?>
<div class="search-form" style="display:none">
<?php $this->renderPartial('_search',array(
	'model'=>$model,
)); ?>
</div><!-- search-form -->

<?php $this->widget('zii.widgets.grid.CGridView', array(
	'id'=>'cpe-config-grid',
	'dataProvider'=>$model->search(),
	'filter'=>$model,
	'columns'=>array(
		'cpe_id',
		'time_stamp',
		'id',
		'cpe_timestamp',
		'status',
		'cpe_ids',
		/*
		'wranIfSmSsaChAvailabilityCheckTime',
		'wranIfSmSsaNonOccupancyPeriod',
		'wranIfSmSsaChannelOpeningTxTime',
		'wranIfSmManagedChannel',
		'wranIfSsaSensingChannel',
		'DecisionGamaWeight',
		'DecisionRssiMinValue',
		'DecisionRssiMaxValue',
		'wranIfGenericObj1',
		'wranIfGenericObj2',
		'wranIfGenericObj3',
		'wranIfGenericObj4',
		*/
		array(
			'class'=>'CButtonColumn',
		),
	),
)); ?>
