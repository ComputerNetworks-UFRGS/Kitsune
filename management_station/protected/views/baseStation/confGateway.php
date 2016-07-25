<?PHP 
$this->breadcrumbs=array(
	'Base Stations'=>array('index'),
	$bs->name=>array('view','id'=>$bs->bsid),
	'Configuring Gateway',
);

$this->menu=array(
	
);

?>

<h1>Configuring Gateway at Base Station <?php echo $bs->bsid; ?></h1>

<?php echo $this->renderPartial('_gatewayConfigForm', array(
	'model'=>$model,
	'bs' => $bs
)); ?> 