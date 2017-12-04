<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
$productid = (isset($_REQUEST['id']) and $_REQUEST['id'] != '' ) ?  $_REQUEST['id'] :  header("Location: web_product_view.php?q=inv");
$status = $_REQUEST['pagetype'];

if ($status=='verified')
{
$producttypeQuery = "update users set pagetype='list' where id='$productid'";		  
}

if ($status=='0')
{
$producttypeQuery = "update users set pagetype='verified' where id='$productid'";		  
}
if ($status=='list')
{
$producttypeQuery = "update users set pagetype='verified' where id='$productid'";
}
if ($status=='')
{
header("Location: web_product_view.php?q=inv");
}
$producttypeQueryResult = $connectionObject->executeQuery($producttypeQuery);
if(!$producttypeQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update product pagetype";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}

header("Location:  web_product_view.php?q=act");
?>