<?php
error_reporting(0);
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$url = (mysql_escape_string($_REQUEST['url']) != '')?mysql_escape_string($_REQUEST['url']):'';
$heading = (mysql_escape_string($_POST['heading']) != '') ? mysql_escape_string($_POST['heading']):'';

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
	
}


	 $ourclientsQuery = "insert into  ourclients(url,heading,imgName) values ('$url','$heading','$imgName')";
//exit();
	$ourclientsQueryResult = $connectionObject->executeQuery($ourclientsQuery);
	if(!$ourclientsQueryResult)
	{
		echo mysql_error()." Error: failed to insert into Our Clients";
		exit();
	} 


/////******* uploading large image********/////// 
if($is_imgName == 1)
{
		// main Image upload

		$imgPath = "../testimonial_images/$imgName";
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
		$newwidth = 500;
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

} 

////uploading thumb image of thumbnail image
	if($is_imgName == 1)
	{
				
		if(!move_uploaded_file($mTmpDir,$imgPath2))
		{
			$error="Failed to upload small image";
			// header("Location: ");
		}
		
		$filename2 = $imgPath2;

		// Content type
		//header('Content-type: image/jpeg');

		// Get new sizes // aspect ration "width divided by height"
		list($width2, $height2,$mime2) = getimagesize($filename2);
		$newwidth2 = 254;
		$newheight2 = 73;
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

////uploading small image of thumbnail image
	if($is_imgName == 1)
	{
				
		if(!move_uploaded_file($mTmpDir,$imgPath3))
		{
			$error="Failed to upload small image";
			// header("Location: ");
		}
		
		$filename3 = $imgPath3;

		// Content type
		//header('Content-type: image/jpeg');

		// Get new sizes // aspect ration "width divided by height"
		list($width3, $height3,$mime3) = getimagesize($filename3);
		$newwidth3 = 254;
		$newheight3 = 73;
		//echo image_type_to_mime_type(IMAGETYPE_BMP)."  ".IMAGETYPE_BMP;
		//exit();
		// Load
		$thumb3 = imagecreatetruecolor($newwidth3, $newheight3);
		switch($mime3)
		{
			case 1: $source3 = imagecreatefromgif($filename3);
					break;
			case 2: $source3 = imagecreatefromjpeg($filename3);
					break;
			case 3: $source3 = imagecreatefrompng($filename3);
					break;

			default : break;
		}
		// Resize
		imagecopyresampled($thumb3, $source3, 0, 0, 0, 0, $newwidth3, $newheight3, $width3, $height3);

		// Output
		switch($mime3)
		{
			case 1: imagegif($thumb3,$filename3,100);
					break;
			case 2: imagejpeg($thumb3,$filename3,100);
					break;
			case 3: imagepng($thumb3,$filename3,100);
					break;

			default : break;
		}

	}	

	
	//****************end*********	
header("Location: web_ourclients_view.php?q=add");

?>