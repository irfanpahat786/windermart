<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$cityid = (isset($_REQUEST['cityid']) and $_REQUEST['cityid'] != '' ) ?  $_REQUEST['cityid'] :  header("Location: city_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$citytypeQuery = "update city set status='active' where cityid='$cityid'";		  
}

if ($status=='0')
{
$citytypeQuery = "update city set status='inactive' where cityid='$cityid'";		  
}
if ($status=='active')
{
$citytypeQuery = "update city set status='inactive' where cityid='$cityid'";
}
if ($status=='')
{
header("Location: city_view.php?q=inv");
}
$citytypeQueryResult = $connectionObject->executeQuery($citytypeQuery);
if(!$citytypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update city status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  city_view.php?q=act");
?>