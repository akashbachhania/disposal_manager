<?php
//echo  $_SERVER['PHP_SELF'];die;
$session = $init->getSession();
$redirect = $init->getRedirect(); ?>

    <div class="header">
      <div class="container ">
      	<div class="row">
        	<div class="col-lg-5 col-md-5 col-sm-5 col-xs-8"></div>
            <div id="drop_div" class="col-lg-12 col-md-12 col-sm-12 col-xs-12">
            <div class="navbar-header">
	      <?php
	      if($session->__get("firstname"))
		{?>
		 <a class="logo" href="<?php echo BASE_URL?>/index.php"><img src="<?php echo BASE_URL?>/images/disposal_logo.png" alt="" /></a>
		<?php }
		else{ ?>
		     <a class="logo" href="<?php echo BASE_URL?>/index.php"><img src="<?php echo BASE_URL?>/images/disposal_logo.png" alt="" /></a>
		<?php } ?>
              <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
              </button>
             </div>
            <div class="navbar-collapse collapse">
              <ul id="menu" class="nav navbar-nav">
                <li class="active"><a href="<?php echo BASE_URL?>/home">Home</a></li>
                  <li><a href="#">Services</a></li>
                  <li><a href="<?php echo BASE_URL?>/aboutus">About</a></li>
                  <li><a href="<?php echo BASE_URL?>/contactus">Contact</a></li>
              </ul>
            </div>
          </div>
        </div>
      </div>
   </div>
