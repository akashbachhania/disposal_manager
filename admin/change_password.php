<?php
//including initial file
include("../init.php");
	$admin = Admin::getInstance();
	$result=$admin->lastdate();
        $session = $init->getSession();
        $profile_pic=$admin->profile_pic();
//creating object of redirect class
//$redirect=$init->getRedirect();
    //if(!$session->__get("username")){
	//$redirect->redirect("../admin_signin.php");
 // }
	if(!$session->__get("roll")==1)
	{
	    $redirect->redirect("../admin_signin.php");
	}
	elseif($session->__get("roll")==2)
	{
	    $redirect->redirect("../generators");
	}
	elseif($session->__get("roll")==3)
	{
	    $redirect->redirect("../vendors");
	} 
 
 
if(isset($_POST['submit']))
{	$roll=$result['roll'];

	$id=$result['id'];
	$array=array("id"=>"$id","roll"=>"$roll","password"=>$_POST['password'],"npassword"=>$_POST['npassword'],"cpassword"=>$_POST['cpassword']);
	$admin->change_password($array);
}

?>
<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
		<script src="//netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/js/bootstrap.min.js"></script>
		<script src="//code.jquery.com/jquery-1.9.1.js"></script>
		<script src="//ajax.aspnetcdn.com/ajax/jquery.validate/1.9/jquery.validate.min.js"></script>
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<meta charset="utf-8">
		<meta http-equiv="X-UA-Compatible" content="IE=edge">
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<title>Disposal Manager</title>
		<link href="../css/bootstrap.min.css" rel="stylesheet">
		<link href="../css/custom.css" rel="stylesheet">
		<script src="js/jquery-1.10.2.js"></script>
                <script src="js/jquery.validate.js"></script>
                <script src="js/MyVal.js"></script>
                <style>
                label.error
                {
                    color:#900;	
                }
                </style>	
      	</head>
                
  	<body>
	    <?php
		include("../include/header.php");
		include("../include/header_menu.php");
            ?>
		<div class="banner bannerwithnoimg">
        	<div class="container">
            	<div class="bannertxt col-lg-12">
                    <span class="page_heading">Change Password</span>
                    <span class="page_txt">Aliqat volutpasac tupis. Integer rutrum ante eu lacuestibulum libero nisl porta vel sceleris que eget</span>
            	</div>
       		 </div>
  		</div>
   
   		<div class="main_div">
  			 <div class="rightshade"></div>
   				<div class="container">
    				<div class="row">
        				<div class="col-lg-12">
            	   			 <div class="">
                    			<div class="profile_pic"><img src="<?php echo BASE_URL;?>/<?php echo $profile_pic['image_src'];?>" alt="profile pic" width="87" height="87"></div>
		                        <span class="name"><?php echo $result['firstname'];?></span><br/>
                                    <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
                               
                               </div>
                   		 </div>
                    <div class="clearfix"></div>
                    
                    	
                            <div class="form-signin">
    <!-- <div class="brand-logo"><img src="images/disposal_logo.png" alt="brand logo"></div>		
     --->
     						<div class="loginform">
                            
								<form class="form-signin-container" role="form" name="frm" method='post' id="frm">
            							<h2 class="form-signin-heading">Change Password</h2>
           									
                                            
                                            <div class="placeholders">
               <input type="password" name="password" class="form-control" placeholder="Old Password" id="opassword">
            								</div>
            								
                                            <div class="placeholders">
               <input type="password" name="npassword" class="form-control" placeholder="New Password" id="npassword">
            								</div>
            							
                                        	<div class="placeholders">
               <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" id="cpassword">
           									 </div> 
            <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Update"/>
      	</form>
      </div>
   </div>
</div>

                    <div class="options">
                           

                        </div>
                    </div>
		  
                   
		   <div class="clearfix"></div>
		  
    </div>
        </div>
        
    </div>
   </div>
  <?php include("../include/footer.php");?>
    </div> <!-- /container -->
</body>
</html>

