<?php
class Admin
{
	private $dbh;
	private $redirect;
	private static $instance=NULL;
	function __construct()
	{
		$dbObject = DatabaseConnection::getInstance();
		$this->_dbh = $dbObject->getConnection();
		$this->_redirect = URLRedirect::getInstance();
		$session= Session::getInstance();
		
			
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
	// manage login functionality......
	public function login($array) {
		try {
			
			$email=$array['email'];
			$sql = "select * from admin where email = '$email'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();
			if($value==Null)
			{
				$sql = "select * from users where email = '$email'";
				$res=$this->_dbh->query($sql);
				$value= $res->fetch();
			}
			
			if(($array['email']==$value['email']) and  (md5($array['password'])==($value['password'])))
			{
				return $value;
					
			}
			else{
				return false;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	//show login date
	public function lastdate(){
		try{
			$session= Session::getInstance();
			$id=$session->__get("user_id");
			$sql = "select * from admin where id='$id'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			if($value==Null)
			{
				$sql = "select * from users where id='$id'";
				$res=$this->_dbh->query($sql);
				$value= $res->fetch(PDO::FETCH_ASSOC);
			}
			return($value);
		}
		catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	// logout functionality
	public function logout($id){
		try{
			$sql = "select * from users WHERE id='".$id."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			if($value)
			{
				$sql="UPDATE users SET date='".date('D-m-Y')."' WHERE id='".$id."'";
			}else{
				$sql="UPDATE admin SET date='".date('D-m-Y')."' WHERE id='".$id."'";
			}
		
		$result=$this->_dbh->query($sql);
		
		$session= Session::getInstance();
		$session->destroy();
		$this->_redirect->redirect("home");
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	
	//Showing the list of all administrator
	public function show_admin(){
		try{
			$sql = "select * from users where roll='1'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetchall();
			return($value);
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
		
	}
	
	// manage profile pic functionality......
	public function profile_pic() {
		try {
			$sql = "select image_src from profile_images where user_id = '".$_SESSION['user_id']."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();	
			
			if($value==Null)
			{
				$value="/images/profile_pic.png";
				return $value;
			}
			
			else{
				return $value;
			}
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}
	
	//Updating profile pic on basis of user id
	public function update_profile_pic($url,$user_id) {
		try {
			$sql = "select image_src from profile_images where user_id = '".$user_id."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();	
			if($value==NULL)
			{
				$this->_dbh->exec("INSERT INTO profile_images (image_src,user_id) VALUES ('".$url."','".$user_id."')");
			}
			else{
				$sql="UPDATE profile_images SET image_src='".$url."' WHERE user_id='".$user_id."'";
				$result=$this->_dbh->query($sql);
			}	
		}
		catch(PDOException $e) {
			echo $e->getMessage();
		}
	}

	//Change Old password ACCORDING thier Roll/ID  
	public function change_password($array){	
		$id=$array['id'];
		//$roll=$array['roll'];
		$password=md5($array['password']);
		$npassword=md5($array['npassword']);
		$cpassword=md5($array['cpassword']);
		//change ADMIN password which have ID==1 Always
		if($id==1){
			
			if($npassword!=$cpassword){
			$this->_redirect->redirect("".BASE_URL."/admin/change_password");
			
			}
		else{
			$query="update admin set password='$npassword' where id= '". $array['id'] ."' and password='$password'";
			$count=$this->_dbh->query($query);
				$this->_redirect->redirect("".BASE_URL."/admin/userprofile");
			}
		}
		//change USER[Administrator] password which have roll>1 Always
		else if($id>1){
			if($npassword!=$cpassword){
			$this->_redirect->redirect("".BASE_URL."/admin/change_password");}
			else{
				$query="update users set password='$npassword' where id= '". $array['id'] ."' and password='$password'";
				$count=$this->_dbh->query($query);
				$this->_redirect->redirect("".BASE_URL."/admin/userprofile");				
			}
		}
  
	}

	
	
	//help  functionality
	public function help($array){
		try{
			$session= Session::getInstance();
			$session_username=$session->__get("user_id");
			$count = $this->_dbh->exec("INSERT INTO helptb(firstname,contact,email,problem,message_by) VALUES ('".$array['firstname']."','".$array['contact']."','".$array['email']."','".$array['problem']."','".$session_username."')");
			if($count){
				return true;
			}else{
				return false;
			}
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	// add administrator 	
	public function add_administrator($array){
		try{
			$email=$array['email'];
			$sql = "select * from users where email = '$email' ";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();
			if($value['email']==$array['email'])
			{
			      return "email";
			}
			else
			{
				$count = $this->_dbh->exec("INSERT INTO users(companyname,department,firstname,lastname,email,password,address1,address2,city,state,zipcode,epa_id,contact,fax,roll,date,account) VALUES ('".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".md5($array['password'])."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epa_id']."','".$array['contact']."','".$array['fax']."','1','".$array['date']."','".'1'."')"); 
				$id=$this->_dbh->lastInsertId();
				return $id;
			}
			
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	//administrator remove  argument..
	public function remove_account($id)
	{
	    try{
		$sql = "delete from users where id='".$id."'";
		$result=$this->_dbh->query($sql);
		return true;
		}
		catch(PDOException $e)
		{
		    echo $e->getMessage();
		}
	}
	//update adminisrartor records 
	public function update_admin_record($array,$id,$firstname){
		try{
			$sql = "select * from admin where id='$id' and firstname='$firstname'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			if($value != NULL)
			{
				$query="UPDATE admin SET companyname='".$array['companyname']."',department='".$array['department']."',firstname='".$array['firstname']."',lastname='".$array['lastname']."',email='".$array['email']."',password='".md5($array['password'])."',address1='".$array['address1']."',address2='".$array['address2']."',city='".$array['city']."',state='".$array['state']."',zipcode='".$array['zipcode']."',epa_id='".$array['epa_id']."',contact='".$array['contact']."',fax='".$array['fax']."' WHERE id='".$id."'";
			}else{
				$query="UPDATE users SET companyname='".$array['companyname']."',department='".$array['department']."',firstname='".$array['firstname']."',lastname='".$array['lastname']."',email='".$array['email']."',password='".md5($array['password'])."',address1='".$array['address1']."',address2='".$array['address2']."',city='".$array['city']."',state='".$array['state']."',zipcode='".$array['zipcode']."',epa_id='".$array['epa_id']."',contact='".$array['contact']."',fax='".$array['fax']."' WHERE id='".$id."'";
			}
			$result=$this->_dbh->query($query);
			$this->_redirect->redirect("".BASE_URL."/admin/user_profile.php");
			}catch(PDOException $e){
			echo $e->getMessage();
			}
	}

}
