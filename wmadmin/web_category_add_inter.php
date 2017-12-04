<?php

include_once("db.php");

		$name = $_FILES['icon']['name'];
		$tmp_name =  $_FILES['icon']['tmp_name'];
		$location = "../icon/";
		$new_name = time()."-".rand(1000, 9999)."-".$name;

		if (move_uploaded_file($tmp_name, '../icon/'.$new_name)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name = time()."-".rand(1000, 9999)."-".$name;
			if (move_uploaded_file($tmp_name, '../icon/'.$new_name)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
$heading = (mysql_escape_string($_REQUEST['cat_name']) != '')?mysql_escape_string($_REQUEST['cat_name']):'';
$description = (mysql_escape_string($_REQUEST['description']) != '')?mysql_escape_string($_REQUEST['description']):'';

$catQuery = "select cat_name from category where cat_name = '$heading'";
$catQueryResult = ExecuteQueryResule($catQuery);

if(count($catQueryResult)>0)
		{ 
			$error="Sorry, this Category Name already exists in our database. Please try again with a different Name.";
			header("Location: web_category_add.php?q=add");
		}else
		{

			$categoryQuery = "insert into category(cat_name,icon,description) values('$heading','$new_name', '$description')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: web_category_view.php?q=add");
	}


?>