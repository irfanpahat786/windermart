<?php
ob_start();
//session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$Key_word = (mysql_escape_string($_REQUEST['Key_word']) != '')?mysql_escape_string($_REQUEST['Key_word']):'';
$Add_title = (mysql_escape_string($_REQUEST['Add_title']) != '')?mysql_escape_string($_REQUEST['Add_title']):'';
$Description = (mysql_escape_string($_REQUEST['Description']) != '')?mysql_escape_string($_REQUEST['Description']):'';
$heading = (mysql_escape_string($_REQUEST['heading']) != '')?mysql_escape_string($_REQUEST['heading']):'';
$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

if(isset($_REQUEST['priority']))
{
	$priority = 1;
}else{
	$priority = 0;
}
// Define file size limit 
$limit_size=500000000;
//$path= "upload/$imagename";
//$imagename = "".$HTTP_POST_FILES['ufile']['name'];
$imagename= "../testimonial_images/".$HTTP_POST_FILES['ufile']['name'];
 //$imagename= "".$HTTP_POST_FILES['ufile']['name'];
 
 
if($ufile !=none)
{
// Store upload file size in $file_size 
$file_size=$HTTP_POST_FILES['ufile']['size'];

if($file_size >= $limit_size){
echo "Your file size is over limit<BR>";
echo "Your file size = ".$file_size;
echo " K";
echo "<BR>File size limit = 500000000 k";
}
else {

//copy file to where you want to store the file
if(copy($HTTP_POST_FILES['ufile']['tmp_name'], $imagename))
{
//echo "Successful<BR/>";
 
echo "<img src=\"$imagename\" width=\"150\" height=\"150\">";
}
else
{
echo "Copy Error";
}
}
}

echo $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';



			 
			 $adminQuery = "insert into  testimonials set heading = '$heading', numbering = '$numbering', priority = '$priority', imgName='$imagename', detail ='$detail', createdate='".date("Y-m-d")."'	";

//echo $adminQuery;
//exit();
$adminQueryResult = $connectionObject->executeQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
			 

header("Location:  testimonial_view.php?q=add");


?>