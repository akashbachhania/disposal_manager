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

    //calling manifests upload function
		if(isset($_POST['submit']))
		{			
					//create array to pass value in a function 
					$array=array("site_id"=>$_POST['site_id'],"sitename"=>$_POST['sitename'],"manifestnumber"=>$_POST['manifestnumber'],"upload_date"=>date("m/d/y"));
					
					//MOve_uploaded_file
					//echo BASE_PATH."uploads/generator/".$_POST['site_id'].$_FILES['file']['name'];die;
					move_uploaded_file($_FILES['file']['tmp_name'],BASE_PATH."uploads/generators/".$_POST['site_id'].$_FILES['file']['name']);
					//change mode for permission
					chmod(BASE_PATH."uploads/generators/".$_POST['site_id'].$_FILES["file"]["name"],0777);
	//Calling function 
	$generator->manifests_upload("uploads/generators/".$_POST['site_id'].$_FILES["file"]["name"],$array);
	
						}	
// includding header portion
include("../include/header.php");
include("../include/header_menu.php");?>
<html>
 <body>
<div class="banner bannerwithnoimg">
			<div class="container">
                        <div class="bannertxt col-lg-12">
                            <span class="page_heading">Manifests Upload Page</span>
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
       <form action="" method='post' align="center" enctype="multipart/form-data">
        <h2 class="form-signin-heading"><span class="name">EDIT EXISTING SITE</span></h2>
         <select id="select">
            <option>SELECT SITE NAME</option>
                        <?php
                   foreach($row as $site_name) // Database loop that is pulling the data from the database.
                                { ?>
						<option id="<?php echo $site_name['id']; ?>" class="select_id" value="<?php echo $site_name['id']; ?>"><?php echo $site_name['sitename']; ?></option>
                            <?php }?>
        </select>
        
        			<div class="clearfix"></div>
       		 <div class="clearfix">
             <table cellspacing="15" cellpadding="15" id='show'   align="center" >
                					
                                       </table>
 </br><input type="text" name="manifestnumber" placeholder="MANIFEST NUMBER" maxlength="12"/>
        
           </br>
          <center style="margin-top: 20px;"><input type="file" name="file" id="file"></center>
		    <center style="margin-top: 20px;"><input type="submit" name="submit" id="submit" value="submit">
            </center>   
            </div>
                    <!--- /update site information---->
                     
       </form> 
            <?php include("../include/footer.php");?>
   </body>
</html>
<script>
$(document).ready(function(){
			var suspend_id;
			
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
				$('#show').html('<tr><td><input name="site_id" type="hidden" value="'+data.id+'"/></td></tr><tr><td><input name="sitename" type="hidden" value="'+data.sitename+'" /></td></tr><tr><td><input name="address" type="hidden" value="'+data.address+'" /></td></tr><tr><td><input name="contact" type="hidden" value="'+data.contact+'" /></td></tr>');
				
			}
		}
	    });
										
									
    						});
    });                    
                        </script>
