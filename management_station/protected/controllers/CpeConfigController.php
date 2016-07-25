<?php

class CpeConfigController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/cpe';
    public $model;

	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
			'postOnly + delete', // we only allow deletion via POST request
		);
	}

	/**
	 * Specifies the access control rules.
	 * This method is used by the 'accessControl' filter.
	 * @return array access control rules
	 */
	public function accessRules()
	{
		return array(
			array('allow',  // allow all users to perform 'index' and 'view' actions
				'actions'=>array('index','view'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('create','update', 'getResults'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete'),
				'users'=>array('admin'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionView($id)
	{
		$this->render('view',array(
			'model'=>$this->loadModel($id),
		));
	}

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate($id)
	{
		$model = new CpeConfig;
        $this->model = Cpe::model()->findByPk($id);
        $model->cpe_id = $id;
        // modificar!!! CPE IDs no gateway sao numeros, aqui sao IPs!!! Ou no Kitsune!
        $model->cpe_ids = '10.1.1.102'; //= $id;
        $model->cpe_timestamp = 1;
        $model->status = 'running';

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

        $request = array();
        $session_request = array();
        $session_finish = array();
        
  		if(isset($_POST['CpeConfig'])) {
			$model->attributes=$_POST['CpeConfig'];
			

            // ************************** INICIAR SESSAO  *************************
            $current_user = User::model()->findByPk(Yii::app()->user->id);
        
            $session_request['password'] = $current_user->password;
            $session_request['owner'] = $current_user->username;
            $session_request['community'] = 'private';
            
            // URL on which we have to post data
            $url_session = "http://143.54.83.30:30000/gateway/index.php?r=services/begin_session";
            $post_data_session = array();
        
            // Any other field you might want to post
            $json_data_session = json_encode(array($session_request));
            $post_data_session = $json_data_session;
            //$post_data['secure_hash'] = mktime();
        
            // Initialize cURL
            $ch_session = curl_init();
        
            // Set URL on which you want to post the Form and/or data
            curl_setopt($ch_session, CURLOPT_URL, $url_session);
            // Data+Files to be posted
            curl_setopt($ch_session, CURLOPT_POSTFIELDS, $post_data_session);
            // Pass TRUE or 1 if you want to wait for and catch the response against the request made
            curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
            // For Debug mode; shows up any error encountered during the operation
            curl_setopt($ch_session, CURLOPT_VERBOSE, 1);
            curl_setopt($ch_session, CURLOPT_HTTPHEADER, array(                                                                                         'Content-Type: application/json',
                            'Content-Length: ' . strlen($post_data_session))
            );
        
            $response_session = curl_exec($ch_session);
            $response_decoded = json_decode($response_session, true);
            // *********************** FIM CONTROLE SESSAO *********************

            // Parametros obtidos da pagina
            if ($response_decoded['status'] === "accepted") {
                $request['sessionId'] = $response_decoded['sessionId'];
                $request['cpeIDs'] = $model->cpe_ids;
                $request['wranIfSmSsaChAvailabilityCheckTime'] = $model->wranIfSmSsaChAvailabilityCheckTime;
                $request['wranIfSmSsaNonOccupancyPeriod'] = $model->wranIfSmSsaNonOccupancyPeriod;
                $request['wranIfSmSsaChannelOpeningTxTime'] = $model->wranIfSmSsaChannelOpeningTxTime;
                $request['wranIfSmManagedChannel'] = $model->wranIfSmManagedChannel;
                $request['wranIfSsaSensingChannel'] = $model->wranIfSsaSensingChannel;
                $request['DecisionGamaWeight'] = $model->DecisionGamaWeight;
                $request['DecisionRssiMinValue'] = $model->DecisionRssiMinValue;
                $request['DecisionRssiMaxValue'] = $model->DecisionRssiMaxValue;
                $request['wranIfGenericObj1'] = 1;
                $request['wranIfGenericObj2'] = 1;
                $request['wranIfGenericObj3'] = 1;
                $request['wranIfGenericObj4'] = 1;
            } else {
                Yii::app()->user->setFlash('error','Session could no be opened.');
                return;
            }
            //var_dump($request);
            $data = json_encode($request);

            // URL on which we have to post data
            $url = "http://143.54.83.30:30000/gateway/index.php?r=services/set_cpe_configuration";
            //var_dump($request);

            $post_data = array();

            // Any other field you might want to post
            $json_data = json_encode(array($request));
            $post_data = $json_data;
            //$post_data['secure_hash'] = mktime();

            // Initialize cURL
            $ch = curl_init();

            // Set URL on which you want to post the Form and/or data
            curl_setopt($ch, CURLOPT_URL, $url);
            // Data+Files to be posted
            curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
            // Pass TRUE or 1 if you want to wait for and catch the response against the request made
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            // For Debug mode; shows up any error encountered during the operation
            curl_setopt($ch, CURLOPT_VERBOSE, 1);
            curl_setopt($ch, CURLOPT_HTTPHEADER, array(                                                                                         'Content-Type: application/json',
                            'Content-Length: ' . strlen($post_data))
            );

            $response = curl_exec($ch);
            $decoded_resp = json_decode($response);
            if ($decoded_resp->errors === "none") {
                /// PAREI AQUI!!! CORRIGIR STOPPED DO REGISTRO ANTERIOR!!!!!!******************
                $last_config = CpeConfig::model()->findByAttributes(array('cpe_id'=>$model->cpe_id));
                if (isset($last_config)) {
                    $last_config->status = "stopped";
                    $last_config->save();
                }
                if($model->save()) {
                        Yii::app()->user->setFlash('success','CPE configuration status: '.$decoded_resp->CpeConfigStatus);
	    	            $this->redirect(array('view','id'=>$model->id));
                } else {
                    Yii::app()->user->setFlash('error','Configuration can not be applied. Error: database error.');
                    //return;
                }
           } else {
                Yii::app()->user->setFlash('error','Configuration can not be applied. Error: '.$decoded_resp->errors);
                //return;
           }

            // ************************** FINALIZAR SESSAO  *************************
            $session_finish['sessionId'] = $response_decoded['sessionId'];

            // URL on which we have to post data
            $url_session = "http://143.54.83.30:30000/gateway/index.php?r=services/end_session";
           
            // Any other field you might want to post
            $json_data_session_finish = json_encode(array($session_finish));
            $post_data_session_finish = $json_data_session_finish;
            //$post_data['secure_hash'] = mktime();
            
            // Initialize cURL
            $ch_session_finish = curl_init();

            // Set URL on which you want to post the Form and/or data
            curl_setopt($ch_session_finish, CURLOPT_URL, $url_session);
            // Data+Files to be posted
            curl_setopt($ch_session_finish, CURLOPT_POSTFIELDS, $post_data_session_finish);
            // Pass TRUE or 1 if you want to wait for and catch the response against the request made
            curl_setopt($ch_session_finish, CURLOPT_RETURNTRANSFER, 1);
            // For Debug mode; shows up any error encountered during the operation
            curl_setopt($ch_session_finish, CURLOPT_VERBOSE, 1);
            curl_setopt($ch_session_finish, CURLOPT_HTTPHEADER, array(                                                                                         'Content-Type: application/json',
                            'Content-Length: ' . strlen($post_data_session_finish))
            );

            $response_session_finish = curl_exec($ch_session_finish);
            //var_dump($response_session_finish);
            // *********************** FIM CONTROLE SESSAO *********************

        }
		   $this->render('create',array( 'model'=>$model,));
	}

    // Action para coleta dos resultados que estao no gateway
    public function actionGetResults() {

        $request = array();
        $session_request = array();
        $session_finish = array();

        // ************************** INICIAR SESSAO  *************************
        $current_user = User::model()->findByPk(Yii::app()->user->id);

        $session_request['password'] = $current_user->password;
        $session_request['owner'] = $current_user->username;
        $session_request['community'] = 'public';

        // URL on which we have to post data
        $url_session = "http://143.54.83.30:30000/gateway/index.php?r=services/begin_session";
        $post_data_session = array();

        // Any other field you might want to post
        $json_data_session = json_encode(array($session_request));
        $post_data_session = $json_data_session;
        //$post_data['secure_hash'] = mktime();

        // Initialize cURL
        $ch_session = curl_init();

        // Set URL on which you want to post the Form and/or data
        curl_setopt($ch_session, CURLOPT_URL, $url_session);
        // Data+Files to be posted
        curl_setopt($ch_session, CURLOPT_POSTFIELDS, $post_data_session);
        // Pass TRUE or 1 if you want to wait for and catch the response against the request made
        curl_setopt($ch_session, CURLOPT_RETURNTRANSFER, 1);
        // For Debug mode; shows up any error encountered during the operation
        curl_setopt($ch_session, CURLOPT_VERBOSE, 1);
        curl_setopt($ch_session, CURLOPT_HTTPHEADER, array(                                                                                         'Content-Type: application/json',
                        'Content-Length: ' . strlen($post_data_session))
        );

        $response_session = curl_exec($ch_session);
        $response_decoded = json_decode($response_session, true);
        // *********************** FIM CONTROLE SESSAO *********************
       
        //**************************** Pegar valores e adicionar no banco *************************
       
        if ($response_decoded['status'] === "accepted") {
            $request['sessionId'] = $response_decoded['sessionId'];
        } else {
            Yii::app()->user->setFlash('error','Session could no be opened.');
            return;
        }
        //var_dump($request);
        $data = json_encode($request);

        // URL on which we have to post data
        $url = "http://143.54.83.30:30000/gateway/index.php?r=services/get_cf_results";
        //var_dump($request);

        $post_data = array();

        // Any other field you might want to post
        $json_data = json_encode(array($request));
        $post_data = $json_data;
        //$post_data['secure_hash'] = mktime();

        // Initialize cURL
        $ch = curl_init();

        // Set URL on which you want to post the Form and/or data
        curl_setopt($ch, CURLOPT_URL, $url);
        // Data+Files to be posted
        curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);
        // Pass TRUE or 1 if you want to wait for and catch the response against the request made
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
        // For Debug mode; shows up any error encountered during the operation
        curl_setopt($ch, CURLOPT_VERBOSE, 1);
        curl_setopt($ch, CURLOPT_HTTPHEADER, array('Content-Type: application/json', 'Content-Length: ' . strlen($post_data)));

        $response = curl_exec($ch);
        $decoded_resp = json_decode($response);
        if (isset($decoded_resp)) {
            if ($decoded_resp->errors === "none") {
                foreach ($decoded_resp as $main_value) {
                    foreach ($main_value as $value) {
		                $model = new SensingInfo;
                        $model->cpe_id = long2ip($value->cpe_ip);
                        $model->wranIfSmManagedChannelStatus = $value->wranIfSmManagedChannelStatus;
                        $model->wranIfSmWranOccupiedChannelSet = $value->wranIfSmWranOccupiedChannelSet;
                        $model->wranIfSsaTimeLastSensing = $value->wranIfSsaTimeLastSensing;
                        $model->wranIfSsaSensingPathRssi = $value->wranIfSsaSensingPathRssi;
                        $model->DecisionOperatingChannel = $value->DecisionOperatingChannel;
                        $model->DecisionBackupChannel = $value->DecisionBackupChannel;
                        $model->DecisionCandidateChannels = $value->DecisionCandidateChannels;
                        $model->DecisionUplinkThroughput = $value->DecisionUplinkThroughput;
                        $model->DecisionDownlinkThroughput = $value->DecisionDownlinkThroughput;
                        $model->SharingStartTime = $value->SharingStartTime;
                        $model->SharingStopTime = $value->SharingStopTime;
                        $model->SharingAllocatedBand = $value->SharingAllocatedBand;
                        $model->wranIfGenericObj5 = $value->wranIfGenericObj5;
                        $model->wranIfGenericObj6 = $value->wranIfGenericObj6;
                        $model->wranIfGenericObj7 = $value->wranIfGenericObj7;
                        $model->wranIfGenericObj8 = $value->wranIfGenericObj8;
                        if ($model->save()) {
                            Yii::app()->user->setFlash('success','CPE results collected!');
                        } else {
                            Yii::app()->user->setFlash('error','Database error.');
                        }
                    }
                }
            } else {
                Yii::app()->user->setFlash('error','A problem occured. Error: '.$decoded_resp->errors);
            }
        }
        //**************************** FIM PEGAR VALORES E SALVAR BANCO  **************************


        // ************************** FINALIZAR SESSAO  *************************
        $session_finish['sessionId'] = $response_decoded['sessionId'];

        // URL on which we have to post data
        $url_session = "http://143.54.83.30:30000/gateway/index.php?r=services/end_session";

        // Any other field you might want to post
        $json_data_session_finish = json_encode(array($session_finish));
        $post_data_session_finish = $json_data_session_finish;
        //$post_data['secure_hash'] = mktime();

        // Initialize cURL
        $ch_session_finish = curl_init();

        // Set URL on which you want to post the Form and/or data
        curl_setopt($ch_session_finish, CURLOPT_URL, $url_session);
        // Data+Files to be posted
        curl_setopt($ch_session_finish, CURLOPT_POSTFIELDS, $post_data_session_finish);
        // Pass TRUE or 1 if you want to wait for and catch the response against the request made
        curl_setopt($ch_session_finish, CURLOPT_RETURNTRANSFER, 1);
        // For Debug mode; shows up any error encountered during the operation
        curl_setopt($ch_session_finish, CURLOPT_VERBOSE, 1);
        curl_setopt($ch_session_finish, CURLOPT_HTTPHEADER, array(                                                                                         'Content-Type: application/json',
                        'Content-Length: ' . strlen($post_data_session_finish))
        );

        $response_session_finish = curl_exec($ch_session_finish);
        //var_dump($response_session_finish);
        // *********************** FIM CONTROLE SESSAO *********************

	}


	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionUpdate($id)
	{
		$model=$this->loadModel($id);

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['CpeConfig']))
		{
			$model->attributes=$_POST['CpeConfig'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->id));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		$this->loadModel($id)->delete();

		// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
		if(!isset($_GET['ajax']))
			$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('CpeConfig');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new CpeConfig('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['CpeConfig']))
			$model->attributes=$_GET['CpeConfig'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer $id the ID of the model to be loaded
	 * @return CpeConfig the loaded model
	 * @throws CHttpException
	 */
	public function loadModel($id)
	{
		$model=CpeConfig::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
        $this->model = Cpe::model()->findByPk($model->cpe_id);
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CpeConfig $model the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cpe-config-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
