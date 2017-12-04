<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$catid="0";
$checkbox_total =  $_REQUEST['checkbox_total'];
for($testimonialsid = 0;$testimonialsid<$checkbox_total;$testimonialsid++)
{
 $ch = 'check'.$testimonialsid;
  $_REQUEST[$ch];
if($_REQUEST[$ch]!='')
{
echo $catid = $catid.",".$_REQUEST[$ch];

}
}


//$testimonialid = $_REQUEST['testimonialid'];

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$testimonialQuery = "delete from testimonials where testimonialsid IN ($catid)";
//echo $testimonialQuery."<br>";
//exit();	
$testimonialQueryResult = $connectionObject->executeQuery($testimonialQuery);

if(!$testimonialQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}
  
header("Location: testimonial_view.php?q=del");
?>