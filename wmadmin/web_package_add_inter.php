<?php

include_once("db.php");
//include_once("../PhpIncludes/database_connection.php");

//$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$heading = (mysql_escape_string($_REQUEST['name']) != '')?mysql_escape_string($_REQUEST['name']):'';
$description = (mysql_escape_string($_REQUEST['price1']) != '')?mysql_escape_string($_REQUEST['price1']):'';
$description2 = (mysql_escape_string($_REQUEST['price2']) != '')?mysql_escape_string($_REQUEST['price2']):'';
$description3= (mysql_escape_string($_REQUEST['price3']) != '')?mysql_escape_string($_REQUEST['price3']):'';
$detail1 = (mysql_escape_string($_REQUEST['detail1']) != '')?mysql_escape_string($_REQUEST['detail1']):'';
$detail2 = (mysql_escape_string($_REQUEST['detail2']) != '')?mysql_escape_string($_REQUEST['detail2']):'';
$detail3= (mysql_escape_string($_REQUEST['detail3']) != '')?mysql_escape_string($_REQUEST['detail3']):'';
//fetching service type for duplicacy checking
$catQuery = "select name from package where name = '$heading'";
$catQueryResult = ExecuteQueryResule($catQuery);

if(count($catQueryResult)>0)
		{ 
			$error="Sorry, this Package Name already exists in our database. Please try again with a different Name.";
			header("Location: Manage_package.php?q=add");
		}else
		{

			$categoryQuery = "insert into package(name,price1,price2,price3,detail1,detail2,detail3) values('$heading', '$description','$description2','$description3','$detail1','$detail2','$detail3')";
			$in=ExecuteQuery($categoryQuery);
			header("Location: Manage_package.php?q=add");
	}

/////******* uploading large image********/////// 
/*if($is_imgName == 1)
{
		// main Image upload

		$imgPath = "../productImage/large/$imgName";
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
		$newwidth = 288;
		$newheight = 278;
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
*/

	
	//uploading small image of thumbnail image
	/*if($is_imgName == 1)
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
		$newwidth = 288;
		$newheight = 278;
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

	}	*/
	//****************end*********	
//header("Location: web_category_view.php?q=add");

?>