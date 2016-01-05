<?php

class User extends CActiveRecord
{

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

    public $name;
    public $email;
    public $password;

    public function rules()
    {
        return [
            [['name', 'email','password'], 'required'],
            ['email', 'email'],
        ];
    }
}