<?php
//including initial file
require_once("../init.php");
//creating object of generator class
$generator = Generators::getInstance();
$result=$generator->lastdate();
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

$row=$generator->select_sites($session->__get("user_id"));
    //update generator function call with two arg
if(isset($_POST['update']))
{
$array = array("sitename" =>$_POST['sitename'],"site_id" =>$_POST['site_id'],"address"=>$_POST['address'],"contact"=>$_POST['contact']);
$generator->edit_existing_sites($array);
}
// includding header portion
include("../include/header.php");
include("../include/header_menu.php");?>
<html>
 <body>
<div class="banner bannerwithnoimg">
			<div class="container">
                        <div class="bannertxt col-lg-12">
                            <span class="page_heading">Manifests Page</span>
                            <span class="page_txt">Aliqat volutpasac tupis. Integer rutrum ante eu lacuestibulum libero nisl porta vel sceleris que eget</span>
                        </div>
                        </div>
                    </div>
                    <div class="main_div">
                        <div class="container">
                            <div class="row">
                            <div class="col-lg-12">
                                    <div class="">
                                        <div class="profile_pic"><img src="<?php echo BASE_URL?>/images/profile_pic.png" alt="profile pic"></div>
                                        <span class="name"><?php echo $result['firstname'];?></span><br/>
                                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
                                        </div>
                                     </div>
                <div class="clearfix"></div>
                <div class="clearfix">
		 <a href="<?php echo BASE_URL?>/generators/manifests_upload_page">
                <!--<a href="user_profile.php">-->
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
			<img src="../images/profile.png" alt="profile">
			<span class="profile_options">Manifest Upload Page</span>
		    </div>
		</div>
		</a>
		<a href="<?php echo BASE_URL?>/generators/manifests_search_page">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
                        <img src="../images/profile.png" alt="sites">
                        <span class="profile_options">Manifest Search Page</span>
                    </div>
                </div>
		</a>
       </div>
        <div class="clearfix">
        <div class="clearfix"></div>
            <?php include("../include/footer.php");?>
   </body>
</html>

   