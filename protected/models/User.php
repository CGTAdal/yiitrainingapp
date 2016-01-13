<?php

class User extends CActiveRecord
{

	public $name;
    public $email;
    public $password;
    public $con_password;
    public $rememberMe;
    public $role;

    public function hashPassword($password){
		return CPasswordHelper::hashPassword($password);
	}


	/**
	 * Returns the static model of the specified AR class.
	 * @return static the static model class
	 */
	public static function model($className=__CLASS__)
	{
		return parent::model($className);
	}

	/**
	 * @return string the associated database table name
	 */
	public function tableName()
	{
		return '{{user}}';
	}

    
	/**
	 * Declares the validation rules.
	 * The rules state that username and password are required,
	 * and password needs to be authenticated.
	 */
	public function rules()
	{
		return array(
			array('name,email, password,role','safe'),
			// username and password are required
			array('name,email, password', 'required'),
			//email needs to be a valid email address
			array('email','email'),
			array('email', 'unique', 'on' => 'add'),
			//compare passowrd & confirm password
			array('con_passowrd', 'compare', 'compareAttribute'=>'password' , 'on'=>'edit'),
		);
	}


	public function check_confirm($attribute,$params)
	{
		$this->addError('con_password', 'your password is not strong enough!');
	    //if(!preg_match($pattern, $this->$attribute))
	      //$this->addError($attribute, 'your password is not strong enough!');
	} 


		

	public function beforeSave() {
	    if(isset($this->isNewRecord)) 
	    	if(isset($this->password)) 
	    		$this->password = $this->hashPassword($this->password);
	    return parent::beforeSave();
	}

	
	public function validatePassword($password)
	{
		return CPasswordHelper::verifyPassword($password,$this->password);
		//print_r($result);exit;
	}

	public function search()
	{
		$pageSize=Yii::app()->user->getState('pageSize',2);
		$criteria=new CDbCriteria;
		$criteria->compare('name',$this->name,true);
		$criteria->compare('email',$this->email,true);

		$sort = new CSort();
	 	$sort->attributes = array(
	    	/*'customer'=>array(
		      	'asc'=>'customer.customer_name',
		      	'desc'=>'customer.customer_name desc',
		    ),
	    	'school'=>array(
		      	'asc'=>'school.school_name',
		      	'desc'=>'school.school_name desc',
		    ),*/
	    	'name',
	    	'email',
	  );
	 	
		if (isset($_GET['pageSize'])) {
			print_r($_GET['pageSize']);
            Yii::app()->user->setState('pageSize',(int)$_GET['pageSize']);
            unset($_GET['pageSize']);
        }

		return new CActiveDataProvider('User', array(
			'criteria'=>$criteria,
			'sort'=>$sort,
		    'pagination'=>array(
		        'pageSize'=> Yii::app()->user->getState('pageSize',$pageSize),
		    )
		));

	}
    
}