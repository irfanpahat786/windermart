<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$ebrochureid = (isset($_REQUEST['ebrochureid']) and $_REQUEST['ebrochureid'] != '' ) ?  $_REQUEST['ebrochureid'] :  header("Location: ebrouchere_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_location table
echo $locationDltQuery = "delete from ebrouchure where ebrochureid='$ebrochureid'";

//echo $serviceQuery."<br>";
//exit();	
$locationDltQueryResult = $connectionObject->executeQuery($locationDltQuery);

if(!$locationDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: ebrouchere_view.php?q=del");
?>