<?php
$this->breadcrumbs=array(
	'CPEs',
);

$this->menu=array(
	array('label'=>'Create CPE','url'=>array('create')),
	array('label'=>'Manage CPE','url'=>array('admin')),
);
?>

<h1>CPEs</h1>

<?php $this->widget('bootstrap.widgets.TbListView',array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
