<?php

class ServicesController extends Controller {
	public function actionBegin_session() {

		$session_file = fopen("/var/www/gateway/sessions.txt", "w");		

		$_post = file_get_contents("php://input");
                $message = json_decode($_post, true);
                $owner = $message[0]['owner'];
                $password = $message[0]['password'];

                $model = User::model()->findByAttributes(array('owner'=>$owner));

                $response = array();

                //respond with json content type:
                header('Content-type:application/json');
                if ( isset($model) && $model !== 'null') {
                        if ($password === $model->password) {
                                //session_start();
                                $session=new CHttpSession;
                                $session->open();
                                $response['status'] = "accepted";
                                $response['sessionId'] = $session->getSessionID();//session_id();
				fwrite($session_file, $session->getSessionID());
                                //apc_add('session', $session->getSessionID()); // save on RAM
				
                                echo json_encode($response);
                                exit();
                        }
                }
                $response['status'] = "error";
                $response['sessionId'] = "null";
                echo json_encode($response);

                exit();

		//$this->render('begin_session');
	}

	public function actionEnd_session() {
		
		$_post = file_get_contents("php://input");

                $message = json_decode($_post, true);
                $sessionId = $message[0]['sessionId'];

		$path = "/var/www/gateway/sessions.txt";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				unset($lines[$key]);
			}
			$data = implode('\n', array_values($lines));

			$file = fopen($path, "w");
			fwrite($file, $data);
			fclose($file);
		}

	//	if ($session_file) {
	//		while (!feof($session_file)) {
	//			$buffer = fgets($session_file);
	//			if(strpos($buffer, $sesionId) !== FALSE)
	//				

	//		}
	//		fclose($session_file);
	//	}


                $response = array();

                //respond with json content type:
                header('Content-type:application/json');

                //if ($sessionId === apc_fetch('session')) {
                //if (session_destroy()) {
                	$response['status'] = "destroyed";
        	        $response['sessionId'] = $sessionId;
	                echo json_encode($response);
                	exit();
                //}
                //$response['status'] = "error";
                //$response['sessionId'] = "null";
                //echo json_encode($response);

                exit();

		//$this->render('end_session');
	}
