<?php
//including initial file
include("../init.php");
    $session = $init->getSession();
    $redirect = $init->getRedirect();
    $admin = Admin::getInstance();
    $profile_pic=$admin->profile_pic();
    //if(!$session->__get("firstname")){
	//$redirect->redirect("../admin_signin.php");
    //}
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
    {
    $array = array(
        "firstname" => $_POST['firstname'],
        "contact" => $_POST['contact'],
	"email" => $_POST['email'],
        "problem" => $_POST['problem']
    );
    $result=$admin->help($array);
	if($result)
	{
	    $mail = Mail::getInstance();
	    $mail->send($array);
	}
    }
    // includding header portion
    include("../include/header.php");
    include("../include/header_menu.php");
?>
	<div class="banner bannerwithnoimg">
        <div class="container">
            <div class="bannertxt col-lg-8">
                <span class="page_heading">Help Page</span>
                <span class="page_txt">Aliqat volutpasac tupis. Integer rutrum ante eu lacuestibulum libero nisl porta vel sceleris que eget</span>
            </div>
        </div>
  	</div>
   
   <div class="main_div">
   <div class="leftshade"><img src="images/leftshade.png" alt="left shade"></div>
   <div class="rightshade"><img src="images/rightshade.png" alt="left shade"></div>
   	<div class="container">
    	<div class="row">
        	<div class="col-lg-8">
            	<h2 class="heading_bg">Send us message</h2>
                <div class="content">
                    	<form role="form" method="post">
                          <div class="form-group">
                            <label>User name:</label>
                            <input type="text" name="firstname" class="form-control" placeholder="User name">
                          </div>
                          
                          <div class="form-group">
                            <label>Phone Number:</label>
                            <input type="text" name="contact" class="form-control" placeholder="Phone Number">
                          </div>
                          <div class="form-group">
                            <label>Email Address:</label>
                            <input type="email" name="email" class="form-control" placeholder="Email Address">
                          </div>
                          <div class="form-group">
                            <label>description of problem:</label>
                            <textarea class="form-control" rows="3" name="problem"></textarea>
                           <!-- <input type="text" class="form-control" placeholder="">-->
                         
			  </div>
			  <div class="clearfix"></div>
                          
                          <div>
                            <input type="submit" name="submit" class="btn btn-default submit" value="Submit"/>
                          </div>	
                          </form>
                    
                    
                </div>
            </div>
        </div>
        
    </div>
   </div>
   <?php include("../include/footer.php");?>
    </div> <!-- /container -->
</body>
</html>