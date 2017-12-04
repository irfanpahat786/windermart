<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$catid="0";
$checkbox_total =  $_REQUEST['checkbox_total'];
for($clientsid = 0;$clientsid<$checkbox_total;$clientsid++)
{
 $ch = 'check'.$clientsid;
  $_REQUEST[$ch];
if($_REQUEST[$ch]!='')
{
echo $catid = $catid.",".$_REQUEST[$ch];

}
}


//$clientsid = $_REQUEST['clientsid'];

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$clientsQuery = "delete from clients where clientsid IN ($catid)";
//echo $clientsQuery."<br>";
//exit();	
$clientsQueryResult = $connectionObject->executeQuery($clientsQuery);

if(!$clientsQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location: clients_view.php?q=del");
?>