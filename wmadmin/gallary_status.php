<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$galleryid = (isset($_REQUEST['galleryid']) and $_REQUEST['galleryid'] != '' ) ?  $_REQUEST['galleryid'] :  header("Location: gallary_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$informativetypeQuery = "update gallery set status='active' where galleryid='$galleryid'";		  
}

if ($status=='0')
{
$informativetypeQuery = "update gallery set status='inactive' where galleryid='$galleryid'";		  
}
if ($status=='active')
{
$informativetypeQuery = "update gallery set status='inactive' where galleryid='$galleryid'";
}
if ($status=='')
{
header("Location: gallary_view.php?q=inv");
}
$informativetypeQueryResult = $connectionObject->executeQuery($informativetypeQuery);
if(!$informativetypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update gallery status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  gallary_view.php?q=act");
?>