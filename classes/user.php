<?php
//require_once '../init.php';
class User
{
	private $dbh;
	private $redirect;
	private static $instance=NULL;
	function __construct()
	{
		$dbObject = DatabaseConnection::getInstance();
		$this->_dbh = $dbObject->getConnection();
		$this->_redirect = URLRedirect::getInstance();
	}
	//get object of current class...
	public static function getInstance()
	{ 
	    if( self::$instance === NULL )
	    { 
		   self::$instance = new self();
	    }
	    return self::$instance;
	}
	
	//function for forgot password
	public function forgot_password($array){
		$email=$array['email'];
		$sql="select * from users where email='".$email."'";
		$a=$this->_dbh->query($sql);
		$value= $a->fetch();
		//echo "<pre>";print_r($value);die;
		return $value;
	}

	//Inserting random number to database for reseting password	
	public function insert_rand_no($rand_no,$user_id){
		$this->_dbh->exec("INSERT INTO password_reset set random_no='".$rand_no."',user_id='".$user_id."'");
	}

	//checking if redirect random number exist in database or not
	public function check_rand_no($rand_no){
		$sql="select * from password_reset where random_no='".$rand_no."'";
		$a=$this->_dbh->query($sql);
		$value= $a->fetch();
		//echo "<pre>";print_r($value);die;
		return $value;
	}

	//Function to reset password
	public function update_password($user_id,$new_password){
		$new=md5($new_password);
		$sql="UPDATE users SET password='".$new."' WHERE id='".$user_id."'";
		$sql1="DELETE from password_reset where user_id='".$user_id."'";
		$result=$this->_dbh->query($sql);
		$result=$this->_dbh->query($sql1);
	}
}