<?php
ob_start();
//session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$name = (mysql_escape_string($_REQUEST['name']) != '')?mysql_escape_string($_REQUEST['name']):'';
$email = (mysql_escape_string($_REQUEST['email']) != '')?mysql_escape_string($_REQUEST['email']):'';
$phone = (mysql_escape_string($_REQUEST['phone']) != '')?mysql_escape_string($_REQUEST['phone']):'';
$address = (mysql_escape_string($_REQUEST['newsContent']) != '')?mysql_escape_string($_REQUEST['newsContent']):'';
//$ = (mysql_escape_string($_REQUEST['category']) != '')?mysql_escape_string($_REQUEST['category']):'';
$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

/*if(isset($_REQUEST['priority']))
{
	$priority = 1;
}else{
	$priority = 0;
}*/

//if(isset($_REQUEST['status']))
//{
//	$status = active;
//}else{
//	$status = inactive;
//}

/*$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;

}*/
//echo $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';



$userQuerySelect = "select heading from video where heading='$heading'";
//echo $userQuerySelect;
$userQueryResultSelect = $connectionObject->executeQuery($userQuerySelect);
  if(!$userQueryResultSelect)
	{ // if query failed to execute then print error msg
	  $errorMsgSelect = mysql_errno()." : failed to display users";
	  echo $errorMsgSelect;
	  //header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	  exit();
    }
   $userRowSelect = mysql_fetch_assoc($userQueryResultSelect);

if ($heading==$userRowSelect['heading'])   ///checking exisitng name
{
     header("location: video_add.php?q=ext");
	 exit();

}else  
{
			 
			 $adminQuery = "insert into  video set name = '$name',email = '$email',address = '$address', numbering = '$numbering', phone = '$phone', createdate='".date("Y-m-d")."'	";
}
//echo $adminQuery;
//exit();
$adminQueryResult = $connectionObject->executeQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
			 
			 
/*f($is_imgName == 1)
{
// main Image upload

$imgPath = "../video_images/$imgName";
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
$newwidth = 220 ;
$newheight = 173;
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
*/

header("Location:  video_view.php?q=add");


?>