<?php

include_once("db.php");
//include_once("../PhpIncludes/database_connection.php");

//$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$package_id = (mysql_escape_string($_REQUEST['package_id']) != '')?mysql_escape_string($_REQUEST['package_id']):'';
$price = (mysql_escape_string($_REQUEST['price']) != '')?mysql_escape_string($_REQUEST['price']):'';
$duration= (mysql_escape_string($_REQUEST['duration']) != '')?mysql_escape_string($_REQUEST['duration']):'';
$detail1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';
//fetching service type for duplicacy checking


			$categoryQuery = "insert into package_price(package_id,price,duration,offers) values('$package_id', '$price','$duration','$detail1')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: package_detail_view.php?q=add");
	

?>