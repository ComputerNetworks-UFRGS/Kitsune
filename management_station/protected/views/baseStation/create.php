<?php
$this->breadcrumbs=array(
	'Base Stations'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List BaseStation','url'=>array('index')),
	array('label'=>'Manage BaseStation','url'=>array('admin')),
);
?>

<h1>Create BaseStation</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>