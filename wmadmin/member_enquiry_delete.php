<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$enquiryid = (isset($_REQUEST['enquiryid']) and $_REQUEST['enquiryid'] != '' ) ?  $_REQUEST['enquiryid'] :  header("Location: member_enquiry_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryQuery = "delete from enquiry where enquiryid='$enquiryid'";
//echo $serviceQuery."<br>";
//exit();	
$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);

if(!$categoryQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location: member_enquiry_view.php?q=del");
?>