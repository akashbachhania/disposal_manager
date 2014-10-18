<?php
//including initial file
include("../init.php");
$admin=Admin::getInstance();
$id=$_POST["id"];
$value=$admin->rejoin($id);
echo json_encode($value);
?>