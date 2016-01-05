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
				'actions'=>array('index','view','add'),
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

		$this->render('index');
	}

	/**
	 * Lists all models.
	 */
	public function actionAdd()
	{
		$model = new User;

			// If form is submitted and data is correct...
		// collect user input data
		if(isset($_POST['AddUser']))
		{
			$model->attributes=$_POST['AddUser'];
			// validate user input and redirect to the previous page if valid
			if($model->validate()){
				$model -> save();
				$this -> redirect(array('post/index'));
			}else{

				$errores = $model->getErrors();
				print_r($_POST['AddUser']);exit;
			}
				
		}else{
			// else, show the form again
			$this->render('add', ['model' => $model]);
		}
			


	}

}
