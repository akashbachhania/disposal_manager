
<?php
include_once(dirname(__DIR__)."/init.php");
//Initializing session and redirect method
    $session = $init->getSession();
    $redirect = $init->getRedirect();
?>
<!DOCTYPE html>

<html lang="en"><head><meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Disposal Manager</title>
    <!-- css for bootstrap-->
    <link href="<?php echo BASE_URL;?>/css/bootstrap.min.css" rel="stylesheet">
    
    <!--custom css-->
    <link href="<?php echo BASE_URL;?>/css/custom.css" rel="stylesheet">
    
    <!-- Style for validation error -->
    <style>
    label.error
    {
	color:#900;	
    }
    </style>
    
    <script src="<?php echo BASE_URL;?>/js/jquery-1.10.2.js"></script>
    <script src="<?php echo BASE_URL;?>/js/jquery.validate.js"></script>
    <script src="<?php echo BASE_URL;?>/js/MyVal.js"></script>
    <script src="<?php echo BASE_URL;?>/js/MyVal1.js"></script>
    
    <script>
	$(document).ready(function(){
	$("#elite").click(function(){
	  $("#price").show();
	});
	
	$("#free").click(function(){
	  $("#price").hide();
	});
      });
    </script>    
</head>
<body>
    
<div class="header_top">
    <div class="container ">
      	<ul class="col-lg-4 pull-right social">
	    <?php
	    //check if user logged in or not
		if($session->__get("firstname"))
		{?>
		<li><a class="login" href="<?php echo BASE_URL;?>/logout.php">Logout</a></li>
		<?php }
		else{ ?>
		    <li><a class="login" href="signin">Login</a></li>    
		<?php } ?>
	
	<!--Social Links-->
	    <li><a id="fb" href="#">Facebook</a></li>
            <li><a id="twi" href="#">Twitter</a></li>
            <li><a id="link" href="#">Linkdin</a></li>
         </ul>
    </div>
</div>