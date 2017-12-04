<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$informativeid = (isset($_REQUEST['informativeid']) and $_REQUEST['informativeid'] != '' ) ?  $_REQUEST['informativeid'] :  header("Location: web_image_informative_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_informative table
echo $informativeDltQuery = "delete from informative where informativeid='$informativeid'";

//echo $serviceQuery."<br>";
//exit();	
$informativeDltQueryResult = $connectionObject->executeQuery($informativeDltQuery);

if(!$informativeDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: informative_view.php?q=del");
?>