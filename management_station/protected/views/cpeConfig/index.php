<?php
/* @var $this CpeConfigController */
/* @var $dataProvider CActiveDataProvider */

$this->breadcrumbs=array(
	'Cpe Configs',
);

$this->menu=array(
	array('label'=>'Create CpeConfig', 'url'=>array('create')),
	array('label'=>'Manage CpeConfig', 'url'=>array('admin')),
);
?>

<h1>Cpe Configs</h1>

<?php $this->widget('zii.widgets.CListView', array(
	'dataProvider'=>$dataProvider,
	'itemView'=>'_view',
)); ?>
