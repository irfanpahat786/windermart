<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$clientsid = (isset($_REQUEST['clientsid']) and $_REQUEST['clientsid'] != '' ) ?  $_REQUEST['clientsid'] :  header("Location: clients_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$clientstypeQuery = "update clients set status='active' where clientsid='$clientsid'";		  
}

if ($status=='0')
{
$clientstypeQuery = "update clients set status='inactive' where clientsid='$clientsid'";		  
}
if ($status=='active')
{
$clientstypeQuery = "update clients set status='inactive' where clientsid='$clientsid'";
}
if ($status=='')
{
header("Location: clients_view.php?q=inv");
}
$clientstypeQueryResult = $connectionObject->executeQuery($clientstypeQuery);
if(!$clientstypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update clients status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  clients_view.php?q=act");
?>