// ************************** get_cf_results **********************************
	public function actionGet_cf_results() {
		
		$_post = file_get_contents("php://input");

                $message = json_decode($_post, true);
                $sessionId = $message[0]['sessionId'];

		// ********************* Verificacao de Sessao ***********************

		$path = "/var/www/gateway/sessions.txt";

		$session_ok = "no";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				$session_ok = "yes";
			} else {
				$session_ok = "no";
			}
		}

		if ($session_ok === "no") {
	                $response['errors'] = "no_session";
			echo json_encode($response);
			exit();
		}
		// ************************* Fim Sessao ******************************
		$model = new cf_results;

		$response = array();
		$response_timestamp = array();

		//foreach ($model->findAllByAttributes(array('status'=>'new')) as $value) {
		foreach ($model->findAll() as $value) {
			if (isset($value)) {
				foreach ($model->findAllByAttributes(array('cpe_id'=>$value->cpe_id,'status'=>'new')) as $new_value) {
					if (isset($new_value)) {
					// colocar no JSON dentro deste CPE_ID
						$timestamp = $new_value->timestamp;
						$partial_response['status'] = $new_value->status;
						$partial_response['cpe_id'] = $new_value->cpe_id;
						$partial_response['cpe_ip'] = $new_value->cpe_ip;
						$partial_response['wranIfSmManagedChannelStatus'] = $new_value->wranIfSmManagedChannelStatus;
						$partial_response['wranIfSmWranOccupiedChannelSet'] = $new_value->wranIfSmWranOccupiedChannelSet;
						$partial_response['wranIfSsaTimeLastSensing'] = $new_value->wranIfSsaTimeLastSensing;
						$partial_response['wranIfSsaSensingPathRssi'] = $new_value->wranIfSsaSensingPathRssi;
						$partial_response['DecisionOperatingChannel'] = $new_value->DecisionOperatingChannel;
						$partial_response['DecisionBackupChannel'] = $new_value->DecisionBackupChannel;
						$partial_response['DecisionCandidateChannels'] = $new_value->DecisionCandidateChannels;
						$partial_response['DecisionUplinkThroughput'] = $new_value->DecisionUplinkThroughput;
						$partial_response['DecisionDownlinkThroughput'] = $new_value->DecisionDownlinkThroughput;
						$partial_response['SharingStartTime'] = $new_value->SharingStartTime;
						$partial_response['SharingStopTime'] = $new_value->SharingStopTime;
						$partial_response['SharingAllocatedBand'] = $new_value->SharingAllocatedBand;
						$partial_response['wranIfGenericObj5'] = $new_value->wranIfGenericObj5;
						$partial_response['wranIfGenericObj6'] = $new_value->wranIfGenericObj6;
						$partial_response['wranIfGenericObj7'] = $new_value->wranIfGenericObj7;
						$partial_response['wranIfGenericObj8'] = $new_value->wranIfGenericObj8;
						$response_timestamp[$timestamp]= $partial_response;
						$new_value->status = "old";
						$new_value->save();
					} //else {}
				}
				if (isset($response_timestamp)) {
					$response[$value->cpe_id] = $response_timestamp;
				} //else {}
			} else {
				$response['errors'] = "No results found";
				echo json_encode($response);
                		exit();
			}
                }
		$response['errors'] = "none";
		echo json_encode($response);
                exit();

		//$this->render('get_cf_results');
	}

	public function actionGet_configuration() {

		$_post = file_get_contents("php://input");
	
	        $message = json_decode($_post, true);
	        $sessionId = $message[0]['sessionId'];
	        $configId = $message[0]['configId'];

		// ********************* Verificacao de Sessao ***********************

		$path = "/var/www/gateway/sessions.txt";

		$session_ok = "no";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				$session_ok = "yes";
			} else {
				$session_ok = "no";
			}
		}

		if ($session_ok === "no") {
	                $response['errors'] = "no_session";
			echo json_encode($response);
			exit();
		}
		// ************************* Fim Sessao ******************************

		$model = configuration::model()->findByPk($configId);
	
	        $response = array();
	
	        if (! isset($model)) {
	                $response['errors'] = "No configuration found";
	                echo json_encode($response);
	                exit();
	        }
	
	    	$response['configId'] = $model->id;
	        $response['status'] = $model->status;
	        $response['pollInterval'] = $model->pollInterval;
	        $response['requestTimeout'] = $model->requestTimeout;
	        $response['clearCache'] = $model->clearCache;
	        echo json_encode($response);
	    
	        exit();
		//$this->render('get_configuration');
	}

	public function actionGet_cpe_configuration() {
		// fazer bem semelhante ao configuration do gateway
		$_post = file_get_contents("php://input");
		$message = json_decode($_post, true);
        	$sessionId = $message[0]['sessionId'];
        	$configId = $message[0]['configId'];

		// ********************* Verificacao de Sessao ***********************

		$path = "/var/www/gateway/sessions.txt";

		$session_ok = "no";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				$session_ok = "yes";
			} else {
				$session_ok = "no";
			}
		}

		if ($session_ok === "no") {
	                $response['errors'] = "no_session";
			echo json_encode($response);
			exit();
		}
		// ************************* Fim Sessao ******************************

		$model = cpe_configuration::model()->findByPk($configId);

        	$response = array();

	        if (! isset($model)) {
        	        $response['errors'] = "No configuration found";
        	        echo json_encode($response);
        	        exit();
       		}

	    	$response['configId'] = $model->id;
        	$response['timestamp'] = $model->status;
        	$response['status'] = $model->status;
        	$response['cpeIDs'] = $model->cpe_ids;
        	$response['wranIfSmSsaChAvailabilityCheckTime'] = $model->wranIfSmSsaChAvailabilityCheckTime;
	        $response['wranIfSmSsaNonOccupancyPeriod'] = $model->wranIfSmSsaNonOccupancyPeriod;
        	$response['wranIfSmSsaChannelOpeningTxTime'] = $model->wranIfSmSsaChannelOpeningTxTime;
        	$response['wranIfSmManagedChannel'] = $model->wranIfSmManagedChannel;
        	$response['wranIfSsaSensingChannel'] = $model->wranIfSsaSensingChannel;
        	$response['DecisionGamaWeight'] = $model->DecisionGamaWeight;
        	$response['DecisionRssiMinValue'] = $model->DecisionRssiMinValue;
        	$response['DecisionRssiMaxValue'] = $model->DecisionRssiMaxValue;
        	$response['wranIfGenericObj1'] = $model->wranIfGenericObj1;
        	$response['wranIfGenericObj2'] = $model->wranIfGenericObj2;
        	$response['wranIfGenericObj3'] = $model->wranIfGenericObj3;
        	$response['wranIfGenericObj4'] = $model->wranIfGenericObj4;
        	echo json_encode($response);
    
        	exit();

		//$this->render('get_cpe_configuration');
	}

	public function actionSet_configuration() {

		$_post = file_get_contents("php://input");

                $message = json_decode($_post, TRUE);
		
        	$sessionId = $message[0]['sessionId'];
                $polling = $message[0]['pollInterval'];
                $timeout = $message[0]['requestTimeout'];
		$clear = $message[0]['clearCache'];

		// ********************* Verificacao de Sessao ***********************

		$path = "/var/www/gateway/sessions.txt";

		$session_ok = "no";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				$session_ok = "yes";
			} else {
				$session_ok = "no";
			}
		}

		if ($session_ok === "no") {
	                $response['errors'] = "no_session";
			echo json_encode($response);
			exit();
		}
		// ************************* Fim Sessao ******************************

		//$config = '/var/www/gateway/gateway.conf';
		//$handle = fopen($config, 'w') or die('Cannot open file:  '.$config);

		$response = array();
		$model = new configuration;
		$clean_model = new configuration;
		$cpe_clean_model = new cpe_configuration;

		if (isset($polling)) {
			//fwrite($handle, $polling);
			$model->pollInterval = $polling;
		} else {
			$response['configId'] = "none";
                	$response['configStatus'] = "not applied";
			$response['errors'] = "no pollInterval informed";
                	echo json_encode($response);
                	exit();
		}
			
		if (isset($timeout)) {
			//fwrite($handle, "\n".$timeout);
			$model->requestTimeout = $timeout;
		} else {
			$response['configId'] = "none";
                	$response['configStatus'] = "not applied";
			$response['errors'] = "no requestTimeout informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($clear)) {
                        //fwrite($handle, "\n".$clear);
                	$model->clearCache = $clear;
			if ($clear === "yes") {
				// clean configuration table!!!
				foreach ($clean_model->findAll() as $value) {
					$value->delete();
				}
				// clean cpe_configuration table!!
				foreach ($cpe_clean_model->findAll() as $value) {
					$value->delete();
				}
			}
		} else {
			$response['configId'] = "none";
                	$response['configStatus'] = "not applied";
			$response['errors'] = "no clearCache informed";
                	echo json_encode($response);
                	exit();
		}


		$model->status = "running";

		if ($model->save()) {
			$response['configId'] = $model->id;
                	$response['configStatus'] = "applied";
			$response['errors'] = "none";
                	echo json_encode($response);
		} else {
			$response['configId'] = "none";
                        $response['configStatus'] = "not applied";
                        $response['errors'] = "Can't be saved";
                        echo json_encode($response);
			exit();
		}

		$prev_model = configuration::model()->findByPk($model->id -1);

		if (isset($prev_model)) {
			$prev_model->status = "stopped";
		}

		$prev_model->save();

               	exit();
		//$this->render('set_configuration');
	}

	public function actionSet_cpe_configuration() {
		$_post = file_get_contents("php://input");

                $message = json_decode($_post, true);
        	$sessionId = $message[0]['sessionId'];

		// ********************* Verificacao de Sessao ***********************

		$path = "/var/www/gateway/sessions.txt";

		$session_ok = "no";

		$lines = file($path, FILE_IGNORE_NEW_LINES);
		foreach($lines as $key => $line) {
			if(stristr($line, $sessionId)) {
				$session_ok = "yes";
			} else {
				$session_ok = "no";
			}
		}

		if ($session_ok === "no") {
	                $response['errors'] = "no_session";
			echo json_encode($response);
			exit();
		}
		// ************************* Fim Sessao ******************************

		// COLOCAR TODOS OS ELEMENTOS
                $cpe_ids = $message[0]['cpeIDs'];
                $wranIfSmSsaChAvailabilityCheckTime = $message[0]['wranIfSmSsaChAvailabilityCheckTime'];
		$wranIfSmSsaNonOccupancyPeriod = $message[0]['wranIfSmSsaNonOccupancyPeriod'];
		$wranIfSmSsaChannelOpeningTxTime = $message[0]['wranIfSmSsaChannelOpeningTxTime'];
		$wranIfSmManagedChannel = $message[0]['wranIfSmManagedChannel'];
		$wranIfSsaSensingChannel = $message[0]['wranIfSsaSensingChannel'];
		$DecisionGamaWeight = $message[0]['DecisionGamaWeight'];
		$DecisionRssiMinValue = $message[0]['DecisionRssiMinValue'];
		$DecisionRssiMaxValue = $message[0]['DecisionRssiMaxValue'];
		$wranIfGenericObj1 = $message[0]['wranIfGenericObj1'];
		$wranIfGenericObj2 = $message[0]['wranIfGenericObj2'];
		$wranIfGenericObj3 = $message[0]['wranIfGenericObj3'];
		$wranIfGenericObj4 = $message[0]['wranIfGenericObj4'];

		//$config = '/var/www/gateway/gateway.conf';
		//$handle = fopen($config, 'w') or die('Cannot open file:  '.$config);

		$response = array();
		$model = new cpe_configuration;

		$model->timestamp = (time()*1000);

//************************** Inicio parada confs anteriores  ***********************
		// Verificar como parar configuracoes anteriores
		// Como cada configuracao pode ser para diferentes CPEs,
		// a anterior por nao ser parada
		foreach (cpe_configuration::model()->findAll() as $prev_model) {
			if (isset($prev_model)) {
				if ($cpe_ids === $prev_model->cpe_ids) {
					$prev_model->status = "stopped";
					$prev_model->save();
				}
			}
		}
//************************** Fim verificacao confs anteriores ***********************

		if (isset($cpe_ids)) {
			$model->cpe_ids = $cpe_ids;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no cpe_ids informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfSmSsaChAvailabilityCheckTime)) {
			$model->wranIfSmSsaChAvailabilityCheckTime = $wranIfSmSsaChAvailabilityCheckTime;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfSmSsaChAvailabilityCheckTime informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfSmSsaNonOccupancyPeriod)) {
			$model->wranIfSmSsaNonOccupancyPeriod = $wranIfSmSsaNonOccupancyPeriod;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfSmSsaNonOccupancyPeriod informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfSmSsaChannelOpeningTxTime)) {
			$model->wranIfSmSsaChannelOpeningTxTime = $wranIfSmSsaChannelOpeningTxTime;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfSmSsaChannelOpeningTxTime informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfSmManagedChannel)) {
			$model->wranIfSmManagedChannel = $wranIfSmManagedChannel;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfSmManagedChannel informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfSsaSensingChannel)) {
			$model->wranIfSsaSensingChannel = $wranIfSsaSensingChannel;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfSsaSensingChannel informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($DecisionGamaWeight)) {
			$model->DecisionGamaWeight = $DecisionGamaWeight;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no DecisionGamaWeight informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($DecisionRssiMinValue)) {
			$model->DecisionRssiMinValue = $DecisionRssiMinValue;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no DecisionRssiMinValue informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($DecisionRssiMaxValue)) {
			$model->DecisionRssiMaxValue = $DecisionRssiMaxValue;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no DecisionRssiMaxValue informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfGenericObj1)) {
			$model->wranIfGenericObj1 = $wranIfGenericObj1;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfGenericObj1 informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfGenericObj2)) {
			$model->wranIfGenericObj2 = $wranIfGenericObj2;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfGenericObj2 informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfGenericObj3)) {
			$model->wranIfGenericObj3 = $wranIfGenericObj3;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfGenericObj3 informed";
                	echo json_encode($response);
                	exit();
		}
		if (isset($wranIfGenericObj4)) {
			$model->wranIfGenericObj4 = $wranIfGenericObj4;
		} else {
			$response['CpeConfigId'] = "none";
                	$response['CpeConfigStatus'] = "not applied";
			$response['errors'] = "no wranIfGenericObj4 informed";
                	echo json_encode($response);
                	exit();
		}

		$model->status = "running";

		if ($model->save()) {
			$response['CpeConfigId'] = $model->id;
                	$response['CpeConfigStatus'] = "applied";
			$response['errors'] = "none";
               		echo json_encode($response);
		} else {
			$response['CpeConfigId'] = "none";
                        $response['CpeConfigStatus'] = "not applied";
                        $response['errors'] = "Can't be saved";
                        echo json_encode($response);
			exit();
		}

		// *********** Aqui, passar a configuracao para TODOS os CPEs informados! **********
		// *********** usando SNMP SET *****************************************************

		snmp_set_valueretrieval(SNMP_VALUE_PLAIN);
		
		snmp_read_mib('/usr/local/share/snmp/mibs/SNMPv2-SMI.txt');
		snmp_read_mib('/usr/local/share/snmp/mibs/MIB-DISS.smi');

		//for ( $cpe_ids_index = 0; $cpe_ids_index < strlen($cpe_ids); $cpe_ids_index++ ) {
		//	$current_cpe_id = $cpe_ids[$cpe_ids_index];
		//	$cpe_infos = cpe_info::model()->findByAttributes(array('id'=>$current_cpe_id));
		//	if (isset($cpe_infos)) {
		//		// aqui eu tenho as infos do CPE, basta configurar via SNMO usando o IP!
		//		// Primeiro, converter IP para um formato legivel!
		//		$cpe_ip = long2ip(intval($cpe_infos['cpe_ip']));
		//		// agora, dar os SNMP SETs
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.5.1.0', 's', $wranIfSmSsaChAvailabilityCheckTime);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.5.2.0', 's', $wranIfSmSsaNonOccupancyPeriod);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.5.3.0', 's', $wranIfSmSsaChannelOpeningTxTime);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.5.4.0', 's', $wranIfSmManagedChannel);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.6.1.0', 's', $wranIfSsaSensingChannel);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.8.4.0', 's', $DecisionGamaWeight);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.8.5.0', 's', $DecisionRssiMinValue);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.8.6.0', 's', $DecisionRssiMaxValue);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.9.1.0', 's', $wranIfGenericObj1);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.9.2.0', 's', $wranIfGenericObj2);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.9.3.0', 's', $wranIfGenericObj3);
		//		snmpset($cpe_ip, "private", '1.3.6.1.2.1.1300.9.4.0', 's', $wranIfGenericObj4);
		//	}
		//	// Incremento adicional para pular a '/' na string de IDs
		//	$cpe_ids_index++;
		//}
		// *************************************** MODIFICACAO!!! ************************************
		// * Apenas um CPE é configurado por vez!!! CPE_ID recebido no JSON agora é um endereço IP!!!
		// *******************************************************************************************
		// SNMP SETS! 
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.5.1.0', 's', $wranIfSmSsaChAvailabilityCheckTime);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.5.2.0', 's', $wranIfSmSsaNonOccupancyPeriod);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.5.3.0', 's', $wranIfSmSsaChannelOpeningTxTime);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.5.4.0', 's', $wranIfSmManagedChannel);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.6.1.0', 's', $wranIfSsaSensingChannel);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.8.4.0', 's', $DecisionGamaWeight);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.8.5.0', 's', $DecisionRssiMinValue);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.8.6.0', 's', $DecisionRssiMaxValue);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.9.1.0', 's', $wranIfGenericObj1);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.9.2.0', 's', $wranIfGenericObj2);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.9.3.0', 's', $wranIfGenericObj3);
                snmpset($cpe_ids, "private", '1.3.6.1.2.1.1300.9.4.0', 's', $wranIfGenericObj4);

               	exit();
		//$this->render('set_cpe_configuration');
	}

	// Uncomment the following methods and override them if needed
	/*
	public function filters()
	{
		// return the filter configuration for this controller, e.g.:
		return array(
			'inlineFilterName',
			array(
				'class'=>'path.to.FilterClass',
				'propertyName'=>'propertyValue',
			),
		);
	}

	public function actions()
	{
		// return external action classes, e.g.:
		return array(
			'action1'=>'path.to.ActionClass',
			'action2'=>array(
				'class'=>'path.to.AnotherActionClass',
				'propertyName'=>'propertyValue',
			),
		);
	}
	*/
}
