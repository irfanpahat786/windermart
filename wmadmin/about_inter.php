<?php
include_once("db.php");


		
$about= (mysql_escape_string($_REQUEST['about']) != '')?mysql_escape_string($_REQUEST['about']):'';
$editor1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';
			$categoryQuery = "insert into aboutus(about,editor1) values('$about','$editor1')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: latest_post_view.php?q=add");
?>