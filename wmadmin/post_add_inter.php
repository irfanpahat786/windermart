<?php
include_once("db.php");

    $cat_id= (int)$_POST['cat_id']; 
    $prod_id= (int)$_POST['prod_id'];
		$name = $_FILES['file']['name'];
		$tmp_name =  $_FILES['file']['tmp_name'];
		$location = "../shareimg/";
		$new_name = time()."-".rand(1000, 9999)."-".$name;

		if (move_uploaded_file($tmp_name, '../shareimg/'.$new_name)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name = time()."-".rand(1000, 9999)."-".$name;
			if (move_uploaded_file($tmp_name, '../shareimg/'.$new_name)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
		$name= addslashes(trim($_POST['name']));
//$image= (mysql_escape_string($_REQUEST['file']) != '')?mysql_escape_string($_REQUEST['file']):'';
$detail1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';
			$categoryQuery = "insert into latestpost(image,offers,cat_id,prod_id,name) values('$new_name','$detail1','$cat_id','$prod_id','$name')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: latest_post_view.php?q=add");
?>