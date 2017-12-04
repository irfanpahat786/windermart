<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$videoid = (isset($_REQUEST['videoid']) and $_REQUEST['videoid'] != '' ) ?  $_REQUEST['videoid'] :  header("Location: video_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$informativetypeQuery = "update video set status='active' where videoid='$videoid'";		  
}

if ($status=='0')
{
$informativetypeQuery = "update video set status='inactive' where videoid='$videoid'";		  
}
if ($status=='active')
{
$informativetypeQuery = "update video set status='inactive' where videoid='$videoid'";
}
if ($status=='')
{
header("Location: video_view.php?q=inv");
}
$informativetypeQueryResult = $connectionObject->executeQuery($informativetypeQuery);
if(!$informativetypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update video status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  video_view.php?q=act");

?>