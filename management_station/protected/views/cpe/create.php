<?php
$this->breadcrumbs=array(
	'Cpes'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Cpe','url'=>array('index')),
	array('label'=>'Manage Cpe','url'=>array('admin')),
);
?>

<h1>Create Cpe</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>