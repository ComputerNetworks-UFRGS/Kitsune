<?php 
	Yii::app()->bootstrap->register();
	$cs=Yii::app()->clientscript;
	Kitsune::importCSSFiles();
?>
<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
		<title><?php echo CHtml::encode($this->pageTitle); ?></title>
		<meta name="language" content="en" />
	<!-- Le HTML5 shim, for IE6-8 support of HTML elements -->
	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->
	<!-- Le styles -->
	<!-- <link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/bootstrap-responsive.css" />
	<link rel="stylesheet" type="text/css" href="<?php echo Yii::app()->theme->baseUrl; ?>/css/style.css" /> -->

	<!-- Le fav and touch icons -->
	</head>

	<body>
		<div class="navbar navbar-inverse navbar-fixed-top">
			<div class="navbar-inner">
				<div class="container-fluid" style="position:left;">
					<a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
						<span class="icon-bar"></span>
					</a>
					<a class="brand" href="#"><?php echo Yii::app()->name ?></a>
					<div class="nav-collapse" style="float:right;">
						<?php $this->widget('bootstrap.widgets.TbNavbar',array(
						    'items'=>array(
						        array(
						            'class'=>'bootstrap.widgets.TbMenu',
						            'items'=>array(
						                array(
						                    'label'=>'Cognitive Radio', 
						                    'url'=>array('#'),
						                    'linkOptions'=> array('id'=>'menuNetworks'),
						                    'itemOptions'=> array('id'=>'itemNetworks'),
						                    'items'=> array(
						                        array(
						                            'label'=>'Networks', 
						                            'url'=>array('/network')),
						                        array(
						                            'label'=>'Base Stations', 
						                            'url'=>array('/baseStation')),
						                        array(
						                            'label'=>'CPEs', 
						                            'url'=>array('/cpe'))
						                        )
						                ),
						                array('label'=>'Contact', 'url'=>array('/site/contact')),
						                array('label'=>'Login', 'url'=>array('/site/login'), 'visible'=>Yii::app()->user->isGuest),
						                array('label'=>'Logout ('.Yii::app()->user->name.')', 'url'=>array('/site/logout'), 'visible'=>!Yii::app()->user->isGuest)                                          
						            )
						)))); ?>
					</div><!--/.nav-collapse -->
				</div>
			</div>
		</div>
		<div>
		<?PHP
		 	if(Yii::app()->user->hasFlash('success')){
		 		//$controller,  $message, $title="Information", $autoOpen=true, $id='dialog', $showOk=true
				Kitsune::Message(
					$this,
					"<strong><span id='info1'>".Yii::app()->user->getFlash('success')."</span></strong>",
					"Success",
					true, 
					"dialog");
			}
			if(Yii::app()->user->hasFlash('error')){
		 		//$controller,  $message, $title="Information", $autoOpen=true, $id='dialog', $showOk=true
				Kitsune::Message(
					$this,
					"<strong><span id='info1'>".Yii::app()->user->getFlash('error')."</span></strong>",
					"Something went wrong",
					true, 
					"dialog");
			}
		?>
		</div>
		<div class="cont">
			<div id="content" class="container-fluid">
			  <?php if(isset($this->breadcrumbs)):?>
					<?php $this->widget('zii.widgets.CBreadcrumbs', array(
						'links'=>$this->breadcrumbs,
						'homeLink'=>false,
						'tagName'=>'ul',
						'separator'=>'',
						'activeLinkTemplate'=>'<li><a href="{url}">{label}</a> <span class="divider">/</span></li>',
						'inactiveLinkTemplate'=>'<li><span>{label}</span></li>',
						'htmlOptions'=>array ('class'=>'breadcrumb')
					)); ?>
				<!-- breadcrumbs -->
			  <?php endif?>
			
			<?php echo $content ?>
			
			
			</div><!--/.fluid-container-->
		</div>

		<div class="footer">
		  <div class="container">
			<div class="row">
				<!--<div id="footer-copyright" class="col-md-6" >-->
	                        <div id="footer-copyright" style="float:left;">
					About us | Contact us | Terms & Conditions
	                                <div class="logomark"> © 2013 Black Kitsune </div>
				</div> <!-- /span6 -->
				<!--<div id="footer-terms" class="col-md-6" style="float: left;">-->
	                            <div id="footer-terms" style="float: right;">
	                                <a href="http://networks.inf.ufrgs.br" target="_blank"><?PHP echo CHtml::image(Kitsune::getAssetsUrl()."/images/networks.svg", "Networks group - UFRGS", array('style'=>'height:50px;') ) ?> Networks group </a>
				</div> <!-- /.span6 -->
			 </div> <!-- /row -->
		  </div> <!-- /container -->
		</div>
	</body>
</html>
