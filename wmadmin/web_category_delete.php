<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$categoryid = (isset($_REQUEST['categoryid']) and $_REQUEST['categoryid'] != '' ) ?  $_REQUEST['categoryid'] :  header("Location: web_category_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryQuery = "delete from category where categoryid='$categoryid'";
//echo $serviceQuery."<br>";
//exit();	
$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);

if(!$categoryQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location:  web_category_view.php?q=del");
?>