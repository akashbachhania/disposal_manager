<?php
//including initial file
include("../init.php");
    //creating object of admin class
    $admin = Admin::getInstance();
    $result=$admin->lastdate();
    //creating object of session class
    $session = $init->getSession();
    //creating object of redirect class
    $redirect = $init->getRedirect();
    if(!$session->__get("username")){
	$redirect->redirect("../admin_signin.php");
    }
    $list=$admin->show_Vendor();
?>
<!DOCTYPE html>
<html lang="en">
    <head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>Disposal Manager</title>
	<link href="../css/bootstrap.min.css" rel="stylesheet">
	<link href="../css/custom.css" rel="stylesheet">
	
    </head>
    <body>
    <?php
  include("../include/header.php");
  include("../include/header_menu.php");?>
	<div class="banner bannerwithnoimg">
	    <div class="container">
		<div class="bannertxt col-lg-12">
		    <span class="page_heading">Vendor</span>
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
                    	<div class="profile_pic">
			    <img src="upload/<?php echo $result['image'];?>" alt="profile pic">
			</div>
                        <span class="name"><?php echo $result['username'];?></span><br/>
                        <span class="last_login">Last login:</span><span class="date"><?php echo $result['date'];?></span>
		    </div>
                </div>
		<img src="" width="150" height="150" alt=""/>
		<div class="options">
                    <div class="profile_options">
			    <a href="#link1" title="Add New Generator" class="link" data-toggle="modal">Add New Vendor</a>
		    </div>
                </div>
	    </div>
	    <!--vendor list shoew -->		    
		    <table class="table table-bordered" id="show">
			<thead>
			    <tr class="last_login">
				<th>Company Name</th>
				<th>Department Name</th>
				<th>First Name</th>
				<th>Last Name</th>
				<th>Email</th>
				<th>Address 1</th>
				<th>Address 2</th>
				<th>City</th>
				<th>State</th>
				<th>Zip Code</th>
				<th>EPA ID#</th>
				<th>Phone Number</th>
				<th>Fax Number</th>
				<th>Edit</th>
				<th>Suspend</th>
				<th></th>
			    </tr>
			</thead>
			<tbody class="delete_row">
			    <?php foreach($list as $row)
			    {
			    ?>
			    <tr>
				<td><?php echo $row['companyname']?></td>
				<td><?php echo $row['department']?></td>
				<td><?php echo $row['firstname']?></td>
				<td><?php echo $row['lastname']?></td>
				<td><?php echo $row['email']?></td>
				<td><?php echo $row['address1']?></td>
				<td><?php echo $row['address2']?></td>
				<td><?php echo $row['city']?></td>
				<td><?php echo $row['state']?></td>
				<td><?php echo $row['zipcode']?></td>
				<td><?php echo $row['epa_id']?></td>
				<td><?php echo $row['contact']?></td>
				<td><?php echo $row['fax']?></td>
				<td><a class = "btn btn-success" values = '<?php echo  $row['id']; ?>' role="button" href="#">Edit</a></td>
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
    <script src="../js/MyVal1.js"></script>
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
			    <td>Email</td>
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
			    <td>EPA ID</td>
			    <td><input name='epa_id' type='text' class="form-control" id=''/></td>
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
			    <td><input name="btnsubmit" type='submit' value='ADD' id='' class='btn btn-success' "/></td>
			    <td><input name="btnsubmit" type='reset' value='reset' id='' class='btn btn-success' "/></td>
			</tr>       
		    </table>
		</form>
	    </div>
	</div>
    </div>
</div>
    
    <!--end of add vendor popup code -->
    
    <!--start suspend vendor popup code -->
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
<!--end of add vendor popup code -->

<!--start Rejoin vendor popup code -->
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
    <!--end of rejoin vendor popup code -->    
    
    
</body>
</html>
<link href="../css/bootstrap.css" rel="stylesheet" type="text/css">
    <script src="../js/bootstrap.min.js"></script>
    <script>
    jQuery(document).ready(function(){
	$("#generators_form").submit(function(e){
	    e.preventDefault();
	    var _this = $(e.target);
	    var formData = $(this).serialize();
		$.ajax({
		type: "POST",
		url: "add_vendor.php",
		data: formData,
		dataType: 'json',
		    success: function(data)
		    {
			if (data.email=="false") {
			    alert("This Email is already exsist !! Plsese try Diffrent Email");
			}
			else{
			    $('#show tr:last').after('<tr><td>'+data.companyname+'</td><td>'+data.department+'</td><td>'+data.firstname+'</td><td>'+data.lastname+'</td><td>'+data.email+'</td><td>'+data.address1+'</td><td>'+data.address2+'</td><td>'+data.city+'</td><td>'+data.state+'</td><td>'+data.zipcode+'</td><td>'+data.epa_id+'</td><td>'+data.contact+'</td><td>'+data.fax+'</td><td><a class="btn btn-success" role="button" href="#">Edit</a></td><td><a href="#link7" id="'+data.id+'" value="'+data.id+'" class="suspend btn btn-success" role="button" data-toggle="modal"  data-toggle="modal" >Running</a></td><a href="#rejoin" role="button" data-toggle="modal" class= "btn btn-success suspend" data-toggle="modal"><a</td></</tr>');
			    $( ".close" ).trigger( "click" );
			$('#generators_form')[0].reset();
			location.reload();
			}
		    }
		});
	    });
        var suspend_id;
	$(".suspend,.rejoin").click(function(e)
	{
	    suspend_id=this.id;
	});
	//permanent remove account functionality
	$(".permanent_remove").click(function(e)
	{
	var info = 'id=' + suspend_id;
	$.ajax({
	    type: "POST",
	    url: "remove_account.php",
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
			//location.reload();
		    }
		}
	    });
	});
	//account parmanently remove functionality
	$("#remove").click(function(e)
	{
	var info = 'id=' + suspend_id;
	$.ajax({
	    type: "POST",
	    url: "remove_account.php",
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
    var rejoin_id;
    $(".rejoin").click(function(e)
    {
	rejoin_id=this.id;
	
	var info = 'id=' + rejoin_id;
	$.ajax({
	    type: "POST",
	    url: "rejoin.php",
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
</script>    
<!-- start image change functionality-->
<a href="#link2" title="title1" class="link btn btn-success" data-toggle="modal">
<img src="" width="150" height="150" alt=""/>Change Image</a>
<div id="link2" class="modal fade">
    <div class="modal-dialog">
	<div class="modal-content">
	    <div class="modal-header headerBG">
		<button type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</button>
		<h4 class="modal-title text-left">
		<form action="upload.php" method="POST" id="uploadform">
		    pls select the Image:<input type="file" name="file"/>
		    <input name="submit" type="submit" value="upload" class="link btn btn-success" style="margin-left: 50px; margin-top: 50px;"/>
		     Message :
   <div id="onsuccessmsg" style="border:5px solid #CCC;padding:15px;"></div>
		    </form>
		
	    </div>
	</div>
    </div>
</div>
<!-- end image change functionality-->

<!-- start image change functionality using ajax-->
    <script src="//code.jquery.com/jquery-latest.min.js"></script>
    <script src="http://malsup.github.io/jquery.form.js"></script>
   <script>
    
    $(document).ready(function(){
	
	function onsuccess(response,status){
	$("#onsuccessmsg").html("Status :<b>"+status+'</b><br><br>Response Data :<div id="msg" style="border:5px solid #CCC;padding:15px;">'+response+'</div>');
	}
	$("#uploadform").on('submit',function(){
	    var options={
	    url     : $(this).attr("action"),
	    success : onsuccess
	    };
	    
	    $(this).ajaxSubmit(options);
	    return false;
	});
    });
</script>

<!-- end image change functionality using ajax-->