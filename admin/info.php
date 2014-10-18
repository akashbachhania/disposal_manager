<?php
//including initial file
require_once("../init.php");
    //creating object of Admin class
    $admin = Admin::getInstance();
    $result=$admin->lastdate();
    //creating object of generator class
    $generator = Generators::getInstance();
    //creating object of generator class
    $vendor = Vendor::getInstance();
    
    
    $profile_pic=$admin->profile_pic();
    if(isset($_REQUEST['account_no']) and ($_REQUEST['roll']==2))
    {
        $list=$generator->show_genrator_where("account_no",$_REQUEST['account_no']);    
    }
    else
    {
        $list=$vendor->show_vendor_where("account_no",$_REQUEST['account_no']);
    }
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
    //if(!$session->__get("user_id")){
    //$redirect->redirect("../admin_signin.php");
    //}
// includding header portion
  include("../include/header.php");
  include("../include/header_menu.php");?>
	<div class="banner bannerwithnoimg">
	    <div class="container">
		<div class="bannertxt col-lg-12">
		    <span class="page_heading">Account Information</span>
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
            <table cellspacing="15" cellpadding="15" id='tableid1' align="center" width="50%" class="table table-bordered">
                <?php
                    foreach ($list as $row) {
                ?>
                <tr>
                    <td>Account Number</td>
                    <td><?php echo $row['account_no']?></td>
                </tr>
                <tr>
                    <td>Company Name</td>
                    <td><?php echo $row['companyname']?></td>
                </tr>
                <tr>
                    <td>Department</td>
                    <td><?php echo $row['department']?></td>
                </tr>       
                <tr>
                    <td>First Name</td>
                    <td><?php echo $row['firstname']?></td>
                </tr>       
                <tr>
                    <td>Last Name</td>
                    <td><?php echo $row['lastname']?></td>
                </tr>       
                <tr>
                    <td>Email</td>
                    <td><?php echo $row['email']?></td>
                </tr>
                <tr>
                    <td>Address 1</td>
                    <td><?php echo $row['address1']?></td>
                </tr>       
                <tr>
                    <td>Address 2</td>
                    <td><?php echo $row['address2']?></td>
                </tr>       
                <tr>
                    <td>City</td>
                    <td><?php echo $row['city']?></td>
                </tr>       
                <tr>
                    <td>State</td>
                    <td><?php echo $row['state']?></td>
                </tr>       
                <tr>
                    <td>Zip Code</td>
                    <td><?php echo $row['zipcode']?></td>
                </tr>       
                <tr>
                    <td>EPA ID</td>
                    <td><?php echo $row['epa_id']?></td>
                </tr>
                <tr>
                    <td>Phone Number</td>
                    <td><?php echo $row['contact']?></td>
                </tr>
                
                <tr>
                    <td>Fax Number</td>
                    <td><?php echo $row['fax']?></td>
                </tr>
                <?php
                    }
                ?>
            </table>
        </div>    <!-- /container -->
    </div>

    
  <?php include("../include/footer.php");?>

