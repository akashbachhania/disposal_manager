<?php
//including initial file
include("../init.php");
if(isset($_POST['firstname']))
{
//    $unique_str = uniqid();
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
        "date" => 'not_login',
        //"match_string" => $unique_str,
        //"contect" => $_POST['contect'],
    );
    $generator=Generators::getInstance();
    $id = $generator->add_genrator($array);
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
