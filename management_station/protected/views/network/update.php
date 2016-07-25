<?php
$this->breadcrumbs=array(
	'Networks'=>array('index'),
	$model->name=>array('view','id'=>$model->networkid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Network','url'=>array('index')),
	array('label'=>'Create Network','url'=>array('create')),
	array('label'=>'View Network','url'=>array('view','id'=>$model->networkid)),
	array('label'=>'Manage Network','url'=>array('admin')),
);
?>

<h1>Update Network <?php echo $model->networkid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>