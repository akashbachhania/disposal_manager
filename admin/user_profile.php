<?php
//including initial file
include("../init.php");
    $admin = Admin::getInstance();
    $result=$admin->lastdate();
    $profile_pic=$admin->profile_pic();
    $session = $init->getSession();
    $redirect = $init->getRedirect();
    //if(!$session->__get("firstname")){
//	$redirect->redirect("../admin_signin.php");
//    }
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
    
    if(isset($_REQUEST['update_pic'])){
	move_uploaded_file($_FILES['file']['tmp_name'],BASE_PATH."uploads/" .$_SESSION['user_id']. $_FILES["file"]["name"]);
	chmod(BASE_PATH."uploads/" .$_SESSION['user_id']. $_FILES["file"]["name"],0777);
	$res=$admin->update_profile_pic("uploads/" .$_SESSION['user_id']. $_FILES["file"]["name"],$_SESSION['user_id']);
	$redirect->redirect("");
    }
?>
<!DOCTYPE html>
<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Disposal Manager</title>
    <link href="<?php echo BASE_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/css/custom.css" rel="stylesheet">
    <link href="<?php echo BASE_URL;?>/css/bootstrap.css" rel="stylesheet" type="text/css">
    <script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.1/jquery.min.js"></script> 
    <script src="<?php echo BASE_URL;?>/js/bootstrap.min.js"></script>
    <script src="http://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
</head>

<body>
  <?php
include("../include/header.php");
include("../include/header_menu.php");
?>

	<div class="banner bannerwithnoimg">
        <div class="container">
            <div class="bannertxt col-lg-12">
                <span class="page_heading">User Profile</span>
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
		    <a href="<?php echo BASE_URL?>/admin/user_information">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/profile.png" alt="profile">
                            <span class="profile_options">Edit User Information</span>
                        </div>
                    </div>
		    </a>
		    <a href="<?php echo BASE_URL?>/admin/list">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/profile.png" alt="profile">
                            <span class="profile_options">List Current Administrators</span>
                        </div>
                    </div>
		   </a>
                   <a href="<?php echo BASE_URL?>/admin/list">
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/reporting.png" alt="reporting">
                            <span class="profile_options">Create/Delete Administrator</span>
                        </div>
                    </div>
		   </a>
		   <a href="<?php echo BASE_URL;?>/admin/change_password">
                    <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/setting.png" alt="setting">
                            <span class="profile_options">Password Change</span>
                        </div>
                    </div>
		    </a>
		   <a href="#profile_pic" role="button" data-toggle="modal"  data-toggle="modal" values ="" >
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/setting.png" alt="setting">
                            <span class="profile_options">Profile Picture Change</span>
                        </div>
                    </div>
		   </a>
                   <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/newprofile.png" alt="new profile"> 
                            <span class="profile_options">Start a new profile</span>
                        </div>
                    </div>
                   
		   <div class="clearfix"></div>
		  
    </div>
        </div>
        
    </div>
   </div>
  <?php include("../include/footer.php");?>
    </div> <!-- /container -->
   
<div id="profile_pic" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header" headerBGstyle="height: 150px;" > <center>Update Profile Pic</center>
		<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<form action="" method="POST" name="frm" id="frm" enctype="multipart/form-data">
		    <center style="margin-top: 20px;"><input type="file" name="file" id="file"></center>
		    <center style="margin-top: 20px;"><input type="submit" name="update_pic" id="update_pic" value="Update"></center>
		</form>
	    </div>
	</div>
   </div>
</div>

</body>
</html>


  
