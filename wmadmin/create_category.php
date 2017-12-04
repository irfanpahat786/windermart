<?php 



include_once("db.php");


$heading = (mysql_escape_string($_REQUEST['cat_name']) != '')?mysql_escape_string($_REQUEST['cat_name']):'';
$description = (mysql_escape_string($_REQUEST['description']) != '')?mysql_escape_string($_REQUEST['description']):'';


$catQuery = "select cat_name from category where cat_name = '$heading'";
$catQueryResult = ExecuteQueryResule($catQuery);

if(count($catQueryResult)>0)
		{ 
			$error="Sorry, this Category Name already exists in our database. Please try again with a different Name.";
			header("Location: web_category_view.php");
		}else
		{

			$categoryQuery = "insert into category(cat_name,description) values('$heading', '$description')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: web_category_view.php?q=add");
	}





?>