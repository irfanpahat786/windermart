<?php
ob_start();
session_start();
//include_once("login_check_hd.php");
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


$categoryid = (mysql_escape_string($_REQUEST['categoryid']) != '')?mysql_escape_string($_REQUEST['categoryid']):'';
$subcategoryid = (mysql_escape_string($_REQUEST['subcategoryid']) != '')?mysql_escape_string($_REQUEST['subcategoryid']):'';
$heading = (mysql_escape_string($_REQUEST['heading']) != '')?mysql_escape_string($_REQUEST['heading']):'';

$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

$newsContent = (mysql_escape_string($_REQUEST['newsContent']) != '') ? mysql_escape_string($_REQUEST['newsContent']):'';
//$newsContent2 = (mysql_escape_string($_REQUEST['newsContent2']) != '') ? mysql_escape_string($_REQUEST['newsContent2']):'';
//$newsContent3 = (mysql_escape_string($_REQUEST['newsContent3']) != '') ? mysql_escape_string($_REQUEST['newsContent3']):'';

$srchQry = "select count(*) as num from subsubcategory where heading = '$heading' and subcategoryid = '$subcategoryid' and categoryid='$categoryid'";
$srchQryResult = $connectionObject->executeQuery($srchQry);
if(!$srchQryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
$srchRow = mysql_fetch_assoc($srchQryResult);
if($srchRow['num']>0)
{
	header("Location: web_subsubcategory_view.php?q=ext");
	exit();
	
}else{
		$productQuery = "insert into subsubcategory set categoryid='$categoryid', subcategoryid = '$subcategoryid', heading ='$heading', numbering='$numbering', detail = '$newsContent', createdate = '".date("Y-m-d")."' ";
		//echo $serviceQuery."<br>";
		//exit();	
		$productQueryResult = $connectionObject->executeQuery($productQuery);
		if(!$productQueryResult)
		{
			echo mysql_error()." Error: consult your administrator";
			exit();
		}	
		header("Location: web_subsubcategory_view.php?q=add");
}
?>