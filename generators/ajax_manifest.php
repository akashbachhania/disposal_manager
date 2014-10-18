<?php
//including initial file
require_once("../init.php");
$generator = Generators::getInstance();
//Call function to select all record for selected sites to be updated
if(isset($_POST['site_id']))
{
    $id=$_POST['site_id'];
    $update=$generator->select_edit_sites($id);
    echo json_encode($update);
}
?>
