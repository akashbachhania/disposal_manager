<?php
include("../init.php");
$admin = Admin::getInstance();
    $ids = $_POST['id'];
    $res=$admin->suspend_id($ids);
    echo $res;
