<?php                                                                                                                                  
/* @var $this CpeController */                                                                                                         
/* @var $data cpe */                                                                                                                   
?>                                                                                                                                     
                                                                                                                                       
<div class="cpeview">                                                                                                                  
                                                                                                                                       
    <b><?php echo CHtml::encode('CPE ID (IP)'); ?>:</b>                                                                                
    <?php echo CHtml::link(CHtml::encode($data->cpeid), array('//cpe/view', 'id'=>$data->cpeid)); ?>                                   
    <br />                                                                                                                             
                                                                                                                                       
    <b><?php echo CHtml::encode('Name'); ?>:</b>                                                                                       
    <?php echo CHtml::link(CHtml::encode($data->name), array('//cpe/view', 'id'=>$data->cpeid)); ?>                                    
    <br />                                                                                                                             
                                                                                                                                       
    <b><?php echo CHtml::encode($data->getAttributeLabel('description')); ?>:</b>                                                      
    <?php echo CHtml::encode($data->description); ?>                                                                                   
    <br />                                                                                                                             
                                                                                                                                       
        <b><?php echo CHtml::encode($data->getAttributeLabel('geolocation')); ?>:</b>                                                  
    <?php echo CHtml::encode($data->geolocation); ?>                                                                                   
    <br />                                                                                                                             
                                                                                                                                       
    <b><?php echo CHtml::encode('Base Station ID'); ?>:</b>                                                                            
    <?php echo CHtml::link(CHtml::encode($data->bs_id), array('//basestation/view', 'id'=>$data->bs_id)); ?>                           
    <br />                                                                                                                             
                                                                                                                                       
</div>   