<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$locationid = (isset($_REQUEST['ebrochureid']) and $_REQUEST['ebrochureid'] != '' ) ?  $_REQUEST['ebrochureid'] :  header("Location: ebrouchure_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$locationtypeQuery = "update ebrouchure set status='active' where ebrochureid='$ebrochureid'";		  
}

if ($status=='0')
{
$locationtypeQuery = "update ebrouchure set status='inactive' where ebrochureid='$ebrochureid'";		  
}
if ($status=='active')
{
$locationtypeQuery = "update ebrouchure set status='inactive' where ebrochureid='$ebrochureid'";
}
if ($status=='')
{
header("Location: ebrouchure_view.php?q=inv");
}
$locationtypeQueryResult = $connectionObject->executeQuery($locationtypeQuery);
if(!$locationtypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update location status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  ebrouchure_view.php?q=act");
?>