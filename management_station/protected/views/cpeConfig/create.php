<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */

$this->breadcrumbs=array(
	'Cpe Configs'=>array('index'),
	'Create',
);

$this->menu=array(
	array('label'=>'List CpeConfig', 'url'=>array('index')),
	array('label'=>'Manage CpeConfig', 'url'=>array('admin')),
);
?>

<h1>Create CpeConfig</h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>