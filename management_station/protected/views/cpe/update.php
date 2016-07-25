<?php
$this->breadcrumbs=array(
	'Cpes'=>array('index'),
	$model->name=>array('view','id'=>$model->cpeid),
	'Update',
);

$this->menu=array(
	array('label'=>'List Cpe','url'=>array('index')),
	array('label'=>'Create Cpe','url'=>array('create')),
	array('label'=>'View Cpe','url'=>array('view','id'=>$model->cpeid)),
	array('label'=>'Manage Cpe','url'=>array('admin')),
);
?>

<h1>Update Cpe <?php echo $model->cpeid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>