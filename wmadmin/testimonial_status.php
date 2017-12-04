<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$testimonialsid = (isset($_REQUEST['testimonialsid']) and $_REQUEST['testimonialsid'] != '' ) ?  $_REQUEST['testimonialsid'] :  header("Location: testimonial_view.php?q=inv");
$status = $_REQUEST['status'];

if ($status=='inactive')
{
$testimonialtypeQuery = "update testimonials set status='active' where testimonialsid='$testimonialsid'";		  
}

if ($status=='0')
{
$testimonialtypeQuery = "update testimonials set status='inactive' where testimonialsid='$testimonialsid'";		  
}
if ($status=='active')
{
$testimonialtypeQuery = "update testimonials set status='inactive' where testimonialsid='$testimonialsid'";
}
if ($status=='')
{
header("Location: testimonial_view.php?q=inv");
}
$testimonialtypeQueryResult = $connectionObject->executeQuery($testimonialtypeQuery);
if(!$testimonialtypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update testimonial status";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  testimonial_view.php?q=act");
?>