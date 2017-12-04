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

//if(isset($_REQUEST['status']))
//{
//	$status = active;
//}else{
//	$status = inactive;
//}

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;

}
echo $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';



			 
			 $adminQuery = "insert into  informative set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = 'active', imgName='$imgName', detail ='$detail',Add_title='$Add_title', createdate='".date("Y-m-d")."'	";

//echo $adminQuery;
//exit();
$adminQueryResult = $connectionObject->executeQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
			 
			 
if($is_imgName == 1)
{
// main Image upload

$imgPath = "../docs/informative/$imgName";
	if(!move_uploaded_file($mTmpDir,$imgPath))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
$filename = $imgPath;


// Content type
//header('Content-type: image/jpeg');

// Get new sizes // aspect ration "width divided by height"
list($width, $height,$mime) = getimagesize($filename);
$newwidth = 150 ;
$newheight = 150;
//echo image_type_to_mime_type(IMAGETYPE_BMP)."  ".IMAGETYPE_BMP;
//exit();
// Load
$thumb = imagecreatetruecolor($newwidth, $newheight);
switch($mime)
{
case 1: $source = imagecreatefromgif($filename);
		break;
case 2: $source = imagecreatefromjpeg($filename);
		break;
case 3: $source = imagecreatefrompng($filename);
		break;

default : break;
}
// Resize
imagecopyresampled($thumb, $source, 0, 0, 0, 0, $newwidth, $newheight, $width, $height);

// Output
switch($mime)
{
case 1: imagegif($thumb,$filename,100);
		break;
case 2: imagejpeg($thumb,$filename,100);
		break;
case 3: imagepng($thumb,$filename,100);
		break;

default : break;
}

}
header("Location:  informative_view.php?q=add");


?>