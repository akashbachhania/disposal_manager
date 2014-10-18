<?php
//including initial file
include("../init.php");
    $generators = Generators::getInstance();
    $result=$generators->lastdate();
    $profile_pic=$generators->profile_pic();
    $session = $init->getSession();
    $redirect = $init->getRedirect();
    if(!$session->__get("roll")==2)
    {
      $redirect->redirect("../admin_signin.php");
    }
      elseif($session->__get("roll")==1)
    {
      $redirect->redirect("../admin");
    }
    elseif($session->__get("roll")==3)
    {
      $redirect->redirect("../vendors");
    }
    if(isset($_REQUEST['update_pic'])){
	//echo $pic=$_FILES['file']['name'];
	//die("a");
	move_uploaded_file($_FILES['file']['tmp_name'],BASE_PATH."uploads/" .$_SESSION['user_id']. $_FILES["file"]["name"]);
	chmod(BASE_PATH."uploads/" .$_SESSION['user_id']. $_FILES["file"]["name"],0777);
	$result=$generators->update_profile_pic("uploads/".$_SESSION['user_id']. $_FILES['file']['name'],$_SESSION['user_id']);
	$redirect->redirect("");
    }
include("../include/header.php");
include("../include/header_menu.php");
?>

	<div class="banner bannerwithnoimg">
        <div class="container">
            <div class="bannertxt col-lg-12">
                <span class="page_heading">SITES</span>
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
                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span></div>
                    </div>
                    <div class="clearfix"></div>
                   <div class="clearfix"></div>
                    <a href="<?php echo BASE_URL?>/generators/addNewsites">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/profile.png" alt="profile">
                            <span class="profile_options">Add New Site</span>
                        </div>
                    </div>
                    </a>
		    <a href="<?php echo BASE_URL?>/generators/editExistingSites">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/profile.png" alt="profile">
                    <span class="profile_options">Edit Existing Site</span>
                        </div>
                    </div>
		   </a>
                   
		       <div class="clearfix"></div>
		  
    </div>
        </div>
        
    </div>
   </div>
  <?php include("../include/footer.php");?>
    </div> <!-- /container -->
</body>
</html>
