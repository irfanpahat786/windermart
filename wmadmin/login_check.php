<?php
include_once'db.php';

$loginname = $_POST['loginname'];
$password = md5($_POST['password']);


$adminQuery = "select * from admin where username = '$loginname' and password = '$password'";
//echo $adminQuery;
$adminQueryResult = EXecuteQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}

if(mysql_num_rows($adminQueryResult) == 0)
{     
  header("Location: .?invalid");
  exit();
}

$loginRow = mysql_fetch_assoc($adminQueryResult);
    
   $_SESSION['id']=$loginRow['id'];
   $_SESSION['username'] = $loginRow['username'];
   $_SESSION['password'] = $loginRow['password'];  

	header("Location: home.php");
?>