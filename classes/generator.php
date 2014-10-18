<?php
class Generators
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
	
	//show genrator list
	public function show_genrator(){
		try{
			
			$sql = "select * from users where roll='2'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetchall();
			return($value);
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
	}
	//show genrator suspend acount list
	public function show_suspend_genrator(){
		try{
			
			$sql = "select * from users where roll='2'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetchall();
			return($value);
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
	}
	//add more address functionality
	public function add_more_address($address,$id){
		try{
			$count = $this->_dbh->exec("insert into address (address,user_id)values('$address','$id')");
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
		
	}
	
	// add genrator 	
	public function add_genrator($array){
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
				$sql = "select * from users where roll='2'";
				$res=$this->_dbh->query($sql);
				$value= $res->fetchall();
				if($value==Null)
				{
				$count = $this->_dbh->exec("INSERT INTO users(companyname,department,firstname,lastname,email,password,address1,address2,city,state,zipcode,epa_id,contact,fax,roll,date,account,account_no) VALUES ('".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".md5($array['password'])."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epa_id']."','".$array['contact']."','".$array['fax']."','2','".$array['date']."','".'1'."','".'10000001'."')"); 
				$id=$this->_dbh->lastInsertId();
				return $id;
				}
				else{
					$sql="SELECT MAX(account_no) as account from users where roll='2'";
					$res=$this->_dbh->query($sql);
					$value= $res->fetch();
					$value=$value['account']+1;
					$count = $this->_dbh->exec("INSERT INTO users(companyname,department,firstname,lastname,email,password,address1,address2,city,state,zipcode,epa_id,contact,fax,roll,date,account,account_no) VALUES ('".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".md5($array['password'])."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epa_id']."','".$array['contact']."','".$array['fax']."','2','".$array['date']."','".'1'."','".$value."')"); 
					$id=$this->_dbh->lastInsertId();
					return $id;
					
					
				}
				
					
			}
			
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
		
	}
	//show  rejoin record functionality by admin
	public function rejoin($id)
	{
		try{
			$sql = "select * from suspendtb where suspend_id='$id'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			return($value);
		}catch( PDOException $e)
		{
			echo $e->getInstance();
		}
		
		
	}
	//permanent remove  argument..
	public function remove_account($id)
	{
	    try{
		$sql = "delete from users where id='".$id."'";
		$result=$this->_dbh->query($sql);
		$sql = "delete from suspendtb where suspend_id='".$id."'";
		$result=$this->_dbh->query($sql);
		
		return true;
		}
		catch(PDOException $e)
		{
		    echo $e->getMessage();
		}
	}
	//suspend  argument..
	public function suspend_id($id)
	{
	    try{
		if($id)
		{
			$session= Session::getInstance();
			$username=$session->__get("firstname");
			$sql = "select * from users where id='$id'";
			$res=$this->_dbh->query($sql);
			$array= $res->fetch(PDO::FETCH_ASSOC);
			$this->_dbh->exec("INSERT INTO suspendtb(suspend_id,suspend_by,firstname,lastname,email,suspend_date) VALUES ('".$id."','".$username."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".date('d-M-Y')."')");
		}
		$sql="UPDATE users SET account='"."0"."' WHERE id='".$id."'";
		$result=$this->_dbh->query($sql);
	    return true;
	    }
	    catch(PDOException $e)
	    {
		echo $e->getMessage();
	    }
	}
	//join or rejoin  argument..
	public function join($id)
	{
	    try{
			$sql = "delete from suspendtb where suspend_id='".$id."'";
			$result=$this->_dbh->query($sql);
			$sql="UPDATE users SET account='"."1"."' WHERE id='".$id."'";
			$result=$this->_dbh->query($sql);
			return true;
	    }
	    catch(PDOException $e)
	    {
		echo $e->getMessage();
	    }
	}
	
	
	//show genrator on the basis of where clause
	public function show_genrator_where($where,$arg){
		try{
			$sql = "select * from users where roll='2' and $where='".$arg."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetchall();
			return($value);
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
		
	}
	
	//show_edit_generator
	public function show_edit_generator($id)
	{
	    try{
			$sql = "select * from users where id='$id'";
			$res=$this->_dbh->query($sql);
			$array= $res->fetch(PDO::FETCH_ASSOC);
			return $array;
	    }
	    catch(PDOException $e)
	    {
		echo $e->getMessage();
	    }
	}
	//update generator records by admin
	public function update_generator($array,$id){
		try{
		$sql="UPDATE users SET companyname='".$array['companyname']."',department='".$array['department']."',firstname='".$array['firstname']."',lastname='".$array['lastname']."',email='".$array['email']."',password='".md5($array['password'])."',address1='".$array['address1']."',address2='".$array['address2']."',city='".$array['city']."',state='".$array['state']."',zipcode='".$array['zipcode']."',epa_id='".$array['epa_id']."',contact='".$array['contact']."',fax='".$array['fax']."' WHERE id='".$id."'";
		$result=$this->_dbh->query($sql);
		$this->_redirect->redirect("".BASE_URL."/admin/generators.php");
		//header('Location:generators.php');
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	//update generator records by generator
	public function update_user_generator($array,$id){
		try{
		$sql="UPDATE users SET companyname='".$array['companyname']."',department='".$array['department']."',firstname='".$array['firstname']."',lastname='".$array['lastname']."',password='".md5($array['password'])."',address1='".$array['address1']."',address2='".$array['address2']."',city='".$array['city']."',state='".$array['state']."',zipcode='".$array['zipcode']."',epa_id='".$array['epa_id']."',contact='".$array['contact']."',fax='".$array['fax']."' WHERE id='".$id."'";
		$result=$this->_dbh->query($sql);
		$this->_redirect->redirect("".BASE_URL."/generators/userprofile");
		//header('Location:generators.php');
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	//show login last date in generator
	public function lastdate(){
		try{
			$session= Session::getInstance();
			$id=$session->__get("user_id");
			$sql = "select * from users where id='$id'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			return($value);
		}
		catch(PDOException $e){
			echo $e->getMessage();
			}
		
	}
	//check
	
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
		$password=md5($array['password']);
		$npassword=md5($array['npassword']);
		$cpassword=md5($array['cpassword']);
	
		//change ADMIN password which have ID==1 Always
		/*if($id==1){
			if($npassword!=$cpassword){
			$this->_redirect->redirect("".BASE_URL."/generators/change_password");
			
			}
		else{
			$query="update admin set password='$npassword' where id= '". $array['id'] ."' and password='$password'";
			$count=$this->_dbh->query($query);
				$this->_redirect->redirect("".BASE_URL."/admin/userprofile");
			}
		}
		*/
		//change USER[Administrator] password which have ID>1 Always
		if($id>1){
			if($npassword!=$cpassword){
			$this->_redirect->redirect("".BASE_URL."/generators/change_password");}
			else{
				$query="update users set password='$npassword' where id= '". $array['id'] ."' and password='$password'";
				$count=$this->_dbh->query($query);
				return true;
				//$this->_redirect->redirect("".BASE_URL."/generators/userprofile");				
			}
		}
  
	}
	//add new site in generator/sites section
	public function add_new_sites($array,$id){
		try{ 
		$query="insert into sites(sitename,companyname,departmentname,firstname,lastname,email,address1,address2,city,state,zipcode,epaid,contactnumber,fax,add_user_id) values('".$array['sitename']."','".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epaid']."','".$array['contact']."','".$array['fax']."','$id')";
		$result=$this->_dbh->query($query);
		$this->_redirect->redirect("".BASE_URL."/generators/sites");
		}
		catch(PDOException $e){
		  echo $e->getMessage();
		  }
	}
	//show globle setting recode
	public function show_globle_setting_record($id){
		try{
			$sql = "select * from settingtb where user_id='$id'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch(PDO::FETCH_ASSOC);
			$res=$this->_dbh->query($sql);
			return($value);
		}
		catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	//update generator globle setting records by admin
	public function update_globle_setting_generator($array,$user_id){
		try{
			$sql = "select * from settingtb where user_id = '".$user_id."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();	
			if($value==NULL)
			{
				$d=$this->_dbh->exec("INSERT INTO settingtb (account_type,price,no_vendor,profile_allow,no_site,user_id) VALUES ('".$array['account_type']."','".$array['price']."','".$array['no_vendor']."','".$array['profile_allow']."','".$array['no_site']."','".$user_id."')");
			}
			else{
			$sql="UPDATE settingtb SET account_type='".$array['account_type']."',price='".$array['price']."',no_vendor='".$array['no_vendor']."',profile_allow='".$array['profile_allow']."',no_site='".$array['no_site']."' WHERE user_id='".$user_id."'";
			$result=$this->_dbh->query($sql);
			
		}
		$this->_redirect->redirect("".BASE_URL."/admin/generators");
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	//Select Site For Dropdown list 
	public function select_sites($user_id){
	try{
		$query="select * from sites where add_user_id='$user_id'";
		$res=$this->_dbh->query($query);
		$value= $res->fetchall();
		return($value);
			}
		catch(PDOException $e){
		echo $e->getMessage();
		}
       }
       //ajax calling argument in select field
        public function select_edit_sites($id){
	try{
		$sql = "select * from sites where id='$id'";
		$res=$this->_dbh->query($sql);
		$value= $res->fetch(PDO::FETCH_ASSOC);
		return($value);
		}
		catch(PDOException $e){
		  echo $e->getMessage();
		}
	}
	//Edit Existing Site In generator/site section
	public function edit_existing_sites($array){
	try{
		$query="update sites set sitename='".$array['sitename']."',address='".$array['address']."',contact='".$array['contact']."' where id='".$array['site_id']."'";
	        $this->_dbh->query($query);
	        $this->_redirect->redirect("".BASE_URL."/generators/editExistingSites");
	        }
	        catch(PDOException $e){
	        echo $e->getMessage();
	        }
	}
	//manifests upload file
	public function manifests_upload($url,$array){
	try{ 
		$sql="insert into manifests_tb(site_id,site_name,manifestsnumber,uploadfile,upload_date) values('".$array['site_id']."','".$array['sitename']."','".$array['manifestnumber']."','".$url."','".$array['upload_date']."')";
		$this->_dbh->query($sql);
		$this->_redirect->redirect("".BASE_URL."/generators/manifests");
		}
		catch(PDOException $e){
		echo $e->getMessage();
		}
	}
       
}	
