<?php

class Kitsune{
    /**
     * Modal dialog for quick messages, you may add
     * @param type $controller
     * @param type $message
     * @param type $title
     * @param type $autoOpen
     * @param type $id
     * @return String  
     */
    public static function Message($controller,  $message, $title="Information", $autoOpen=true, $id='dialog', $showOk=true) {
        $rd = rand(1, 1000);
        if($autoOpen)
            Yii::app()->clientScript->registerScript(
                'modalOpen'.$id.$rd ,

                '$("#'.$id.'").modal("show");',
                CClientScript::POS_READY
            );
        
        ?>
            <!-- Modal -->
            <div id="<?PHP echo $id ?>" class="modal hide fade" tabindex="-1" role="dialog" aria-labelledby="flash" aria-hidden="<?PHP echo $autoOpen ? "true" : "false" ?>">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                <h3 id="flashLabel"><?PHP echo $title; ?></h3>
              </div>
                        <?php echo $message; ?>
                <?PHP if($showOk):?>
                    <div class="modal-footer">
                          <button class="btn" data-dismiss="modal" aria-hidden="true">Ok</button>    
                    </div> 
                <?PHP endif;?>
            </div>
            <?PHP 
    }
    public static function getUrl(){
        $generatedPath = Yii::getPathOfAlias('kitsune');
        $webrootPath = Yii::getPathOfAlias('webroot');
        if(strpos($generatedPath, $webrootPath) !== FALSE) {
          $generatedPath = substr($generatedPath, strlen($webrootPath));
        }
        return Yii::app()->baseUrl.$generatedPath;
    }
    public static function getAssetsUrl(){
        return Yii::app()->getAssetManager()->publish(Yii::getPathOfAlias('kitsune.assets'));
    }
    public static function getPath(){
        return Yii::getPathOfAlias('kitsune');
    }
    public static function getImg($filename){
        
    }
    public static function importJSLibs(){
        
        $baseUrl = Kitsune::getAssetsUrl();
        $cs = Yii::app()->getClientScript();
        
        $cs->registerCoreScript('jquery');

//        $cs->registerCoreScript('jquery');
        $cs->registerScriptFile('https://www.google.com/jsapi',CClientScript::POS_HEAD); 
        $cs->registerScriptFile("https://maps.googleapis.com/maps/api/js?v=3.exp&sensor=false",CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl.'/js/timeline/timeline.js',CClientScript::POS_HEAD);
        
        $cs->registerScriptFile($baseUrl.'/js/switchcontent.js',CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl.'/js/switchicon.js',CClientScript::POS_HEAD);
        $cs->registerScriptFile($baseUrl.'/js/kitsune.js', CClientScript::POS_HEAD);
    }
    public static function importSnap(){
        $baseUrl = Kitsune::getAssetsUrl();
        $cs = Yii::app()->getClientScript();
        
        $cs->registerScriptFile($baseUrl.'/js/snap/dist/snap.svg-min.js', CClientScript::POS_HEAD);
    }


    public static function importCSSFiles(){
        $cs = Yii::app()->getClientScript();
        $cs->registerCSSFile(Yii::app()->theme->baseUrl."/css/style.css");
        $cs->registerCSSFile(Yii::app()->theme->baseUrl."/css/bootstrap.css");
        $cs->registerCSSFile(Yii::app()->theme->baseUrl."/css/bootstrap-responsive.css");
        $cs->registerCSSFile(self::getAssetsUrl()."/css/kitsune.css");
        // $cs->registerCSSFile(self::getAssetsUrl().'/js/timeline/timeline.css', CClientScript::POS_HEAD);
    }

    public static function adjustSensingInfos($jsObj){
        $script = '
           var sensingInfos='.$jsObj.';
           var channels=Kitsune.adjustData(sensingInfos);
        ';
        Yii::app()->clientScript->registerScript("sensinginfos", $script);
        
    }

