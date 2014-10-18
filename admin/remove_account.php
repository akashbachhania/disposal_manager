<?php
include("../init.php");
$admin = Admin::getInstance();
    $ids = $_POST['id'];
    $res=$admin->remove_account($ids);
    echo $res;
//}
/* 
if(isset($_POST['chk']) && !empty($_POST['chk'])){
    $ids = $_POST['chk'];  
    $res=$customer->delete($ids);
    echo $res;
}
else {
    echo 0;
}*/
?>