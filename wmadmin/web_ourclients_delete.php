<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$ourclientsid = (isset($_REQUEST['ourclientsid']) and $_REQUEST['ourclientsid'] != '' ) ?  $_REQUEST['ourclientsid'] :  header("Location: web_ourclients_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$ourclientsQuery = "delete from ourclients where ourclientsid='$ourclientsid'";
//echo $testimonialsQuery."<br>";
//exit();	
$ourclientsQueryResult = $connectionObject->executeQuery($ourclientsQuery);

if(!$ourclientsQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location:  web_ourclients_view.php?q=del");
?>