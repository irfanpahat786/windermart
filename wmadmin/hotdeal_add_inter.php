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
$price = (mysql_escape_string($_REQUEST['price']) != '')?mysql_escape_string($_REQUEST['price']):'';
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




$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;

}


$imgName2 = '';
$is_imgName2 = 0;
if(isset($_FILES['imgName2']) && $_FILES['imgName2']['name'] !='')
{
	$mTmpDir2 = $_FILES['imgName2']['tmp_name'];
	$imgName2=time()."_".$_FILES['imgName2']['name'];
	$is_imgName2 = 1;

}


$imgName3 = '';
$is_imgName3 = 0;
if(isset($_FILES['imgName3']) && $_FILES['imgName3']['name'] !='')
{
	$mTmpDir3 = $_FILES['imgName3']['tmp_name'];
	$imgName3=time()."_".$_FILES['imgName3']['name'];
	$is_imgName3 = 1;

}


$imgName4 = '';
$is_imgName4 = 0;
if(isset($_FILES['imgName4']) && $_FILES['imgName4']['name'] !='')
{
	$mTmpDir4 = $_FILES['imgName4']['tmp_name'];
	$imgName4=time()."_".$_FILES['imgName4']['name'];
	$is_imgName4 = 1;

}







echo $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';



$userQuerySelect = "select heading from hotdeals where heading='$heading'";
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
     header("location: hotdeal_add.php?q=ext");
	 exit();

}else  
{
			 
			 $adminQuery = "insert into  hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = 'active', imgName='$imgName', imgName2='$imgName2', imgName3='$imgName3', imgName4='$imgName4', price='$price', detail ='$detail',Add_title='$Add_title', createdate='".date("Y-m-d")."'	";
}
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

$imgPath = "../gallery_images/hotdeals/$imgName";
	if(!move_uploaded_file($mTmpDir,$imgPath))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
/*
$filename = $imgPath;


// Content type
//header('Content-type: image/jpeg');

// Get new sizes // aspect ration "width divided by height"
list($width, $height,$mime) = getimagesize($filename);
$newwidth = 500 ;
$newheight = 500;
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

}


if($is_imgName2 == 1)
{
// main Image upload

$imgPath2= "../gallery_images/hotdeals/$imgName2";
	if(!move_uploaded_file($mTmpDir2,$imgPath2))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
    
}

if($is_imgName3 == 1)
{
// main Image upload

$imgPath3 = "../gallery_images/hotdeals/$imgName3";
	if(!move_uploaded_file($mTmpDir3,$imgPath3))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
    
}

if($is_imgName4 == 1)
{
// main Image upload

$imgPath4 = "../gallery_images/hotdeals/$imgName4";
	if(!move_uploaded_file($mTmpDir4,$imgPath4))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
    
}
header("Location:  hotdeal_view.php?q=add");


?>