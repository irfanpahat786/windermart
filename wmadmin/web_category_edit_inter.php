<?php
include_once("db.php");

$categoryid = $_REQUEST['id'];
$catQuery = "select * from category where id = '$categoryid'";
$catQueryResult = ExecuteQueryResule($catQuery);
if(isset($_POST['update']))
{
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
	$heading = trim($_POST['cat_name']) ;
	$description = trim($_POST['description']);
	
	$catQuery = "select cat_name from category where cat_name = '$heading' and id!='$categoryid '";
	
	$catQueryResult = ExecuteQueryResule($catQuery);

	if(count($catQueryResult)>0)
		{ 
			$error="Sorry, this Category Name already exists in our database. Please try again with a different Name.";
			header("Location: web_category_view.php?q=err");
		}else
		{

			$categoryQuery = "update  category set cat_name='$heading',icon='$new_name',description='$description' where id ='$categoryid '";
			
			$in=ExecuteQuery($categoryQuery);
			header("Location: web_category_view.php?q=edt");
		}
}
?>