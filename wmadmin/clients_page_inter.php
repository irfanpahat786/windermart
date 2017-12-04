<?php
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


$id = (isset($_REQUEST['id']) and $_REQUEST['id'] != '' ) ?  $_REQUEST['id'] :  header("Location: clients_page.php?q=err");

$title = (mysql_escape_string($_POST['title']) != '')?mysql_escape_string($_POST['title']):'';
$content = (mysql_escape_string($_POST['content']) != '')?mysql_escape_string($_POST['content']):'';
$key_s = (mysql_escape_string($_POST['key_s']) != '')?mysql_escape_string($_POST['key_s']):'';

$img=$_FILES['image']['name'];
		
			
			 $imagename=basename($_FILES['image']['name']);
			 $imagenamesrc=$_FILES['image']['tmp_name'];
			 $postednewsdate=base64_encode(date('Y-m-d h:i:s'));
			 $imgName=$postednewsdate."_".$imagename;
			 $moveimg=move_uploaded_file($imagenamesrc,'../category/'.$imgName);
			 	 
if ($image=='')
{
$tipsQuery = "update cms set title ='$title', content = '$content', key_s = '$key_s', createdate= '".date("Y-m-d")."' where id='$id'";
} 
else 
{
$tipsQuery = "update cms set title ='$title', content = '$content', key_s = '$key_s', image='$imgName', createdate= '".date("Y-m-d")."' where id='$id'";
}
//echo $tipsQuery."<br>";
//exit();	
$tipsQueryResult = $connectionObject->executeQuery($tipsQuery);

if(!$tipsQueryResult)
  {
	echo mysql_error()." Error: consult your administrator";
	exit();
  }


header("Location:  clients_page.php?msg=ups");

?>