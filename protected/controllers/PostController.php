<?php

class PostController extends Controller
{
	//public $layout='main';

	/**
	 * @var CActiveRecord the currently loaded data model instance.
	 */
	private $_model;

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
			array('allow',  // allow all users to access 'index' and 'view' actions.
				'actions'=>array('index','view','login','add'),
				'users'=>array('*'),
			),
			array('allow', // allow authenticated users to access all actions
				'users'=>array('@'),
			),
			array('deny',  // deny all users
				'users'=>array('*'),
			),
		);
	}

	

	/**
	 * Lists all models.
	 */
	public function actionIndex()
	{

	/*	$userModel = Comment::model()->findAll(); 
		print_r($userModel);*/

	/*	$Page = new CPagination(ModelName::model()->count($Criteria));
		$Page->pageSize = 2;
		$Page->applyLimit($Criteria);*/
		$Page=	Yii::app()->params['postsPerPage'];
		//postsPerPage
		$model = new User('search');


        // HERE GET YOUR SEARCH PARAMETERS IF ANY
        //$model->unsetAttributes();
/*
		$dataProvider=new CActiveDataProvider('User', array(
			'criteria'=>array(
			),
		    'pagination'=>array(
		        'pageSize'=> Yii::app()->user->getState('pageSize',$Page),
		    ),
		));*/
		$model->unsetAttributes(); // clear any default values
		if (isset($_GET['User']))
			$model->attributes = $_GET['User'];

	/*	if (isset($_GET['pageSize'])) {
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
   		}*/

		if(Yii::app()->request->isAjaxRequest){
			$this->renderPartial('index',array(
				//'dataProvider'=>$dataProvider,
				'pageSize' => $Page,
				'model'=>$model
			)); 
		}else{
			$this->render('index',array(
				//'dataProvider'=>$dataProvider,
				'pageSize' => $Page,
				'model'=>$model
			));
		}


		

	}

	/**
	 * Lists all models.
	 */
	public function actionAdd()
	{
		$model = new User;
		$model->setScenario('add');
		$errores	=	array();
		// If form is submitted and data is correct...
		// collect user input data


		if(isset($_POST['User']))
		{
			$_POST['User']['role']	=	Yii::app()->params['subAdminRole'];
			$model->attributes=$_POST['User'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){ 
				$model -> save();
				$this -> redirect(array('post/index'));
			}else{
				$errores = $model->getErrors();
			}
		}			
		// else, show the form again
		$this->render('add', ['model' => $model]);
	}

	public function actionDelete($id){
		$criteria = new CDbCriteria;
		$criteria->addInCondition('id',array($id));
		User::model()->deleteAll($criteria);	
	}

	public function actionUpdate($id)
	{
		$model 		= 	new User;
		//$userData	=	User::model()->findAllByAttributes(array('id'=>$id));

		 $model=$this->loadModel($id); 

		
		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			if(!isset($this->isNewRecord)) {
				if($model->validate()){
					if($model->save())
					$this -> redirect(array('post/index'));
				}else{
					$errores = $model->getErrors();
				}
			}
		}
		$this->render('update',array(
			'model'=>$model
		));
	}

	public function actionView($id)
	{
		$model 		= 	new User;
		//$userData	=	User::model()->findAllByAttributes(array('id'=>$id));

		 $model=$this->loadModel($id); 

		$this->render('view',array(
			'model'=>$model
		));
	}

	public function loadModel($id)
	{
		$model=User::model()->findByPk($id);
		if($model===null)
			throw new CHttpException(404,'The requested page does not exist.');
		return $model;
	}


	public function actionLogin()
	{
		if (!defined('CRYPT_BLOWFISH')||!CRYPT_BLOWFISH)
			throw new CHttpException(500,"This application requires that PHP was compiled with Blowfish support for crypt().");

		$model=new LoginForm;


		// collect user input data
		if(isset($_POST['LoginForm']))
		{
				
			$model->attributes=$_POST['LoginForm'];
			// validate user input and redirect to the previous page if valid
			if($model->validate() && $model->login())
				$this->redirect(Yii::app()->user->returnUrl);
		}
		// display the login form
		$this->render('login',array('model'=>$model));
	}

	/**
	 * Logs out the current user and redirect to homepage.
	 */
	public function actionLogout()
	{
		Yii::app()->user->logout();
		$this->redirect(Yii::app()->homeUrl);
	}

	public function actionEdit(){
		$model 		= 	new User;
		$model->setScenario('edit');
		$user_id	=	Yii::app()->user->getId(); 
		//$userData	=	User::model()->findAllByAttributes(array('id'=>$id));
		$model=$this->loadModel($user_id); 
		if(isset($_POST['User'])){
			$model->attributes=$_POST['User'];
			//if(!isset($this->isNewRecord)) {
				if($model->validate()){
					if($model->save())
					$this -> redirect(array('post/index'));
				}else{
					$errores = $model->getErrors();
				}
			//}
		}
		$this->render('edit',array(
			'model'=>$model
		));
	}
}
