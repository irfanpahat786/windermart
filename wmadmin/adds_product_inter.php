<?php
include_once("db.php");

    $ad_id= (int)$_POST['ad_id']; 
    //$prod_id= (int)$_POST['prod_id'];
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
		$product_name= addslashes(trim($_POST['product_name']));
//$image= (mysql_escape_string($_REQUEST['file']) != '')?mysql_escape_string($_REQUEST['file']):'';
//$detail1= (mysql_escape_string($_REQUEST['editor1']) != '')?mysql_escape_string($_REQUEST['editor1']):'';
			$categoryQuery = "insert into bannerproduct(image,ad_id,product_name) values('$new_name','$ad_id','$product_name')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: advertisement_product.php?q=add");
?>