    public static function plotOccupiedChannel($scID='occ1', $label="occ_channel"){

        $script = '
        $(\'#'.$scID.'\').click(
            function(){
                Kitsune.drawOccChart (channels, \''."$label".'\');
            }
        );
        
        Kitsune.drawOccChart (channels, \''."$label".'\');
        ';
        Yii::app()->clientScript->registerScript("click$scID", $script);

    }

    public static function plotMobChannel($scID='mob1', $label="mob_channel"){
        $script = '
        $(\'#'.$scID.'\').click(
            function(){
                Kitsune.drawMobChart (channels, \''."$label".'\');
            }
        );';
        Yii::app()->clientScript->registerScript("click$scID", $script);

    }

    public static function plotTXChart($scID='tx1', $label="tx_channel"){
        $script = '
        $(\'#'.$scID.'\').click(
            function(){
                Kitsune.drawTXChart (channels, \''."$label".'\');
            }
        );
        Kitsune.drawTXChart (channels, \''."$label".'\');';
        Yii::app()->clientScript->registerScript("click$scID", $script);
    }
    
    
    public static function plotPowChart( $scID='rssi1', $label="rssi_channel"){
        $script = '
        $(\'#'.$scID.'\').click(
            function(){
               Kitsune.drawPowerChart (channels, \''."$label".'\');
            }
        );
        Kitsune.drawPowerChart (channels, \''."$label".'\');';
        Yii::app()->clientScript->registerScript("click$scID", $script);
    }

    public static function plotCFChart( $scID='cf1', $label="cf_channel"){
        $script = '
        $(\'#'.$scID.'\').click(
            function(){
               Kitsune.drawCFChart (channels, \''."$label".'\');
            }
        );';
        Yii::app()->clientScript->registerScript("click$scID", $script);
    }
    
    public static function plotMobChart( $scID='mob1', $label="mob_channel"){
        $script = '
        $(\'#'.$scID.'\').click(
            function(){
               Kitsune.drawMobChart (channels, \''."$label".'\');
            }
        );';
        Yii::app()->clientScript->registerScript("click$scID", $script);
    }

    public static function plotMapMarkers($bs, $cpes, $bsICON, $cpeICON, $contLabel="geo_markers", $showBS=true, $showCPE=true, $showMarkerBS=true, $showMarkerCPE=true){
        $showBS = $showBS ? "true" : "false";
        $showCPE = $showCPE ? "true" : "false";
        $showMarkerBS = $showMarkerBS ? "true" : "false";
        $showMarkerCPE = $showMarkerCPE ? "true" : "false";
        $jsBS = json_encode($bs->getAttributes());
        if(is_array($cpes)){
            $jsCPES = [];
            foreach ($cpes as $key => $info){
                $jsCPES[$key] = $info->getAttributes();
            }
        }else{
            $jsCPES = $cpes->getAttributes();
        }
        $jsCPES = json_encode($jsCPES);
         ?>
        <script type="text/javascript">
            google.maps.event.addDomListener(window, 'load', function(){Kitsune.drawMarkersMap(<?PHP echo $jsBS ?>, <?PHP echo $jsCPES ?>, 
                '<?PHP echo $contLabel ?>','<?PHP echo $showBS?>', '<?PHP echo $showCPE?>', '<?PHP echo $showMarkerBS?>', '<?PHP echo $showMarkerCPE;?>','<?PHP echo $bsICON;?>', '<?PHP echo $cpeICON;?>');});
        </script>
        <?PHP

    }
    /**
        * Generate a random salt in the crypt(3) standard Blowfish format.
        *
        * @param int $cost Cost parameter from 4 to 31.
        *
        * @throws Exception on invalid cost parameter.
        * @return string A Blowfish hash salt for use in PHP's crypt()
        */
    public static function blowfishSalt($cost = 13){
           if (!is_numeric($cost) || $cost < 4 || $cost > 31) {
               throw new Exception("cost parameter must be between 4 and 31");
           }
           $rand = array();
           for ($i = 0; $i < 8; $i += 1) {
               $rand[] = pack('S', mt_rand(0, 0xffff));
           }
           $rand[] = substr(microtime(), 2, 6);
           $rand = sha1(implode('', $rand), true);
           $salt = '$2a$' . sprintf('%02d', $cost) . '$';
           $salt .= strtr(substr(base64_encode($rand), 0, 22), array('+' => '.'));
           return $salt;
    }
}
?>
