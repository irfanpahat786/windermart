<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$galleryid = (isset($_REQUEST['galleryid']) and $_REQUEST['galleryid'] != '' ) ?  $_REQUEST['galleryid'] :  header("Location: gallary_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_informative table
echo $informativeDltQuery = "delete from gallery where galleryid='$galleryid'";

//echo $serviceQuery."<br>";
//exit();	
$informativeDltQueryResult = $connectionObject->executeQuery($informativeDltQuery);

if(!$informativeDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: gallary_view.php?q=del");
?>