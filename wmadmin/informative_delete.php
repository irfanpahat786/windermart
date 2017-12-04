<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$catid="0";
$checkbox_total =  $_REQUEST['checkbox_total'];
for($informativeid = 0;$informativeid<$checkbox_total;$informativeid++)
{
 $ch = 'check'.$informativeid;
  $_REQUEST[$ch];
if($_REQUEST[$ch]!='')
{
echo $catid = $catid.",".$_REQUEST[$ch];

}
}


//$informativeid = $_REQUEST['informativeid'];

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$informativeQuery = "delete from informative where informativeid IN ($catid)";
//echo $informativeQuery."<br>";
//exit();	
$informativeQueryResult = $connectionObject->executeQuery($informativeQuery);

if(!$informativeQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location: informative_view.php?q=del");
?>