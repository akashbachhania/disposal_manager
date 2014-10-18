<?php
//including initial file
include("../init.php");
    $session = $init->getSession();
    $redirect = $init->getRedirect();
    $generators = Generators::getInstance();
    $result=$generators->lastdate();
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
    $profile_pic=$generators->profile_pic();
     //includding header portion
    include("../include/header.php");
    include("../include/header_menu.php");
?>
	<div class="banner bannerwithnoimg">
	    <div class="container">
		<div class="bannertxt col-lg-12">
		    <span class="page_heading">Generators Page</span>
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
                        <span class="last_login">Last login:</span>
                        <span class="date"><?php echo $result['date'];?></span>
		    </div>
                </div>
                <div class="clearfix"></div>
		 <a href="<?php echo BASE_URL?>/generators/userprofile">
                <!--<a href="user_profile.php">-->
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
			<img src="../images/profile.png" alt="profile">
			<span class="profile_options">User Profile</span>
		    </div>
		</div>
		</a>
		<a href="<?php echo BASE_URL?>/generators/sites">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
                        <img src="../images/profile.png" alt="sites">
                        <span class="profile_options">Sites</span>
                    </div>
                </div>
		</a>
		 <a href="<?php echo BASE_URL?>/generators/manifests">
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
			<img src="../images/profile.png" alt="profile">
			<span class="profile_options">Manifests</span>
		    </div>
		</div>
	        </a>
	        <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
		    <div class="options">
			<img src="../images/reporting.png" alt="reporting">
			<span class="profile_options">Vendors</span>
		    </div>
		</div>
		  
                
		<div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox ">
                    <div class="options">
                        <img src="../images/newprofile.png" alt="new profile"> 
                        <span class="profile_options">profiles</span>
                    </div>
		</div>
        
        		 <div class="col-lg-4 col-md-4 col-sm-4 col-xs-4 optionbox">
                    	<div class="options">
                            <img src="../images/help.png" alt="help">
                            <span class="profile_options">Help</span>
                        </div>
                </div>
                
	    </div>
        </div>
        
    </div>
   </div>
  <?php include("../include/footer.php");?>
    </div>
</body>
</html>

