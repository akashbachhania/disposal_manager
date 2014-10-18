<?php
//including initial file
require_once("../init.php");
    //creating object of Admin class
    $admin = Admin::getInstance();
    $result=$admin->lastdate();
    //creating object of generator class
    $generator = Generators::getInstance();
    //show generator list 
    $list=$generator->show_genrator();
    $session = $init->getSession();
    $redirect = $init->getRedirect();
    if(!$session->__get("user_id")){
	$redirect->redirect("../admin_signin.php");
    }
// includding header portion
  include("../include/header.php");
  include("../include/header_menu.php");?>
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
                    	<div class="profile_pic"><img src="../images/profile_pic.png" alt="profile pic"></div>
                        <span class="name"><?php echo $result['firstname'];?></span><br/>
                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
		    </div>
                </div>
		<img src="" width="150" height="150" alt=""/>
		<div class="options">
                    <div class="profile_options">
			    <a href="#link1" title="Add New Generator" class="link" data-toggle="modal">Add New Generator</a>
		    </div>
                </div>
	    </div>
	    <!--genrator list shoew -->		    
	    <table class="table table-bordered" id="show">
		<thead>
		    <tr class="last_login">
			<th>Account numbers</th>
		        <th>Edit</th>
			<th>Suspend</th>
			
		    </tr>
		</thead>
		<tbody class="delete_row">
		    <?php foreach($list as $row)
		    {
		    ?>
		    <tr>
			<td><a href="<?php echo BASE_URL;?>/admin/info/<?php echo $row['account_no'];?>"><?php echo $row['account_no']?></a></td>
			<td><a class = "btn btn-success editrecord" data-toggle="modal" values = '<?php echo  $row['id']; ?>' id="<?php echo  $row['id']; ?>" role="button" href="#editgenerator">Edit</a></td>
			<?php
				if($row['account']==0)
				    {?>
					<td><a href="#rejoin_popup" role="button" data-toggle="modal" class= "btn btn-danger rejoin" data-toggle="modal" values ='<?php echo  $row['id']; ?>' id="<?php echo  $row['id']; ?>" >Rejoin</a></td>
				<?php
				    }
				else{
				?>
				    <td><a href="#link7" role="button" data-toggle="modal" class= "btn btn-success suspend" data-toggle="modal" values = '<?php echo  $row['id']; ?>' id="<?php echo  $row['id']; ?>">Running</a></td>
				<?php
				}
				?>
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

  <?php include("../include/footer.php");?>
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
			    <td><input name='companyname' type='text' class="form-control" id=''/></td>
			</tr>       
			<tr>
			    <td>Department</td>
			    <td><input name='department' type='text' class="form-control" id=''/></td>
			</tr>       
			<tr>
			    <td>First Name</td>
			    <td><input name='firstname' type='text' class="form-control" id=''/></td>
			</tr>       
			<tr>
			    <td>Last Name</td>
			    <td><input name='lastname' type='text' class="form-control" /></td>
			</tr>       
			<tr>
			    <td>Email Id</td>
			    <td><input name='email' type='text' class="form-control" /></td>
			</tr>
			<tr>
			    <td>Password</td>
			    <td><input name='password' type='password' class="form-control" id="password"/></td>
			</tr>       
			<tr>
			    <td>Conform Password</td>
			    <td><input name='cpassword' type='password' class="form-control" /></td>
			</tr>       
			
			<tr>
			    <td>Address 1</td>
			    <td><input name='address1' type='text' class="form-control" /></td>
			</tr>       
			<tr>
			    <td>Address 2</td>
			    <td><input name='address2' type='text' class="form-control" /></td>
			</tr>       
			<tr>
			    <td>City</td>
			    <td><input name='city' type='text' class="form-control"/></td>
			</tr>       
			<tr>
			    <td>State</td>
			    <td><input name='state' type='text' class="form-control"/></td>
			</tr>       
			<tr>
			    <td>Zip Code</td>
			    <td><input name='zipcode' type='text' class="form-control" /></td>
			</tr>       
			<tr>
			    <td>EPA ID#</td>
			    <td><input name='epa_id' type='text' class="form-control" id="epa"/></td>
			</tr>
			<tr>
			    <td>Phone Number</td>
			    <td><input name='contact' type='text' class="form-control" /></td>
			</tr>
			
			<tr>
			    <td>Fax Number</td>
			    <td><input name='fax' type='text' class="form-control" /></td>
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
    
    <!--start suspend genrator popup code -->
<div id="link7" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header headerBGstyle="height: 150px;" > <center>Suspend or permanent delete</center>
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-left">
		<button style="margin-left: 50px; margin-top:60px;" class="btn-success" id="Suspend">Suspend only</button >
		<button style="margin-left: 50px;" class="btn-danger" id="remove">permanent Suspend</button></h4>
	    </div>
	</div>
   </div>
</div>
<!--end of add genrator popup code -->
<!--start Rejoin genrator popup code -->
<div id="rejoin_popup" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header" headerBGstyle="height: 150px;" > <center>Suspended Account</center>
		<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h4 class="modal-title text-left">
			<form method='post' id='generators_form' name='generators_form'>
			    <table cellspacing="15" cellpadding="15" id='rejoin'   align="center" >
				
			    </table>
			</form>
		<button style="margin-left: 50px; margin-top:60px;" class="btn-success" id="Suspend">Re-Join Account</button >
		<button style="margin-left: 50px;" class="btn-danger permanent_remove" >permanent Suspend</button>
	    </div>
	</div>
   </div>
</div>
    <!--end of rejoin genrator popup code -->    
    
</body>
</html>

<!-- popup is start-->
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="../js/bootstrap.min.js"></script>
<!--end of popup-->
<script>
jQuery(document).ready(function()
    {
    $("#generators_form").submit(function(e){
	e.preventDefault();
	var _this = $(e.target);
	var formData = $(this).serialize();
	    $.ajax({
	    type: "POST",
	    url: "ajaxcalling.php",
	    data: formData,
	    dataType: 'json',
		success: function(data)
		{
		    if (data.email=="false") {
			alert("This Email is already exsist !! Plsese try Diffrent Email");
		    }
		    else{
			$('#show tr:last').after('<tr><td>'+data.account_no+'</td><td><a class="btn btn-success" role="button" href="#">Edit</a></td><td><a href="#link7" id="'+data.id+'" value="'+data.id+'" class="suspend btn btn-success" role="button" data-toggle="modal"  data-toggle="modal" >Running</a></td><a href="#rejoin" role="button" data-toggle="modal" class= "btn btn-success suspend" data-toggle="modal"><a</td></</tr>');
			$( ".close" ).trigger( "click" );
			$('#generators_form')[0].reset();
			location.reload();
		    }
		}
	    });
	});
	var suspend_id;
	$(".suspend,.rejoin,.editrecord").click(function(e)
	{
	    suspend_id=this.id;
	    //alert(suspend_id);
	    //alert(suspend_id);
	});
	
	//permanent remove account functionality
	$(".permanent_remove").click(function(e)
	{
	var info = 'remove_id=' + suspend_id;
	$.ajax({
	    type: "POST",
	    url: "ajaxcalling.php",
	    data: info,
	    success: function(data)
		{
		    if (data==1)
		    {
			$( ".close" ).trigger( "click" );
			//location.reload();

			$("#"+suspend_id+"").parent().parent().remove();							
		    }
		}
	    });
	});
	//account suspend functionality
	
	$("#Suspend").click(function(e)
	{
	var info = 'id=' + suspend_id;
	$.ajax({
	    type: "POST",
	    url: "suspend.php",
	    data: info,
	    success: function(data)
		{
		    if (data==1)
		    {
			$( ".close" ).trigger( "click" );
			$("#"+suspend_id+"").addClass( "btn-danger" );
			$("#"+suspend_id+"").text( "Rejoin" );
		    }
		}
	    });
	});
    //account parmanently remove functionality
	$("#remove").click(function(e)
	{
	var info = 'remove_id=' + suspend_id;
	$.ajax({
	    type: "POST",
	    url: "ajaxcalling.php",
	    data: info,
	    success: function(data)
		{
		    if (data==1)
		    {
			$( ".close" ).trigger( "click" );
			//location.reload();
			$("#"+suspend_id+"").parent().parent().remove();							
		    }
		}
	    });
	});
    });

//rejoin record display in popup
    var rejoin_id;
    $(".rejoin").click(function(e)
    {
	
	rejoin_id=this.id;
	var info = 'rejoin_id=' + rejoin_id;
	$.ajax({
	    type: "POST",
	    url: "ajaxcalling.php",
	    data: info,
	    dataType: 'json',
	    success: function(data)
		{
		    if (data)
		    {
			$('#rejoin').html('<tr><td>Suspend By</td><td>'+data.suspend_by+'</td></tr><tr><td>First Name</td><td>'+data.firstname+'</td></tr><tr><td>Last Name</td><td>'+data.lastname+'</td></tr><tr><td>Email Id</td><td>'+data.email+'</td></tr><tr><td>Suspend Date</td><td>'+data.suspend_date+'</td></tr>');
										
		    }
		}
	    });
	 });
//edit record display in popup
    var edit_id;
    $(".editrecord").click(function(e)
    {
	
	edit_id=this.id;
	var info = 'edit_id=' + edit_id;
	$.ajax({
	    type: "POST",
	    url: "ajaxcalling.php",
	    data: info,
	    dataType: 'json',
	    success: function(data)
		{
		    if (data)
		    {
			$('#show_record').html('<tr><td>Company Name</td><td><input name="companyname" type="text" value="'+data.companyname+'"/>  </td></tr><tr><td>Department</td><td>'+data.department+'</td></tr><tr><td>First Name</td><td>'+data.firstname+'</td></tr><tr><td>Last Name</td><td>'+data.lastname+'</td></tr><tr><td>Email Id</td><td>'+data.email+'</td></tr><tr><td>Suspend Date</td><td>'+data.suspend_date+'</td></tr>');
		    }
		}
	    });
	 });
</script>
<!--start Edit genrator Popup-->
<div id="editgenerator" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header" headerBGstyle="height: 150px;" > <center>Edit Generator Information</center>
		<button type="reset" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		    <h4 class="modal-title text-left">
			<form method='post' id='generators_form' name='generators_form'>
			    <table cellspacing="15" cellpadding="15" id='show_record' align="center" width="80%">
			    </table>
			</form>
		<button style="margin-left: 50px; margin-top:60px;" class="btn-success" id="update_record">Edit</button >
		<button style="margin-left: 50px;" class="btn-danger permanent_remove" >permanent Suspend</button>
	    </div>
	</div>
   </div>
</div>
<!--End Edit genrator Popup-->

