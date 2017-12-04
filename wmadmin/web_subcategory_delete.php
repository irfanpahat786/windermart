<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$subcategoryid = (isset($_REQUEST['subcategoryid']) and $_REQUEST['subcategoryid'] != '' ) ?  $_REQUEST['subcategoryid'] :  header("Location: web_subcategory_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$subcatQuery = "delete from subcategory where subcategoryid='$subcategoryid' limit 1";
//echo $serviceQuery."<br>";
//exit();	
$subcatQueryResult = $connectionObject->executeQuery($subcatQuery);

if(!$subcatQueryResult)
{
echo mysql_error()." Error: consult your administrator";
exit();
}  
header("Location:  web_subcategory_view.php?q=del");
?>