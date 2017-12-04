<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$informativeid = (isset($_REQUEST['informativeid']) and $_REQUEST['informativeid'] != '' ) ?  $_REQUEST['informativeid'] :  header("Location: informative_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$informativetypeQuery = "update informative set status='active' where informativeid='$informativeid'";		  
}

if ($status=='0')
{
$informativetypeQuery = "update informative set status='inactive' where informativeid='$informativeid'";		  
}
if ($status=='active')
{
$informativetypeQuery = "update informative set status='inactive' where informativeid='$informativeid'";
}
if ($status=='')
{
header("Location: informative_view.php?q=inv");
}
$informativetypeQueryResult = $connectionObject->executeQuery($informativetypeQuery);
if(!$informativetypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update informative status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  informative_view.php?q=act");
?>