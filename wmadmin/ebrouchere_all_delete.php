<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

//$diseasesid = (isset($_REQUEST['diseasesid']) and $_REQUEST['diseasesid'] != '' ) ?  $_REQUEST['diseasesid'] :  header("Location: web_image_diseases_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_informative table
echo $informativeDltQuery = "delete from ebrouchure";

//echo $serviceQuery."<br>";
//exit();	
$informativeDltQueryResult = $connectionObject->executeQuery($informativeDltQuery);

if(!$informativeDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: ebrouchere_view.php?q=del");
?>