<?php
$this->breadcrumbs=array(
	'Networks',
);

$this->menu=array(
	array('label'=>'Create Network','url'=>array('create')),
	array('label'=>'Manage Network','url'=>array('admin')),
);
?>

<h1>Networks</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
