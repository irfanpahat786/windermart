<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryid = (mysql_escape_string($_REQUEST['categoryid']) != '')?mysql_escape_string($_REQUEST['categoryid']):'';
$heading = (mysql_escape_string($_REQUEST['heading']) != '')?mysql_escape_string($_REQUEST['heading']):'';

$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

$newsContent = (mysql_escape_string($_REQUEST['newsContent']) != '') ? mysql_escape_string($_REQUEST['newsContent']):'';

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
	
	$imgPath2 = "../subcatImage/thumb/$imgName";
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}

}

//fetching the heading  from service subcategory  for duplicacy. 
$subCatHeading = "select heading from subcategory where heading = '$heading'";
$subCatHeadingResult = $connectionObject->executeQuery($subCatHeading);
if(!$subCatHeadingResult)
  {
	echo mysql_error()." Error: consult your administrator";
	exit();
  }
$subCatHeadingRow = mysql_fetch_assoc($subCatHeadingResult);
// if($heading == $subCatHeadingRow['heading'])
//{
	//header("Location:  web_subcategory_view.php?q=ext");
	//exit();
//}else
//{

	//query for inserting the data in subcategory table
	$subcatQry = "insert into subcategory set categoryid='$categoryid', heading ='$heading',numbering='$numbering', detail = '$newsContent', imgName='$imgName', createdate= '".date("Y-m-d")."' ";
//echo $serviceQuery."<br>";
//exit();	
	$subcatQryResult = $connectionObject->executeQuery($subcatQry);
	if(!$subcatQryResult)
  	{
		echo mysql_error()." Error: consult your administrator";
		exit();
  	}

	if($is_imgName == 1)
	{
		// main Image upload

		$imgPath = "../subcatImage/$imgName";
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
		$newwidth = 150;
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
	
	//********** **************** start of image resizing second image ****************//
	//making thumbnail of subcategory image	
	if($is_imgName == 1)
	{
		
		//$imgPath2 = "../subcatImage/thumb/$imgName";
		if(!move_uploaded_file($mTmpDir,$imgPath2))
		{
			$error="Failed to upload thumbnail image";
			// header("Location: ");
		}
		
		$filename2 = $imgPath2;

		// Content type
		//header('Content-type: image/jpeg');

		// Get new sizes // aspect ration "width divided by height"
		list($width2, $height2,$mime2) = getimagesize($filename2);
		$newwidth = 150;
		$newheight = 150;
		//echo image_type_to_mime_type(IMAGETYPE_BMP)."  ".IMAGETYPE_BMP;
		//exit();
		// Load
		$thumb2 = imagecreatetruecolor($newwidth2, $newheight2);
		switch($mime2)
		{
			case 1: $source2 = imagecreatefromgif($filename2);
					break;
			case 2: $source2 = imagecreatefromjpeg($filename2);
					break;
			case 3: $source2 = imagecreatefrompng($filename2);
					break;

			default : break;
		}
		// Resize
		imagecopyresampled($thumb2, $source2, 0, 0, 0, 0, $newwidth2, $newheight2, $width2, $height2);

		// Output
		switch($mime2)
		{
			case 1: imagegif($thumb2,$filename2,100);
					break;
			case 2: imagejpeg($thumb2,$filename2,100);
					break;
			case 3: imagepng($thumb2,$filename2,100);
					break;

			default : break;
		}

	}
	//********* *********** end of second image resizing **************//	
	 
	header("Location:  web_subcategory_view.php?q=add");
//}
?>