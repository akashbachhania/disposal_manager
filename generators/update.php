<?php
//including initial file
require_once("../init.php");
       $session = $init->getSession();
       $redirect = $init->getRedirect();
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
       //creating object of generator class
       $generator = Generators::getInstance();
       $profile_pic=$generator->profile_pic();
       $result=$generator->lastdate();
       if(isset($_POST['btnsubmit'])){
	      $array = array(
	       "companyname" => $_POST['companyname'],
	       "department" => $_POST['department'],
	       "firstname" => $_POST['firstname'],
	       "lastname" => $_POST['lastname'],
	       "password" => $_POST['password'],
	       "address1" => $_POST['address1'],
	       "address2" => $_POST['address2'],
	       "city" => $_POST['city'],
	       "state" => $_POST['state'],
	       "zipcode" => $_POST['zipcode'],
	       "epa_id" => $_POST['epa_id'],
	       "contact" => $_POST['contact'],
	       "fax" => $_POST['fax'],
	       );
		
	      //update generator function call with two arg
	      $generator->update_user_generator($array,$result['id']);
       }
    
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
	    <form method='post' >
            <table cellspacing="15" cellpadding="15" id='tableid1' align="center"  class="table table-bordered">
		<tr>
                    <td>Account Number</td>
                    <td><input name='' type='text' value='<?php echo $result['account_no']?>' readonly="readonly"/></td>
                </tr>
                <tr>
		    <td>Company Name</td>
		    <td><input name='companyname' type='text' value='<?php echo $result['companyname']?>'/></td>
		</tr>       
		<tr>
		    <td>Department</td>
		    <td><input name='department' type='text' value='<?php echo $result['department']?>'/></td>
		</tr>       
		<tr>
		    <td>First Name</td>
		    <td><input name='firstname' type='text' value='<?php echo $result['firstname']?>'/></td>
		</tr>       
		<tr>
		    <td>Last Name</td>
		    <td><input name='lastname' type='text' value='<?php echo $result['lastname']?>' /></td>
		</tr>       
		     
		<tr>
		    <td>Password</td>
		    <td><input name='password' type='password' value='<?php echo $result['password']?>'/></td>
		</tr>       
		<tr>
		    <td>Address 1</td>
		    <td><input name='address1' type='text' value='<?php echo $result['address1']?>' /></td>
		</tr>       
		<tr>
		    <td>Address 2</td>
		    <td><input name='address2' type='text' value='<?php echo $result['address2']?>'/></td>
		</tr>       
		<tr>
		    <td>City</td>
		    <td><input name='city' type='text' value='<?php echo $result['city']?>'/></td>
		</tr>       
		
		<tr>
		    <td>State</td>
		    <td><input name='state' type='text' value='<?php echo $result['state']?>'/></td>
		</tr>       
		<tr>
		    <td>Zip Code</td>
		    <td><input name='zipcode' type='text' value='<?php echo $result['zipcode']?>' /></td>
		</tr>       
		<tr>
		    <td>EPA ID</td>
		    <td><input name='epa_id' type='text' value='<?php echo $result['epa_id']?>'/></td>
		</tr>
		<tr>
		    <td>Phone Number</td>
		    <td><input name='contact' type='text' value='<?php echo $result['contact']?>' /></td>
		</tr>
		<tr>
		    <td>Fax Number</td>
		    <td><input name='fax' type='text' value='<?php echo $result['fax']?>' /></td>
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
