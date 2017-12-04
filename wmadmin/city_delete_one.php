<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$cityid = (isset($_REQUEST['cityid']) and $_REQUEST['cityid'] != '' ) ?  $_REQUEST['cityid'] :  header("Location: web_image_city_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_city table
echo $cityDltQuery = "delete from city where cityid='$cityid'";

//echo $serviceQuery."<br>";
//exit();	
$cityDltQueryResult = $connectionObject->executeQuery($cityDltQuery);

if(!$cityDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: city_view.php?q=del");
?>