<?php
include_once('db.php');
if($_SESSION['id']==''){
    header('location:index.php');
}
$error="";
if(isset($_POST['submit']))
{  
    $username=htmlentities(addslashes(trim($_POST['username'])));
	$password=md5(htmlentities(addslashes(trim($_POST['password']))));
		
	
	
	
	if($error=='')
	{
		
		$q1="update  admin SET password='$password',username='$username' where id='".$_SESSION["id"]."'";
		$in=ExecuteQuery($q1);
		//print_r($in);
		header('location:home.php');
	
	}
	
}
?>