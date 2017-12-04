<?php
ob_start();
//session_start();
//include_once("login_check_hd.php");
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$id = (isset($_REQUEST['id']) and $_REQUEST['id'] != '' ) ?  $_REQUEST['id'] :  header("Location: web_product_view.php?q=err");
echo $id;

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);



$Name = (mysql_escape_string($_POST['Name']) != '')?mysql_escape_string($_POST['Name']):'';
echo $Name;
$Address = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';

echo $Address;
$Email = (mysql_escape_string($_REQUEST['Email']) != '')?mysql_escape_string($_REQUEST['Email']):'';
echo $Email;
$Phone = (mysql_escape_string($_REQUEST['Phone']) != '') ? mysql_escape_string($_REQUEST['Phone']):'';
echo $Phone;

$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}



$productQuery = "update agent set Name = '$Name', Email = '$Email', Phone='$Phone',Password='$Password',Address='$Address', numbering='$numbering', modifydate = '".date("Y-m-d")."' where id='$id' ";
//echo $serviceQuery."<br>";
//exit();	
$productQueryResult = $connectionObject->executeQuery($productQuery);
if(!$productQueryResult)
{
echo mysql_error()." Error: consult your administrator";
exit();
}


/////uploading file///////


	//****************end*********	
	//*****************
header("Location: web_product_view.php?q=edt");
?>