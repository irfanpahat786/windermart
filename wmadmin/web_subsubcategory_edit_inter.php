<?php
ob_start();
//session_start();
//include_once("login_check_hd.php");
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$subsubcategoryid = (isset($_REQUEST['subsubcategoryid']) and $_REQUEST['subsubcategoryid'] != '' ) ?  $_REQUEST['subsubcategoryid'] :  header("Location: web_subsubcategory_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryid = $_REQUEST['categoryid'];
$subcategoryid = $_REQUEST['subcategoryid'];
$heading = (mysql_escape_string($_POST['heading']) != '')?mysql_escape_string($_POST['heading']):'';

$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

$newsContent = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';

$productQry = "update subsubcategory set categoryid = '$categoryid', subcategoryid = '$subcategoryid', heading ='$heading', detail = '$newsContent', numbering ='$numbering', modifydate = '".date("Y-m-d")."' where subsubcategoryid='$subsubcategoryid'";
	//echo "222222";
	//exit();

$productQryResult = $connectionObject->executeQuery($productQry);
if(!$productQryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
header("Location: web_subsubcategory_view.php?q=edt");
?>