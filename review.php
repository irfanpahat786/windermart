<?php

include_once("db.php");


if($_SESSION['userid']=='')

{

	header("location:login.php");

}

else

{

		

//$image= (mysql_escape_string($_REQUEST['file']) != '')?mysql_escape_string($_REQUEST['file']):'';

$rating= (mysql_escape_string($_REQUEST['rating']) != '')?mysql_escape_string($_REQUEST['rating']):'';

$review= (mysql_escape_string($_REQUEST['review']) != '')?mysql_escape_string($_REQUEST['review']):'';

$user_id= (mysql_escape_string($_REQUEST['id']) != '')?mysql_escape_string($_REQUEST['id']):'';

$prod_id= (mysql_escape_string($_REQUEST['prod_id']) != '')?mysql_escape_string($_REQUEST['prod_id']):'';

//$detail1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';

			$categoryQuery = "insert into rating(rating,review,user_id,prod_id) values('$rating','$review','$user_id','$prod_id')";

			$in=ExecuteQuery($categoryQuery);

			header("Location: index.php");

			}

?>