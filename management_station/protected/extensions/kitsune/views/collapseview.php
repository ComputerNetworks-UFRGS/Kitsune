<script language="javascript">
var faq = new switchicon("icongroup1", "div");
</script>
<p><a href="javascript:faq.sweepToggle('contract')">Contract All</a> | <a href="javascript:faq.sweepToggle('expand')">Expand All</a></p>
<?php
foreach($divs as $label => $value){
?>
<div class="eg-bar"><span id="faq<?PHP echo $label?>-title" ></span> <?PHP echo $value[0]?></div>
<div id="faq<?PHP echo $label?>" class="icongroup1" style="<?PHP echo $value[1] ?>"><?PHP echo $value[2]; ?></div>
<br>
<?PHP

}
?>
<script language="javascript">
jQuery(function($){google.setOnLoadCallback(function() {
//faq = new switchicon("icongroup1", "div"); //Limit scanning of switch contents to just "div" elements
faq.setHeader('<?PHP echo CHtml::image(Kitsune::getAssetsUrl()."/images/minus.gif")?>',
              '<?PHP echo CHtml::image(Kitsune::getAssetsUrl()."/images/plus.gif")?>'); //set icon HTML
faq.collapsePrevious(false); //Allow only 1 content open at any time
faq.setPersist(false); //No persistence enabled
faq.defaultExpanded(<?PHP echo $default -1?>); //Set 1st content to be expanded by default 
faq.init();
faq.sweepToggle('expand');
});});
</script>