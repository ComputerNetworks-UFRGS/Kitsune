<?php
$this->breadcrumbs=array(
	'Base Stations',
);

$this->menu=array(
	array('label'=>'Create BaseStation','url'=>array('create')),
	array('label'=>'Manage BaseStation','url'=>array('admin')),
);
?>

<h1>Base Stations</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
