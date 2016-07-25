<?php
$this->beginContent('//layouts/column2'); 

$this->menu=array(
	array('label'=>'View BaseStation','url'=>array('view','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'List CPEs','url'=>array('listCPEs','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'Channels Occupancy','url'=>array('//baseStation/occupancy','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'RSSI','url'=>array('//baseStation/rssi','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'Uplink Throughput','url'=>array('//baseStation/throughput','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'Geolocation','url'=>array('//baseStation/map','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'Channels Sharing','url'=>array('//baseStation/sharing','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label'=>'Configure Gateway','url'=>array('confGateway','id'=>$this->model->bsid), 'visible'=>isset($this->model)),
	array('label' => '', array('class' => 'divider',), 'visible'=>isset($this->model)),

	array('label'=>'List BaseStation','url'=>array('index')),
	array('label'=>'Create BaseStation','url'=>array('create')),
	array('label'=>'Manage BaseStation','url'=>array('admin')),
);	

echo $content;

$this->endContent();

?>

