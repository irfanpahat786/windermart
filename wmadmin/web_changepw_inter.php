<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$username = $_REQUEST['username'];
$password = $_REQUEST['password'];
$email = $_REQUEST['email'];

$countryQuery = "update admin set username='$username', password='$password'";
				  
$countryQueryResult = $connectionObject->executeQuery($countryQuery);
if(!$countryQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_error()." : failed to update password";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}
// redirect to same page
header("location: home.php?q=edt");

?>