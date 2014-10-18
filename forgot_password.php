<?php
//including initial file
include_once("init.php");

//creating object of session class
$session=$init->getSession();

//creating object of redirect class
$redirect=$init->getRedirect();

   
//Checking email and password on submit   
if(isset($_POST['forgot_password']))
{
   $array = array(
        "email" => $_POST['email']
    );
    $user = User::getInstance();
    $result=$user->forgot_password($array);
    
    if($result){
    	$rand_no=mt_rand();
    	$link=BASE_URL."/resetPassword/".$rand_no;
    	$reset_password_result=$user->insert_rand_no($rand_no,$result['id']);
    	$mail = Mail::getInstance();
    	$mail_result=$mail->send_forgot_password_mail($link,$result['email']);
    	$redirect->redirect("signin");  
    }
    else{
    	echo "<script>alert('This email is not registed');</script>";
    }
}

//Redirecting to home page if user is not logged in
   if($session->__get("roll")==1)
   {
      $redirect->redirect("admin/");
   }
   elseif($session->__get("roll")==2)
   {
      $redirect->redirect("generators/");
   }
   elseif($session->__get("roll")==3)
   {
      $redirect->redirect("vendors/");
   }

?>
<body>
<?php include_once("".BASE_PATH."include/header.php"); include_once("".BASE_PATH."include/header_menu.php");?>

   
   <div class="container">
      <div class="form-signin">
	 <br>		
	 <div class="loginform">
	 <form class="form-signin-container" role="form" name="login" method='post' id="login">
	    <h2 class="form-signin-heading">Please enter your registered email</h2>
	    
	    <div class="placeholders">
	       <input type="text" name="email" class="form-control" placeholder="Email /Username" required autofocus>
	       <i class="fa fa-user"></i>
	    </div>
	       
	    <a href="#">I forgot login</a>
	
	    <input class="btn btn-lg btn-primary btn-block" name="forgot_password" type="submit" value="Submit"/>
	    <div class="newuser">New user? <a href="#">Create An Account</a></div>
      	</form><br>
      </div>
   </div>
</div> <!-- /container -->

<?php include_once("include/footer.php");?>
</html>
