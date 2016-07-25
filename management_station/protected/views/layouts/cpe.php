<?php
$this->beginContent('//layouts/column2'); 

$this->menu=array(
	
	array('label'=>'View CPE','url'=>array('//cpe/view','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Channels Occupancy','url'=>array('//cpe/occupancy','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'RSSI','url'=>array('//cpe/rssi','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Uplink Throughput','url'=>array('//cpe/throughput','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Geolocation','url'=>array('//cpe/map','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Channels Classification','url'=>array('//cpe/decision','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Handoffs','url'=>array('//cpe/mobility','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label'=>'Configure CPE','url'=>array('//cpeConfig/create','id'=>$this->model->cpeid), 'visible'=>isset($this->model)),
	array('label' => '', array('class' => 'divider',)),
	array('label'=>'List CPEs','url'=>array('index')),
	array('label'=>'Create CPEs','url'=>array('create')),
	array('label'=>'Manage CPEs','url'=>array('admin')),
);	

echo $content;

$this->endContent();

?>

