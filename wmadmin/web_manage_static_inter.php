<?php
// insert new vehicle
ob_start();
session_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$staticpageid = mysql_escape_string($_POST['staticpageid']);
$staticpage = mysql_escape_string($_POST['staticpage']);
$heading = mysql_escape_string($_POST['heading']);
$newsContent = mysql_escape_string($_POST['newsContent']);

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
}

if($staticpageid != '')
{
///Update
    if ($imgName=='')
	{
	$stdtQuery = "update staticpage set heading='$heading',detail='$newsContent' where staticpage='$staticpage' and staticpageid = '$staticpageid'";
	}else
	{
	$stdtQuery = "update staticpage set heading='$heading',detail='$newsContent',imgName='$imgName' where staticpage='$staticpage' and staticpageid = '$staticpageid'";
	}

}else
{
///Insert
$stdtQuery = "insert into staticpage(staticpage,heading,detail,imgName,status,createdate) values('$staticpage','$heading','$newsContent','$imgName','active','".date("Y-m-d")."')";
}
$stdtQueryResult = $connectionObject->executeQuery($stdtQuery);

if(!$stdtQueryResult)
  {
	echo mysql_error()." Error: consult your administrator";
	exit();
  }

echo $stdtQuery;



if($is_imgName == 1)
{
$imgPath = "../docs/$imgName";
	if(!move_uploaded_file($mTmpDir,$imgPath))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
$filename = $imgPath;
// Get new sizes // aspect ration "width divided by height"
list($width, $height,$mime) = getimagesize($filename);
$newwidth = 309;
$newheight = 150;
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

//echo $staticpage;
//exit ();				 
// redirect to same pagee
header("location: web_manage_static.php?staticpage=$staticpage&q=edt");
?>