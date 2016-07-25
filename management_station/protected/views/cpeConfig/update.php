<?php
/* @var $this CpeConfigController */
/* @var $model CpeConfig */

$this->breadcrumbs=array(
	'Cpe Configs'=>array('index'),
	$model->id=>array('view','id'=>$model->id),
	'Update',
);

$this->menu=array(
	array('label'=>'List CpeConfig', 'url'=>array('index')),
	array('label'=>'Create CpeConfig', 'url'=>array('create')),
	array('label'=>'View CpeConfig', 'url'=>array('view', 'id'=>$model->id)),
	array('label'=>'Manage CpeConfig', 'url'=>array('admin')),
);
?>

<h1>Update CpeConfig <?php echo $model->id; ?></h1>

<?php $this->renderPartial('_form', array('model'=>$model)); ?>