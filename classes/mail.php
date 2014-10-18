<?php
class Mail {
    private static $instance=NULL;
    
    public static function getInstance(){ 
        if( self::$instance === NULL ) { 
            self::$instance = new self();
        }
        return self::$instance;
    }
    
    public function send($array){
        $firstname=$array['firstname'];
        $email=$array['email'];
        $contact=$array['contact'];
        $problem=$array['problem'];
        $receiver  = "deepaklohani18@gmail.com";
        $message = "Welcome to our site \n";
        $message="Help Page Details are as below :- \n\n\nFull Name :$firstname  \n\nEmail : $email \n\nPhone Number: : $contact \n\ndescription of problem : $problem Message : $message";
        $title    = "maIL";
        $headers  = "From: Disposal\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed;\n";
        $headers .= "\tboundary=\"___$marker==\"";
    
    
        if (mail($receiver,$title,$message,$headers))
        {
            print "Your message is sent.";
        }
        else
        {
            print "Your message is not sent.
            //<br>Please go <a href=\"javascript:history.back();\">back</a> and send again.";
        }
    }    

    public function reset_password_generator($array){
    $newpassword=$array['npassword'];
    $receiver  = "deepaklohani18@gmail.com";
    $message = "Welcome to our site \n";
    $message="Help Page Details are as below :-  \n\n New Password : $newpassword \n\n";
    $title    = "maIL";
    $headers  = "From: Disposal\n";
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
       }

     public function send_forgot_password_mail($link,$email){
        
        $receiver  = $email;
        $message = "Click on the below link to reset your password \n";
        $message.=$link;
        $title    = "Password Reset";
        $headers  = "From: Disposal\n";
        $headers .= "MIME-Version: 1.0\n";
        $headers .= "Content-Type: multipart/mixed;\n";
        $headers .= "\tboundary=\"___$marker==\"";
    
    
        if (mail($receiver,$title,$message,$headers))
        {
            echo "<script>alert('Please click the link in your email to reset password');</script>";
        }
        else
        {
            print "Your message is not sent.
            //<br>Please go <a href=\"javascript:history.back();\">back</a> and send again.";
        }
    }       
}



