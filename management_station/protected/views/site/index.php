<?php
/* @var $this SiteController */

$this->pageTitle=Yii::app()->name;
?>

<h1>Welcome to <i><?php echo CHtml::encode(Yii::app()->name); ?></i>!</h1>
<div id="kitsune" style="float:left; margin-right:30px;"><?PHP echo CHtml::image(Kitsune::getAssetsUrl()."/images/kitsune.gif") ?></div>
<p>This is Kitsune, a new Management System for Cognitive Radio Networks.</p>

<p> Kitsune is composed of three functional modules: </p>
<ul>
	<li> <b> Configuration</b>: enables the configuration of CR network devices</li>
	<li> <b> Monitoring</b>: gathering of results from CR operations that are monitored with this module</li>
	<li> <b> Visualization</b>: generate charts about results gathered during the monitoring of CR networks</li>
</ul>

<p> Enjoy! </p>
<p> Feel free to contact the
 
 <?PHP echo CHtml::link("Networks group", array('contact'))?> about any questions</p>

