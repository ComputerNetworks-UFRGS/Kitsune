<?php
$this->breadcrumbs=array(
	'Sensing Infos'=>array('index'),
	$model->sensing_id=>array('view','id'=>$model->sensing_id),
	'Update',
);

$this->menu=array(
	array('label'=>'List SensingInfo','url'=>array('index')),
	array('label'=>'Create SensingInfo','url'=>array('create')),
	array('label'=>'View SensingInfo','url'=>array('view','id'=>$model->sensing_id)),
	array('label'=>'Manage SensingInfo','url'=>array('admin')),
);
?>

<h1>Update SensingInfo <?php echo $model->sensing_id; ?></h1>

<?php echo $this->renderPartial('_form',array('model'=>$model)); ?>