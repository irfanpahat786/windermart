<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$testimonialsid = (isset($_REQUEST['testimonialsid']) and $_REQUEST['testimonialsid'] != '' ) ?  $_REQUEST['testimonialsid'] :  header("Location: testimonial_view.php?q=err");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

//deleteing record from dewan_testimonial table
echo $testimonialDltQuery = "delete from testimonials where testimonialsid='$testimonialsid'";

//echo $serviceQuery."<br>";
//exit();	
$testimonialDltQueryResult = $connectionObject->executeQuery($testimonialDltQuery);

if(!$testimonialDltQueryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}  
header("Location: testimonial_view.php?q=del");
?>