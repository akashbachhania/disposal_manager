<?php
//including initial file
include("../init.php");
//create object in generator class
$generators=Generators::getInstance();
//create object in vender class
$vendor=Vendor::getInstance();
//create object in admin class
$admin=Admin::getInstance();

// add generator by admin
if(isset($_POST['firstname']))
{
    $array = array(
        "companyname" => $_POST['companyname'],
        "department" => $_POST['department'],
        "firstname" => $_POST['firstname'],
        "lastname" => $_POST['lastname'],
        "email" => $_POST['email'],
        "password" => $_POST['password'],
        "address1" => $_POST['address1'],
        "address2" => $_POST['address2'],
        "city" => $_POST['city'],
        "state" => $_POST['state'],
        "zipcode" => $_POST['zipcode'],
        "epa_id" => $_POST['epa_id'],
        "contact" => $_POST['contact'],
        "fax" => $_POST['fax'],
        "date" => 'first time login',
    );
    
    $id = $generators->add_genrator($array);
    if($id=="email"){
        $array['email']="false";
    }
    else{
        $array['id'] = $id;
    }
    echo json_encode($array);
/*
    $receiver  = $_POST['email'];
    $message = "Welcome to our site \n";
    $message .= "http://app.dynamite-technologies.com/customer_profile.php?uid=".$unique_str;
    $marker   = "welcome to site";
    $title    = "maIL";
    $headers  = "From: \n";
    $headers .= "MIME-Version: 1.0\n";
    $headers .= "Content-Type: multipart/mixed;\n";
    $headers .= "\tboundary=\"___$marker==\"";


    if (mail($receiver,$title,$message,$headers))
    {
        //print "Your message is sent.";
    }
    else
    {
       // print "Your message is not sent.
        //<br>Please go <a href=\"javascript:history.back();\">back</a> and send again.";
    }
   */ 
}
//account parmanently remove functionality
if(isset($_POST['remove_id']))
{
    $ids = $_POST['remove_id'];
    $res=$generators->remove_account($ids);
    echo $res;
}

//account suspend  functionality
if(isset($_POST['suspend_id']))
{
    $ids = $_POST['suspend_id'];
    $res=$generators->suspend_id($ids);
    echo $res;
}
//show genrator edit record in popup
if(isset($_POST["edit_id"]))
{
    $edit_id=$_POST["edit_id"];
    $value=$generators->show_edit_generator($edit_id);
    echo json_encode($value);
}

//account join generator functionality
if(isset($_POST['join']))
{
    $ids = $_POST['join'];
    $res=$generators->join($ids);
    echo $res;
}

                                //vendor functionality 

//show genrator rejoin record in popup
if(isset($_POST["rejoin_id"]))
{
    $rejoin_id=$_POST["rejoin_id"];
    $value=$generators->rejoin($rejoin_id);
    echo json_encode($value);
}

//show vender rejoin record in popup
if(isset($_POST["vrejoin_id"]))
{
    
    $rejoin_id=$_POST["vrejoin_id"];
    $value=$vendor->rejoin($rejoin_id);
    echo json_encode($value);
}
//account parmanently remove functionality
if(isset($_POST['vremove_id']))
{
    echo $ids = $_POST['vremove_id'];
    $res=$vendor->remove_account($ids);
    echo $res;
}
//account suspend  functionality
if(isset($_POST['vsuspend_id']))
{
    $ids = $_POST['vsuspend_id'];
    $res=$vendor->suspend_id($ids);
    echo $res;
}

//account join vendor functionality
if(isset($_POST['venjoin']))
{
    $ids = $_POST['venjoin'];
    $res=$vendor->join($ids);
    echo $res;
}

//Administrator account remove functionality
if(isset($_POST['administrator_remove_id']))
{
    echo $ids = $_POST['administrator_remove_id'];
    $res=$admin->remove_account($ids);
    echo $res;
}


?>