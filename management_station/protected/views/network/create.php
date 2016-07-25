<?php
$this->breadcrumbs=array(
	'Networks'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List Network','url'=>array('index')),
	array('label'=>'Manage Network','url'=>array('admin')),
);
?>

<h1>Create Network</h1>

<?php echo $this->renderPartial('_form', array('model'=>$model)); ?>