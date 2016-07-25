<?php
$this->breadcrumbs=array(
	'Sensing Infos'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List SensingInfo','url'=>array('index')),
	array('label'=>'Manage SensingInfo','url'=>array('admin')),
);
?>

<h1>Create SensingInfo</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>