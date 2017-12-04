<?php
include_once("db.php");


		$name = $_FILES['image']['name'];
		$tmp_name =  $_FILES['image']['tmp_name'];
		$location = "../offersimage/";
		$new_name = time()."-".rand(1000, 9999)."-".$name;

		if (move_uploaded_file($tmp_name, '../offersimage/'.$new_name)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name = time()."-".rand(1000, 9999)."-".$name;
			if (move_uploaded_file($tmp_name, '../offersimage/'.$new_name)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
//$image= (mysql_escape_string($_REQUEST['file']) != '')?mysql_escape_string($_REQUEST['file']):'';
$names= (mysql_escape_string($_REQUEST['name']) != '')?mysql_escape_string($_REQUEST['name']):'';
$price= (mysql_escape_string($_REQUEST['price']) != '')?mysql_escape_string($_REQUEST['price']):'';
$company= (mysql_escape_string($_REQUEST['company']) != '')?mysql_escape_string($_REQUEST['company']):'';
$url= (mysql_escape_string($_REQUEST['url']) != '')?mysql_escape_string($_REQUEST['url']):'';
$detail1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';
			$categoryQuery = "insert into offerday(name,price,company,url,image,description) values('$names','$price','$company','$url','$new_name','$detail1')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: offer_view.php?q=add");
?>