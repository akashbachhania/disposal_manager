<?php
//including initial file
include("../init.php");
    //creating object of Admin class
    $admin = Admin::getInstance();
    $result=$admin->lastdate();
    $profile_pic=$admin->profile_pic();
    //show administrator list 
    $list=$admin->show_admin();
    $session = $init->getSession();
    $redirect = $init->getRedirect();
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
// includding header portion
include("../include/header.php");
include("../include/header_menu.php");?>
    <div class="banner bannerwithnoimg">
	<div class="container">
	    <div class="bannertxt col-lg-12">
		<span class="page_heading">Administrator List</span>
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
                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
		    </div>
                </div>
		<div class="options">
                    <div class="profile_options">
			    <a href="#link1" title="Add New Generator" class="link" data-toggle="modal">Add New Administrator</a>
		    </div>
                </div>
	    </div>
	    <!--genrator list shoew -->		    
	    <table class="table table-bordered" id="show">
		<thead>
		    <tr class="last_login">
			<th>First Name</th>
		        <th>Last Name</th>
			<th>Email Address</th>
			<th>Last Login</th>
			<th>Delete Administrator</th>
		    </tr>
		</thead>
		<tbody class="delete_row">
		    <?php foreach($list as $row)
		    {
		    ?>
		    <tr>
			<td><?php echo $row['firstname']?></td>
                        <td><?php echo $row['lastname']?></td>
                        <td><?php echo $row['email']?></td>
                        <td><?php echo $row['date']?></td>
			<td><a href="#" role="button" data-toggle="modal" class= "btn btn-danger remove" data-toggle="modal" values ='<?php echo  $row['id']; ?>' id="<?php echo  $row['id']; ?>" >Delete</a></td>
			</tr>
		    <?php
		    }
		    ?>
		</tbody>
	    </table>
	</div>
    </div>
    <!-- /container -->
    <div>

<!-- popup is start-->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="../js/bootstrap.min.js"></script>
<!--start add genrator popup code -->
<div id="link1" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header headerBG">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-left">
		<form method='post' id='generators_form' name='generators_form' >
		    <table cellspacing="15" cellpadding="15" id='tableid' align="center" width="80%">
			<tr>
			    <td>Company Name</td>
			    <td><input name='companyname' type='text' class="form-control" required autofocus id='companyname'/></td>
			</tr>       
			<tr>
			    <td>Department</td>
			    <td><input name='department' type='text' class="form-control" required autofocus/></td>
			</tr>       
			<tr>
			    <td>First Name</td>
			    <td><input name='firstname' type='text' class="form-control" required autofocus/></td>
			</tr>       
			<tr>
			    <td>Last Name</td>
			    <td><input name='lastname' type='text' class="form-control" required autofocus /></td>
			</tr>       
			<tr>
			    <td>Email Id</td>
			    <td><input name='email' type='email' class="form-control" /></td>
			</tr>
			<tr>
			    <td>Password</td>
			    <td><input name='password' type='password' class="form-control" required autofocus id="password"/></td>
			</tr>       
			<tr>
			    <td>Conform Password</td>
			    <td><input name='cpassword' type='password' class="form-control" required autofocus /></td>
			</tr>       
			
			<tr>
			    <td>Address 1</td>
			    <td><input name='address1' type='text' class="form-control" required autofocus /></td>
			</tr>       
			<tr>
			    <td>Address 2</td>
			    <td><input name='address2' type='text' class="form-control" required autofocus /></td>
			</tr>       
			<tr>
			    <td>City</td>
			    <td><input name='city' type='text' class="form-control" required autofocus/></td>
			</tr>       
			<tr>
			    <td>State</td>
			    <td><input name='state' type='text' class="form-control" required autofocus/></td>
			</tr>       
			<tr>
			    <td>Zip Code</td>
			    <td><input name='zipcode' type='text' class="form-control" required autofocus/></td>
			</tr>       
			<tr>
			    <td>EPA ID#</td>
			    <td><input name='epa_id' type='text' class="form-control" required autofocus id="epa"/></td>
			</tr>
			<tr>
			    <td>Phone Number</td>
			    <td><input name='contact' type='text' class="form-control" required autofocus /></td>
			</tr>
			
			<tr>
			    <td>Fax Number</td>
			    <td><input name='fax' type='text' class="form-control" required autofocus/></td>
			</tr>
			
			<tr>
			    <td><input name="btnsubmit" type='submit' value='ADD' id='' class='btn btn-success' style="margin-left: 150px; margin-top:10px;"/></td>
			    <td><input name="btnsubmit" type='reset' value='reset' id='' class='btn btn-success' style="margin-left: 10px; margin-top:10px; "/></td>
			</tr>       
		    </table>
		</form>
	    </div>
	</div>
    </div>
</div>
    
    <!--end of add genrator popup code -->
    
<?php include("../include/footer.php");?>

</body>
</html>

<script>
jQuery(document).ready(function()
    {
    $("#generators_form").submit(function(e){
	e.preventDefault();
	var _this = $(e.target);
	var formData = $(this).serialize();
	    $.ajax({
	    type: "POST",
	    url: "add_administrator.php",
	    data: formData,
	    dataType: 'json',
		success: function(data)
		{
		    if (data.email=="false") {
			alert("The email address you have entered already exists.  Enter a different email address or try resetting your password.");
		    }
		    else{
			$('#show tr:last').after('<tr><td>'+data.firstname+'</td><td>'+data.lastname+'</td><td>'+data.email+'</td><td>'+data.date+'</td></tr>');
			$( ".close" ).trigger( "click" );
			$('#generators_form')[0].reset();
			location.reload();
		    }
		}
	    });
	});
    //account parmanently remove functionality
	var remove_id;
	$(".remove").click(function(e)
	{
	    remove_id=this.id;
	    var info = 'administrator_remove_id=' + remove_id;
	    $.ajax({
		type: "POST",
		url: "ajaxcalling.php",
		data: info,
		success: function(data)
		    {
			$("#"+remove_id+"").parent().parent().remove();
		    }
	    });
	});
});
</script>
