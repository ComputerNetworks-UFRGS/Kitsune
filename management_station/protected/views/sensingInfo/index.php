<?php
$this->breadcrumbs=array(
	'Sensing Infos',
);

$this->menu=array(
	array('label'=>'Create SensingInfo','url'=>array('create')),
	array('label'=>'Manage SensingInfo','url'=>array('admin')),
);
?>

<h1>Sensing Infos</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
