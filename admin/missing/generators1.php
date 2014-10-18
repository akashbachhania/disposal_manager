<?php
//including initial file
include("../init.php");
include ('paginate.php'); //include of paginat page
    
    
    $admin=Admin::getInstance();
    $per_page = 2;         // number of results to show per page
    $total_results = $admin->total_pages($per_page);
    $total_pages = $admin->total_results($per_page,$total_results);
    $show_page="";
//-------------if page is setcheck------------------//
if (isset($_GET['page'])) {
    $show_page = $_GET['page'];             //it will telles the current page
    if ($show_page > 0 && $show_page <= $total_pages) {
        $start = ($show_page - 1) * $per_page;
        $end = $start + $per_page;
    } else {
        // error - show first set of results
        $start = 0;              
        $end = $per_page;
    }
} else {
    // if page isn't set, show first set of results
    $start = 0;
    $end = $per_page;
}
// display pagination
$_GET['page']="";
$page = intval($_GET['page']);

$tpages=$total_pages;
if ($page <= 0)
    $page = 1;
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PaginationWithPHP-techumber.com</title>
    <link rel="stylesheet" type="text/css" href="css/style.css" />
    <style type="text/css">
.logo
{
    text-align: center;
}
.container{

}
</style>
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="logo">
                <a href="http:/www.techumber.com">
                    <img src="img/logo.png" alt="techumber.com logo"/> 
                </a>
            </div>
        </div>
        <div class="row">
            <div class="span6 offset3">
                <div class="mini-layout">
                 <?php
                    $reload = $_SERVER['PHP_SELF'] . "?tpages=" . $tpages;
                    echo '<div class="pagination"><ul>';
                    if ($total_pages > 1) {
                        echo paginate($reload, $show_page, $total_pages);
                    }
                    echo "</ul>
                    
                    
                    </div>";?>
                    
                    <?PHP
                    // display data in table
                    echo "<table class='table table-bordered'>";
                    echo "<thead><tr><th>country code</th> <th>Country Name</th></tr></thead>";
                    // loop through results of database query, displaying them in the table 
                    for ($i = $start; $i < $end; $i++) {
                        // make sure that PHP doesn't try to show results that don't exist
                        if ($i == $total_results) {
                            break;
                        }
                     
                        // echo out the contents of each row into a table
                        //echo "<tr " . $cls . ">";
                        echo '<td>' . mysql_result($result, $i, 'id') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'firstname') . '</td>';
                        echo '<td>' . mysql_result($result, $i, 'lastname') . '</td>';
                        //echo '<td>' . mysql_result($result, $i, 'country') . '</td>';
                        echo "</tr>";
                    }       
                    // close table>
                echo "</table>";
            // pagination
            ?>
            </div>
        </div>
    </div>
</div>
</body>
</html>
