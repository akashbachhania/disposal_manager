<?php
//including initial file
include_once("init.php");

//creating object of session class
$session=$init->getSession();

//creating object of redirect class
$redirect=$init->getRedirect();

   
//Checking email and password on submit   
if(isset($_POST['submit']))
{
   $array = array(
        "email" => $_POST['email'],
        "password" => $_POST['password']
    );
    $admin = Admin::getInstance();
    $result=$admin->login($array);
    
    //setting session if user is available in database
    if($result){
	    //Redirect page according to there role
	    if($result['roll']==1)
	    {
	       $session->__set("firstname",$result['firstname']);
	       $session->__set("roll",$result['roll']);
	       $session->__set("user_id",$result['id']);
	       $redirect->redirect("admin/");
	    }
	    else if($result['roll']==2)
	    {
	       $session->__set("firstname",$result['firstname']);
	       $session->__set("roll",$result['roll']);
	       $session->__set("user_id",$result['id']);
	       $redirect->redirect("generators/");
	    }
	    else if($result['roll']==3)
	    {
	       $session->__set("roll",$result['roll']);
	       $session->__set("firstname",$result['firstname']);
	       $session->__set("user_id",$result['id']);
	       $redirect->redirect("vendors/");
	    }
	    else if($result['roll']==4)
	    {
	       $session->__set("roll",$result['roll']);
	       $session->__set("firstname",$result['firstname']);
	       $session->__set("user_id",$result['id']);
	       $redirect->redirect("administratorsr/");   
	    }   
   }
   else{
      ?>
      <script>
	 alert("invalid user name or password");
      </script>
      <?php
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
	    <h2 class="form-signin-heading">Please sign in</h2>
	    
	    <div class="placeholders">
	       <input type="text" name="email" class="form-control" placeholder="Email /Username" required autofocus>
	       <i class="fa fa-user"></i>
	    </div>
	       
	    <a href="#">I forgot login</a>
	    
	    <div class="placeholders">
	       <input type="password" name="password" class="form-control" placeholder="Password" required>
		  <i class="fa fa-lock"></i>
	    </div>
	    
	    <a href="<?php echo BASE_URL?>/forgotPassword">I forgot password</a>
	
	    <input class="btn btn-lg btn-primary btn-block" name="submit" type="submit" value="Sign in"/>

	    <div class="newuser">New user? <a href="">Create An Account</a></div>
      	</form><br>
      </div>
   </div>
</div> <!-- /container -->

<?php include_once("include/footer.php");?>
</html>
