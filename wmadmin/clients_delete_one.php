<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$clientsid = (isset($_REQUEST['clientsid']) and $_REQUEST['clientsid'] != '' ) ?  $_REQUEST['clientsid'] :  header("Location: web_image_clients_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_clients table
echo $clientsDltQuery = "delete from clients where clientsid='$clientsid'";

//echo $serviceQuery."<br>";
//exit();	
$clientsDltQueryResult = $connectionObject->executeQuery($clientsDltQuery);

if(!$clientsDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: clients_view.php?q=del");
?>