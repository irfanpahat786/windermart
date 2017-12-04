<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$catid="0";
$checkbox_total =  $_REQUEST['checkbox_total'];
for($cityid = 0;$cityid<$checkbox_total;$cityid++)
{
 $ch = 'check'.$cityid;
  $_REQUEST[$ch];
if($_REQUEST[$ch]!='')
{
echo $catid = $catid.",".$_REQUEST[$ch];

}
}


//$cityid = $_REQUEST['cityid'];

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$cityQuery = "delete from city where cityid IN ($catid)";
//echo $cityQuery."<br>";
//exit();	
$cityQueryResult = $connectionObject->executeQuery($cityQuery);

if(!$cityQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location: city_view.php?q=del");
?>