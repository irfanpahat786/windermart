<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$subsubcategoryid = (isset($_REQUEST['subsubcategoryid']) and $_REQUEST['subsubcategoryid'] != '' ) ?  $_REQUEST['subsubcategoryid'] :  header("Location: web_subsubcategory_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$serviceQuery = "delete from subsubcategory where subsubcategoryid='$subsubcategoryid' limit 1";
//echo $serviceQuery."<br>";
//exit();	
$serviceQueryResult = $connectionObject->executeQuery($serviceQuery);

if(!$serviceQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: web_subsubcategory_view.php?q=del");
?>