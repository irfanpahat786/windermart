<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


$fileName=$_FILES['filepdf']['name'];
if($fileName!='')
{
	//File Size
	$filesize1=$_FILES["filepdf"]["size"]/(1024*1024);
	if($filesize1 > 2)
	{
		error_message ("You can upload maximum of 2 MB file! ");
	}
	//File Type
	$fileType = $_FILES['filepdf']['name'];
	// The name of the temporary copy of the file stored on the server
	$fileTemp = $_FILES['filepdf']['tmp_name'];
	// The error code resulting from the file upload
	$fileError = $_FILES['filepdf']['error'];
	$destFile = time().$fileName;
}
$nwsimg=$_FILES['ufile']['name'];
	$newsimagename=basename($_FILES['ufile']['name']);
	$newsimagenamesrc=$_FILES['ufile']['tmp_name'];
	$postednewsdate=base64_encode(date('Y-m-d h:i:s'));
	$imgName=$postednewsdate."_".$newsimagename;
	$moveimg=move_uploaded_file($newsimagenamesrc,'../ebrouchure_images/'.$imgName);

$Add_title = $_REQUEST['Add_title'];
$Key_word = (mysql_escape_string($_REQUEST['Key_word']) != '')?mysql_escape_string($_REQUEST['Key_word']):'';
$Description = (mysql_escape_string($_REQUEST['Description']) != '')?mysql_escape_string($_REQUEST['Description']):'';
$ebrochureid = $_REQUEST['ebrochureid'];
$heading = (mysql_escape_string($_REQUEST['heading']) != '')?mysql_escape_string($_REQUEST['heading']):'';
$projectsid = $_REQUEST['projectsid'];

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

if(isset($_REQUEST['status']))
{
	$status = active;
}else{
	$status = inactive;
}
//$status=$_REQUEST['status'];

 $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';


if ($nwsimg=='' and $fileName=='')
{
$adminQuery = "update ebrouchure set projectsid = '$projectsid', heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',Add_title='$Add_title' where ebrochureid='$ebrochureid'";
}
else if ($nwsimg!='' and $fileName=='')
{
$adminQuery = "update ebrouchure set projectsid = '$projectsid', heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName='$imgName', Add_title='$Add_title' where ebrochureid='$ebrochureid'";	
}
else if ($nwsimg=='' and $fileName!='')
{
$adminQuery = "update ebrouchure set projectsid = '$projectsid', heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',filepdf='$fileName', Add_title='$Add_title' where ebrochureid='$ebrochureid'";		
}
else if ($nwsimg!='' and $fileName!='')
{
$adminQuery = "update ebrouchure set projectsid = '$projectsid', heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName='$imgName',filepdf='$fileName', Add_title='$Add_title' where ebrochureid='$ebrochureid'";
}
//echo $adminQuery;
//exit();
$adminQueryResult = $connectionObject->executeQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
			 
			 

$destLoc = '../docs/ebrouchure_file/'.$fileName;
if(move_uploaded_file($_FILES['filepdf']['tmp_name'],$destLoc)){
//$qur_update = "UPDATE mindstar_order SET destreport='$destFile', reportmessage='$messageweb' WHERE order_id='$orderid'";
//$res_update = mysql_query($qur_update) or die(mysql_error());
}else
{
	echo "failed to upload the file";
}			

	
header("Location: ebrouchere_view.php?q=edt");

?>