<?php
class Vendor
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
	public function show_vendor(){
		try{
			$sql = "select * from users where roll='3'";
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
	// add vendor 	
	public function add_vendor($array){
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
				$sql = "select * from users where roll='3'";
				$res=$this->_dbh->query($sql);
				$value= $res->fetchall();
				if($value==Null)
				{
				$count = $this->_dbh->exec("INSERT INTO users(companyname,department,firstname,lastname,email,password,address1,address2,city,state,zipcode,epa_id,contact,fax,roll,date,account,account_no) VALUES ('".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".md5($array['password'])."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epa_id']."','".$array['contact']."','".$array['fax']."','3','".$array['date']."','".'1'."','".'90000001'."')"); 
				$id=$this->_dbh->lastInsertId();
				return $id;
				}
				else{
					$sql="SELECT MAX(account_no) as account from users where roll='3'";
					$res=$this->_dbh->query($sql);
					$value= $res->fetch();
					$value=$value['account']+1;
					$count = $this->_dbh->exec("INSERT INTO users(companyname,department,firstname,lastname,email,password,address1,address2,city,state,zipcode,epa_id,contact,fax,roll,date,account,account_no) VALUES ('".$array['companyname']."','".$array['department']."','".$array['firstname']."','".$array['lastname']."','".$array['email']."','".md5($array['password'])."','".$array['address1']."','".$array['address2']."','".$array['city']."','".$array['state']."','".$array['zipcode']."','".$array['epa_id']."','".$array['contact']."','".$array['fax']."','3','".$array['date']."','".'1'."','".$value."')"); 
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
	//show genrator on the basis of where clause
	public function show_vendor_where($where,$arg){
		try{
			$sql = "select * from users where roll='3' and $where='".$arg."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetchall();
			return($value);
		}catch(PDOException $e){
			echo $e->getMessage();
			}
		
		
	}
	//show_edit_vendor
	public function show_edit_vendor($id)
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
	//update vendor records by admin
	public function update_vendor($array,$id){
		try{
		$sql="UPDATE users SET companyname='".$array['companyname']."',department='".$array['department']."',firstname='".$array['firstname']."',lastname='".$array['lastname']."',email='".$array['email']."',password='".md5($array['password'])."',address1='".$array['address1']."',address2='".$array['address2']."',city='".$array['city']."',state='".$array['state']."',zipcode='".$array['zipcode']."',epa_id='".$array['epa_id']."',contact='".$array['contact']."',fax='".$array['fax']."' WHERE id='".$id."'";
		$result=$this->_dbh->query($sql);
		$this->_redirect->redirect("".BASE_URL."/admin/vendors.php");
		}catch(PDOException $e){
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
	public function update_globle_setting_vendor($array,$user_id){
		try{
			$sql = "select * from settingtb where user_id = '".$user_id."'";
			$res=$this->_dbh->query($sql);
			$value= $res->fetch();	
			if($value==NULL)
			{
				$this->_dbh->exec("INSERT INTO settingtb (account_type,price,no_site,user_id) VALUES ('".$array['account_type']."','".$array['price']."','".$array['no_site']."', '".$user_id."')");
			}
			else{
			$sql="UPDATE settingtb SET account_type='".$array['account_type']."',price='".$array['price']."',no_site='".$array['no_site']."' WHERE user_id='".$user_id."'";
			$result=$this->_dbh->query($sql);
			//$query="UPDATE users SET password='".md5($array['password'])."' WHERE id='".$user_id."'";
			//$result=$this->_dbh->query($query);
		}
		$this->_redirect->redirect("".BASE_URL."/admin/vendors");
		}catch(PDOException $e){
			echo $e->getMessage();
			}
	}
	
	
}
