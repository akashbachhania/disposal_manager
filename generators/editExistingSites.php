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
                            <span class="page_heading">SITES</span>
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
                        <div class="options">
                                    <div class="profile_options">
            
                                    </div>
                        </div>
                     </div>
                            <!-- list show -->
                            <div align="center">
       <form action="" method='post' align="center">
        <h2 class="form-signin-heading"><span class="name">EDIT EXISTING SITE</span></h2>
         <select id="select">
            <option>Select SiteName</option>
                        <?php
                   foreach($row as $site_name) // Database loop that is pulling the data from the database.
                                { ?>
						<option id="<?php echo $site_name['id']; ?>" class="select_id" value="<?php echo $site_name['id']; ?>"><?php echo $site_name['sitename']; ?></option>
                            <?php }?>
        </select>
        
        			<div class="clearfix"></div>
                    <div class="clearfix">
                    <a href="<?php echo BASE_URL?>/generators/addNewsites">
                    <label>ADD NEW SITE</label>
                    </a>
                    </div>
                    <!--- /update site information---->
                     <div class="row">
                            <div class="col-lg-12">
                                    <div class="">
                                        
                                        
                                        </div>
                                     </div>
                        <div class="options">
                                    <div class="profile_options">
                                       <table cellspacing="15" cellpadding="15" id='show'   align="center" >
                					
                                       </table>
                                       <input id="update" type="submit" name="update" value="update"/>
									</div>
                        </div>
                     </div>
       </form> 
            <?php include("../include/footer.php");?>
   </body>
</html>
<script>
$(document).ready(function(){
			var suspend_id;
			$("#update").hide();
			$(".select_id").click(function(e)
			{
			select_id=this.id;
			var info = 'site_id=' + select_id;
                         $.ajax({
						type: "POST",
						url: "ajaxcalling.php",
						data: info,
						dataType: 'json',
						 success: function(data)
			{
		    if (data)
		    {
				$('#show').html('<tr><input name="site_id" type="hidden" value="'+data.id+'"/><td>SITE NAME </td><td><input name="sitename" type="text" value="'+data.sitename+'" /></td></tr><tr><td>ADDRESS </td><td><input name="address" type="text" value="'+data.address+'" /></td></tr><tr><td>CONTACT </td><td><input name="contact" type="text" value="'+data.contact+'" /></td></tr>');
				$("#update").show();
			}
		}
	    });
										
									
    						});
    });                    
                        </script>
   
   