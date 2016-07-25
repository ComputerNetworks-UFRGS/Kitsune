<?php

class CpeController extends Controller
{
	/**
	 * @var string the default layout for the views. Defaults to '//layouts/column2', meaning
	 * using two-column layout. See 'protected/views/layouts/column2.php'.
	 */
	public $model;
  
	public $layout='//layouts/cpe';

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
				'actions'=>array('view', 'index', 'create','update', 'occupancy', 'throughput', 'rssi', 'map', 'decision', 'mobility'),
				'users'=>array('@'),
			),
			array('allow', // allow admin user to perform 'admin' and 'delete' actions
				'actions'=>array('admin','delete', ),
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
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
		}
		$jsObj = json_encode($aux);
         
        $this->render('view',array(                                                                                                    
            'model' => $model,
            'sensingInfos' => $sensingInfos,
            'jsObj'=> $jsObj,
        ));  

	}

	/**
	 * Displays a particular model.
	 * @param integer $id the ID of the model to be displayed
	 */
	public function actionOccupancy($id)
	{
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
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
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
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
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
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
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
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
	public function actionDecision($id)
	{
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
		}
		$jsObj = json_encode($aux);
         
        $this->render('decision',
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
	public function actionMobility($id)
	{
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
		}
		$jsObj = json_encode($aux);
         
        $this->render('mobility',
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
		$model = $this->loadModel($id);
        $sensingInfos = array(); 
        $aux = array();                                                                                                              
		foreach ($model->sensingInfos as $info){
    	    $sensingInfos[]=$info;
    	    $aux[] = $info->getAttributes();
		}
		$jsObj = json_encode($aux);
         
        $this->render('map',
        	array(                                                                                                    
            'model' => $model,
            'bs' => $model->bs,

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
		$model=new Cpe;

		// Uncomment the following line if AJAX validation is needed
		// $this->performAjaxValidation($model);

		if(isset($_POST['Cpe']))
		{
			$model->attributes=$_POST['Cpe'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cpeid));
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

		if(isset($_POST['Cpe']))
		{
			$model->attributes=$_POST['Cpe'];
			if($model->save())
				$this->redirect(array('view','id'=>$model->cpeid));
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
		$dataProvider=new CActiveDataProvider('Cpe');
		$this->render('index',array(
			'dataProvider'=>$dataProvider,
		));
	}

	/**
	 * Manages all models.
	 */
	public function actionAdmin()
	{
		$model=new Cpe('search');
		$model->unsetAttributes();  // clear any default values
		if(isset($_GET['Cpe']))
			$model->attributes=$_GET['Cpe'];

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
		$model=Cpe::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
        $this->model = $model;
		return $model;
	}

	/**
	 * Performs the AJAX validation.
	 * @param CModel the model to be validated
	 */
	protected function performAjaxValidation($model)
	{
		if(isset($_POST['ajax']) && $_POST['ajax']==='cpe-form')
		{
			echo CActiveForm::validate($model);
			Yii::app()->end();
		}
	}
}
