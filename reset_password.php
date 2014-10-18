<?php
//including initial file
include_once("init.php");

//creating object of session class
$session=$init->getSession();

//creating object of redirect class
$redirect=$init->getRedirect();

if(isset($_REQUEST['rand_no'])){
  $rand_no=$_REQUEST['rand_no'];
  $user = User::getInstance();
  $result=$user->check_rand_no($rand_no);
}

if(isset($_REQUEST['reset_password'])){
    $user = User::getInstance();
    $result_update_password=$user->update_password($_REQUEST['user_id'],$_REQUEST['password']);
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
<?php
if($result){
?>
<?php include_once("".BASE_PATH."include/header.php"); include_once("".BASE_PATH."include/header_menu.php");?>
   
   <div class="container">
      <div class="form-signin">
	 <br>		
	 <div class="loginform">
	 <form class="form-signin-container" role="form" name="generators_form" method='post' id="generators_form">
	    <h2 class="form-signin-heading">Reset Your Password</h2>
	    
	    <div class="placeholders">
          <input type="hidden" name="user_id" value="<?php echo $result['user_id']?>">
	       <input type="password" name="password" class="form-control" placeholder="New Password" required autofocus id="password">
	       <i class="fa fa-user"></i>
	    </div>

      <div class="placeholders">
         <input type="password" name="cpassword" class="form-control" placeholder="Confirm Password" required autofocus>
         <i class="fa fa-user"></i>
      </div>
	       
	
	    <input class="btn btn-lg btn-primary btn-block" name="reset_password" type="submit" value="Submit"/>
	    <div class="newuser">New user? <a href="#">Create An Account</a></div>
      	</form><br>
      </div>
   </div>
</div> <!-- /container -->

<?php include_once("include/footer.php");?>
<?php }else{
  echo "<script>alert('Invalid Link or Link is used before');</script>";
}
?>
</html>
