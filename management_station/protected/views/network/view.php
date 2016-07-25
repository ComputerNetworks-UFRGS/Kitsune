<?php
$this->breadcrumbs=array(
	'Networks'=>array('index'),
	$model->name,
);

$this->menu=array(
	array('label'=>'List Network','url'=>array('index')),
	array('label'=>'Create Network','url'=>array('create')),
	array('label'=>'Update Network','url'=>array('update','id'=>$model->networkid)),
	array('label'=>'Delete Network','url'=>'#','linkOptions'=>array('submit'=>array('delete','id'=>$model->networkid),'confirm'=>'Are you sure you want to delete this item?')),
	array('label'=>'Manage Network','url'=>array('admin')),
);
?>

<h1>View Network #<?php echo $model->networkid; ?></h1>

<?php $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	'attributes'=>array(
		'networkid',
		'name',
		'description',
	),
)); ?>
