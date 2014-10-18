<?php
require_once("init.php");
$session = $init->getSession();
$redirect = $init->getRedirect();
if(!$session->__get("username"))
    {
      $redirect->redirect("../admin_signin.php");
    }
   $id=$session->__get("user_id");
$admin = Admin::getInstance();
$admin->logout($id);

?>
