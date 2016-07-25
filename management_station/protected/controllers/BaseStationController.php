<?php

class BaseStationController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $layout='//layouts/base_station';
	public $model;
	/**
	 * @return array action filters
	 */
	public function filters()
	{
		return array(
			'accessControl', // perform access control for CRUD operations
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
				'actions'=>array('none'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated user to perform 'create' and 'update' actions
				'actions'=>array('view', 'index'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', 'create','update', 'confGateway', 'occupancy', 'throughput', 'rssi', 'map', 'sharing', 'listCPEs'),
				'roles'=>array('admin'),
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
        $criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
        foreach($model->cpes as $value){
            foreach ($value->sensingInfos as $info){
                $sensingInfos[]=$info;
                $aux[] = $info->getAttributes();
            }
        }
        $jsObj = json_encode($aux);
         
        $this->render('view',array(                                                                                                    
            'model' => $model,
            'cpeData'=>$dataProvider,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  
        
    }

    /**
     * Displays a particular model.
     * @param integer $id the ID of the model to be displayed
     */
    public function actionListCPEs($id)
    {
        $criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
       
        $this->render('list_cpes',array(                                                                                                    
            'model' => $model,
            'cpeData'=>$dataProvider,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  
        
    }

	/**
	 * Creates a new model.
	 * If creation is successful, the browser will be redirected to the 'view' page.
	 */
	public function actionCreate()
	{
		$model=new BaseStation;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['BaseStation']))
		{
			$model->attributes=$_POST['BaseStation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->bsid));
		}

		$this->render('create',array(
			'model'=>$model,
		));
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

		if(isset($_POST['BaseStation']))
		{
			$model->attributes=$_POST['BaseStation'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->bsid));
		}

		$this->render('update',array(
			'model'=>$model,
		));
	}
		/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionOccupancy($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach($model->cpes as $value){
    		foreach ($value->sensingInfos as $info){
	    	    $sensingInfos[]=$info;
	    	    $aux[] = $info->getAttributes();
    		}
		}
        $jsObj = json_encode($aux);
         
        $this->render('occupancy',
        	array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionThroughput($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach($model->cpes as $value){
    		foreach ($value->sensingInfos as $info){
	    	    $sensingInfos[]=$info;
	    	    $aux[] = $info->getAttributes();
    		}
		}
        $jsObj = json_encode($aux);
         
        $this->render('throughput',
        	array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionConfidence($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach($model->cpes as $value){
    		foreach ($value->sensingInfos as $info){
	    	    $sensingInfos[]=$info;
	    	    $aux[] = $info->getAttributes();
    		}
		}
        $jsObj = json_encode($aux);
        $this->render('confidence',
        	array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionRSSI($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach($model->cpes as $value){
    		foreach ($value->sensingInfos as $info){
	    	    $sensingInfos[]=$info;
	    	    $aux[] = $info->getAttributes();
    		}
		}
        $jsObj = json_encode($aux);
         
        $this->render('rssi',
        	array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionSharing($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach($model->cpes as $value){
    		foreach ($value->sensingInfos as $info){
	    	    $sensingInfos[]=$info;
	    	    $aux[] = $info->getAttributes();
    		}
		}
        $jsObj = json_encode($aux);
        $this->render('sharing',
        	array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionMAP($id)
	{
		$criteria = new CDbCriteria();                                                                                             
        $criteria->addSearchCondition( 'bs_id', $id, true );                                                                       
        $dataProvider = new CActiveDataProvider( 'Cpe', array( 'criteria' => $criteria,));                                         
        $model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
        foreach($model->cpes as $value){
            foreach ($value->sensingInfos as $info){
                $sensingInfos[]=$info;
                $aux[] = $info->getAttributes();
            }
        }
        $jsObj = json_encode($aux);
         
        $this->render('map',
        	array(                                                                                                    
            'model' => $model,
            'cpes' => $model->cpes,

            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}
	/**
	 * Updates a particular model.
	 * If update is successful, the browser will be redirected to the 'view' page.
	 * @param integer $id the ID of the model to be updated
	 */
	public function actionConfGateway($id) 
	{
		$bs=$this->loadModel($id);
		$model = new GatewayConfigForm();

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['GatewayConfigForm']))
		{
			$model->attributes=$_POST['GatewayConfigForm'];
            $model->validate();

            $request = array();
            $session_request = array();
            $session_finish = array();

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
            //var_dump($response_session);
            $response_decoded = json_decode($response_session, true);
            // *********************** FIM CONTROLE SESSAO *********************
            
            // Parametros obtidos da pagina
            if ($response_decoded['status'] === "accepted") {
                $request['sessionId'] = $response_decoded['sessionId'];
                $request['pollInterval'] = $model['polling'];
                $request['requestTimeout'] = $model['timeout'];
                $request['clearCache'] = $model['cache'];
            } else {
                Yii::app()->user->setFlash('error','Session could no be opened.');
                return;
            }
                
            //$data = json_encode($request);

            // URL on which we have to post data
            $url = "http://143.54.83.30:30000/gateway/index.php?r=services/set_configuration";
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
            //var_dump($response);
            $decoded_resp = json_decode($response);
            //var_dump($decoded_resp);

            if ($decoded_resp->errors === "none") {
                $current_config = new GatewayConfig();
                $current_config->bs_id = $bs->bsid;
                $current_config->status = $decoded_resp->configStatus;
                $current_config->pollInterval = $model['polling'];
                $current_config->requestTimeout = $model['timeout'];
                $current_config->clearCache = $model['cache'];
                if ($current_config->save()) { 
                    $last_config = GatewayConfig::model()->findByPk($current_config->id-1);
                    if (isset($last_config)) {
                        $last_config->status = "stopped";
                        $last_config->save();
                    }
                    Yii::app()->user->setFlash('success','Gateway configuration status: '.$decoded_resp->configStatus);
                } else {
                    Yii::app()->user->setFlash('error','Configuration can not be applied. Error: database error.');
                    //return;
                }
           } else {
                Yii::app()->user->setFlash('error','Configuration can not be applied. Error: '.$decoded_resp->errors);
                //return;
           }

            //Yii::app()->curl->addOption('CURLOPT_HTTPHEADER', 'Content-type: application/json');
            //$output = Yii::app()->curl->run($url, array('data'=>$data));
            //var_dump($output);

			// if($model->save())
				// $this->redirect(array('view','id'=>$model->bsid));

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
		

		$this->render('confGateway',array(
			'model'=>$model,
			'bs' => $bs
		));
	}

	/**
	 * Deletes a particular model.
	 * If deletion is successful, the browser will be redirected to the 'admin' page.
	 * @param integer $id the ID of the model to be deleted
	 */
	public function actionDelete($id)
	{
		if(Yii::app()->request->isPostRequest)
		{
			// we only allow deletion via POST request
			$this->loadModel($id)->delete();

			// if AJAX request (triggered by deletion via admin grid view), we should not redirect the browser
			if(!isset($_GET['ajax']))
				$this->redirect(isset($_POST['returnUrl']) ? $_POST['returnUrl'] : array('admin'));
		}
		else
			throw new CHttpException(400,'Invalid request. Please do not repeat this request again.');
	}

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{
		$dataProvider=new CActiveDataProvider('BaseStation');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new BaseStation('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['BaseStation']))
			$model->attributes=$_GET['BaseStation'];

		$this->render('admin',array(
			'model'=>$model,
		));
	}

	/**
	 * Returns the data model based on the primary key given in the GET variable.
	 * If the data model is not found, an HTTP exception will be raised.
	 * @param integer the ID of the model to be loaded
	 */
	public function loadModel($id)
	{

		$model=BaseStation::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		$this->model=$model;
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='base-station-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
