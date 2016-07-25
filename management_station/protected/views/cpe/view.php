<?php
$this->pageTitle=Yii::app()->name . ' - View ' . $model->name;
$this->breadcrumbs=array(
	'CPEs'=>array('index'),
	$model->name,
);
?>

<h1>View Cpe #<?php echo $model->cpeid; ?></h1>

<?php 

$infos = $this->widget('bootstrap.widgets.TbDetailView',array(
  'data'=>$model,
  // 'type'=>'well',
  'attributes'=>array(
      array('label'=>'CPE ID (IP)', 'name'=>'cpeid'),
      array('label'=>'Name', 'name'=>'name'),
      'description',
      'geolocation',
      array(
          'label'=> 'Base Station',
          'type' => 'raw',
          'value'=>  CHtml::link($model->bs->name, array('baseStation/view', 'id'=>$model->bs_id))
      ),
  ),
), true);

echo $infos;
// Kitsune::importJSLibs();     

// Kitsune::adjustSensingInfos($jsObj);                                                                                            

// Kitsune::plotOccupiedChannel( 'occ1', "container");
// // Kitsune::plotMobChannel( 'mob1', "container");  
// Kitsune::plotPowChart( 'rssi1', "container");  
// Kitsune::plotTXChart('tx1', "container");
// Kitsune::plotCFChart('cf1', "container");

// Kitsune::plotMapMarkers($model->bs,
//   $model, 
//   Kitsune::getAssetsUrl()."/images/tower.svg",
//   Kitsune::getAssetsUrl()."/images/house.svg",
//   'map1',
//   true, false,true, true,false
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
//         array('label'=>'CPE Information', 'content'=>$infos),

//         array(
//             'id'=> "container",
//             'label'=>'Channels Occupancy', 
            
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
//         array(
//             'id'=> "box1",
//             'label'=>'Decision', 
//             //<img src="/coliseu/images/coliseu.svg"  width="400px" onerror="this.onerror=null; this.src='/coliseu/images/coliseu.png'">
//             'content'=>'<img src="http://labcom.inf.ufrgs.br/kitsune/images/bondan/decision.svg"></img>', 
//             // 'linkOptions' => array('id'=>'mob1'),
//             ),
//         array(
//             'id'=> "box2",
//             'label'=>'Sharing', 
//             //<img src="/coliseu/images/coliseu.svg"  width="400px" onerror="this.onerror=null; this.src='/coliseu/images/coliseu.png'">
//             'content'=>'<img src="http://labcom.inf.ufrgs.br/kitsune/images/bondan/sharing.svg"></img>', 
//             // 'linkOptions' => array('id'=>'mob1'),
//             ),
//         array(
//             'id'=> "box3",
//             'label'=>'Mobility', 
//             //<img src="/coliseu/images/coliseu.svg"  width="400px" onerror="this.onerror=null; this.src='/coliseu/images/coliseu.png'">
//             'content'=>'<img src="http://labcom.inf.ufrgs.br/kitsune/images/bondan/mobility.svg "></img>', 
//             // 'linkOptions' => array('id'=>'mob1'),
//             ),
        
//     ),
// )); 
 ?>
