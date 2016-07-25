<?php
$this->breadcrumbs=array(
	'Base Stations'=>array('index'),
	$model->name=>array('view','id'=>$model->bsid),
	'Update',
);

$this->menu=array(
	array('label'=>'List BaseStation','url'=>array('index')),
	array('label'=>'Create BaseStation','url'=>array('create')),
	array('label'=>'View BaseStation','url'=>array('view','id'=>$model->bsid)),
	array('label'=>'Manage BaseStation','url'=>array('admin')),
);
?>

<h1>Update BaseStation <?php echo $model->bsid; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>