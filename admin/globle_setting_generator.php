<?php
//including initial file
require_once("../init.php");
    //creating object of Admin class
    $admin = Admin::getInstance();
    //creating object of generator class
    $generator = Generators::getInstance();
    $result=$admin->lastdate();
    $profile_pic=$admin->profile_pic();
    $session = $init->getSession();
    $redirect = $init->getRedirect();
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
    //show globle setting 
    $list=$generator->show_globle_setting_record($_REQUEST['id']);
    if(isset($_POST['btnsubmit']))
	{
	$array = array(
	    "account_type" => $_POST['account_type'],
	    "price" => $_POST['price'],
	    "profile_allow" => $_POST['profile_allow'],
	    "no_site" => $_POST['no_site'],
	    "no_vendor" => $_POST['no_vendor'],
	    );
	    $generator->update_globle_setting_generator($array,$_REQUEST['id']);
	}
// includding header portion
  include("../include/header.php");
  include("../include/header_menu.php");?>


	<div class="banner bannerwithnoimg">
	    <div class="container">
		<div class="bannertxt col-lg-12">
		    <span class="page_heading">Global Settings</span>
		    <span class="page_txt">Aliqat volutpasac tupis. Integer rutrum ante eu lacuestibulum libero nisl porta vel sceleris que eget</span>
		</div>
	    </div>
  	</div>
    <div class="main_div">
        <div class="container">
            <div class="row">
        	<div class="col-lg-12">
            	    <div class="">
                    	<div class="profile_pic"><img src="<?php echo BASE_URL;?>/<?php echo $profile_pic['image_src'];?>" alt="profile pic" width="87" height="87"></div>
                        <span class="name"><?php echo $result['firstname'];?></span><br/>
                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
		    </div>
                </div>
		<div class="options">
                    <div class="profile_options">
		    </div>
                </div>
            </div>
            <!-- list shoew -->
	    <form method='post' >
            <table cellspacing="15" cellpadding="15" id='tableid1' align="center"  class="table table-bordered">
		<tr>
		    <td>Account Type</td>
		    <td>
			Free :<input name='account_type' type='radio' value='free' id="free" checked <?php echo ($list['account_type']=='free')?"checked":"" ;?> required autofocus/>
			Elite :<input name='account_type' type='radio' value='elite' id="elite" <?php echo ($list['account_type']=='elite')?"checked":"" ;?> required autofocus/>
		    </td>
		</tr>
		<tr style="display: none;" id="price">
		    <td>price</td>
		    <td><input name='price' type='text' value='<?php echo $list['price']?>'/></td>
		</tr>
		<tr>
		    <td>profile allow</td>
		    <td><input name='profile_allow' type='text' value='<?php echo $list['profile_allow']?>' required autofocus/></td>
                </tr>
		<tr>
		    <td>Sites allowed per Generator</td>
		    <td><input name='no_site' type='text' value='<?php echo $list['no_site']?>' required autofocus/></td>
                </tr>
		<tr>
		    <td>Vendors allowed per Generator</td>
		    <td><input name='no_vendor' type='text' value='<?php echo $list['no_vendor']?>' /></td>
		</tr>
		<tr>
		    <td><input name="btnsubmit" type='submit' value='Update' class='btn btn-success' style="margin-left: 150px; margin-top:10px;"/></td>
		</tr>
            </table>
	    </form> 
	</div>
	<!-- /container -->
    </div>
  <?php include("../include/footer.php");?>
</body>
</html>
