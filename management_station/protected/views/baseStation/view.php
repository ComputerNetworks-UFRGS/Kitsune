<?php
$this->breadcrumbs=array(
	'Base Stations'=>array('index'),
	$model->name,
);

?>

<h1>View <?php echo $model->name; ?></h1>

<?PHP 
                                                                                                     
                                                                                                                                       
$infos = $this->widget('bootstrap.widgets.TbDetailView',array(
	'data'=>$model,
	// 'type'=>'well',
	'attributes'=>array(
		array('label'=>'Base Station ID', 'name'=>'bsid'),                                                                      
        array('label'=>'Name', 'name'=>'name'), 
		'description',
		'geolocation',
		'network_id',
        array(
        	'label'=>'-> Gateway configuration',
        	'value'=>$model->gatewayConfigs[(count($model->gatewayConfigs)-1)]['id'], 
        ),
        array(
        	'label'=>'Status',
        	'value'=>$model->gatewayConfigs[(count($model->gatewayConfigs)-1)]['status'], 
        ),
        array(
        	'label'=>'Polling Interval',
        	'value'=>$model->gatewayConfigs[(count($model->gatewayConfigs)-1)]['pollInterval'], 
        ),
        array(
        	'label'=>'Request Timeout',
        	'value'=>$model->gatewayConfigs[(count($model->gatewayConfigs)-1)]['requestTimeout'], 
        ),
        array(
        	'label'=>'Clear Cache?',
        	'value'=>$model->gatewayConfigs[(count($model->gatewayConfigs)-1)]['clearCache'], 
        ),
	),
), true);     
echo $infos;
              
   
// Kitsune::importJSLibs();        
// Kitsune::adjustSensingInfos($jsObj);                                                                                            

// Kitsune::plotOccupiedChannel( 'occ1', "container");
// Kitsune::plotPowChart( 'rssi1', "container");  
// Kitsune::plotTXChart('tx1', "container");
// Kitsune::plotCFChart('cf1', "container");
// Kitsune::plotMapMarkers(
//     $model, 
//     $model->cpes,  
//     Kitsune::getAssetsUrl()."/images/tower.svg", 
//     Kitsune::getAssetsUrl()."/images/house.svg",
//     'map1', 
//     true, false,true, true,false
// );

// $this->widget('bootstrap.widgets.TbTabs', array(
//     'type'=>'tabs',
//     'placement'=>'left', // 'above', 'right', 'below' or 'left'
//     'tabs'=>array(
//         array(
//             'label'=>'Map', 
//             'content'=>'<div id="map1" class="box"></div>', 
//             'active'=>true,
//             ),
//         array('label'=>'Base Station Information', 'content'=>$infos),
//         array('label'=>'CPEs Information', 'content'=>$cpeView),
//         array(
//             'id'=> "container",
//             'label'=>'Channels Occupancy', 
//             'content'=>'', 
//             'linkOptions' => array('id'=>'occ1'),
//             ),
//         array(
//             'id'=> "container",
//             'label'=>'Channel RSSI', 
//             'content'=>'', 
//             'linkOptions' => array('id'=>'rssi1'),
//             ),
//         array(
//             'id'=> "container",
//             'label'=>'Channels Throughput', 
//             'content'=>'', 
//             'linkOptions' => array('id'=>'tx1'),
//             ),
//         array(
//             'id'=> "container",
//             'label'=>'Channel average confidence', 
//             'content'=>'', 
//             'linkOptions' => array('id'=>'cf1'),
//             ),
        
//     ),
    
// )); 

 ?>
