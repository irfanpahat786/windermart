<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$productid = (isset($_REQUEST['productid']) and $_REQUEST['productid'] != '' ) ?  $_REQUEST['productid'] :  header("Location: web_product_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$serviceQuery = "delete from product where productid='$productid'";
//echo $serviceQuery."<br>";
//exit();	
$serviceQueryResult = $connectionObject->executeQuery($serviceQuery);

if(!$serviceQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: web_product_view.php?q=del");
?>