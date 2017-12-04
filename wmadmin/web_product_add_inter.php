<?php
ob_start();
//session_start();
//include_once("login_check_hd.php");
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


$categoryid = (mysql_escape_string($_REQUEST['categoryid']) != '')?mysql_escape_string($_REQUEST['categoryid']):'';
$subcategoryid = (mysql_escape_string($_REQUEST['subcategoryid']) != '')?mysql_escape_string($_REQUEST['subcategoryid']):'';
if($subcategoryid=='')
{
	$subcategoryid=0;
}

$subsubcategoryid = (mysql_escape_string($_REQUEST['subsubcategoryid']) != '')?mysql_escape_string($_REQUEST['subsubcategoryid']):'';
if($subsubcategoryid=='')
{
	$subsubcategoryid=0;
}
$heading = (mysql_escape_string($_REQUEST['heading']) != '')?mysql_escape_string($_REQUEST['heading']):'';
$newsContent = (mysql_escape_string($_REQUEST['newsContent']) != '') ? mysql_escape_string($_REQUEST['newsContent']):'';
//$newsContent2 = (mysql_escape_string($_REQUEST['newsContent2']) != '') ? mysql_escape_string($_REQUEST['newsContent2']):'';
//$newsContent3 = (mysql_escape_string($_REQUEST['newsContent3']) != '') ? mysql_escape_string($_REQUEST['newsContent3']):'';
$Add_title = $_REQUEST['Add_title'];
$Key_word = $_REQUEST['Key_word'];
$Description = $_REQUEST['Description'];

$URL = (mysql_escape_string($_REQUEST['URL']) != '')?mysql_escape_string($_REQUEST['URL']):'';

$price = (mysql_escape_string($_REQUEST['price']) != '') ? mysql_escape_string($_REQUEST['price']):'';

$imageheading = (mysql_escape_string($_REQUEST['imageheading']) != '') ? mysql_escape_string($_REQUEST['imageheading']):'';

$imageheading1 = (mysql_escape_string($_REQUEST['imageheading1']) != '') ? mysql_escape_string($_REQUEST['imageheading1']):'';

$imageheading2 = (mysql_escape_string($_REQUEST['imageheading2']) != '') ? mysql_escape_string($_REQUEST['imageheading2']):'';




$carriermaterial = (mysql_escape_string($_REQUEST['carriermaterial']) != '') ? mysql_escape_string($_REQUEST['carriermaterial']):'';

$surface = (mysql_escape_string($_REQUEST['surface']) != '') ? mysql_escape_string($_REQUEST['surface']):'';

$look = (mysql_escape_string($_REQUEST['look']) != '') ? mysql_escape_string($_REQUEST['look']):'';

$design = (mysql_escape_string($_REQUEST['design']) != '') ? mysql_escape_string($_REQUEST['design']):'';

$basiccolour = (mysql_escape_string($_REQUEST['basiccolour']) != '') ? mysql_escape_string($_REQUEST['basiccolour']):'';

$patterncolour = (mysql_escape_string($_REQUEST['patterncolour']) != '') ? mysql_escape_string($_REQUEST['patterncolour']):'';

$dimensions = (mysql_escape_string($_REQUEST['dimensions']) != '') ? mysql_escape_string($_REQUEST['dimensions']):'';

$salesunit = (mysql_escape_string($_REQUEST['salesunit']) != '') ? mysql_escape_string($_REQUEST['salesunit']):'';

$patternrepeat = (mysql_escape_string($_REQUEST['patternrepeat']) != '') ? mysql_escape_string($_REQUEST['patternrepeat']):'';

$grammage = (mysql_escape_string($_REQUEST['grammage']) != '') ? mysql_escape_string($_REQUEST['grammage']):'';

$characteristics = (mysql_escape_string($_REQUEST['characteristics']) != '') ? mysql_escape_string($_REQUEST['characteristics']):'';





$product_id = $_REQUEST['product_id'];
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

$fileName=$_FILES['fileUpload']['name'];
if($fileName!='')
{
	//File Size
	$filesize1=$_FILES["fileUpload"]["size"]/(1024*1024);
	if($filesize1 > 2)
	{
		error_message ("You can upload maximum of 2 MB file! ");
	}
	//File Type
	$fileType = $_FILES['fileUpload']['type'];
	// The name of the temporary copy of the file stored on the server
	$fileTemp = $_FILES['fileUpload']['tmp_name'];
	// The error code resulting from the file upload
	$fileError = $_FILES['fileUpload']['error'];
	$destFile = time().$fileName;
}

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
	
	$imgPath2 = "../productImage/thumb/$imgName";
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	
	$imgPath3 = "../productImage/small/$imgName";
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}	

}

$imgName2 = '';
$is_imgName2 = 0;
if(isset($_FILES['imgName2']) && $_FILES['imgName2']['name'] !='')
{
	$mTmpDir2 = $_FILES['imgNam2']['tmp_name'];
	$imgName2=time()."_".$_FILES['imgName2']['name'];
	$is_imgName2 = 1;
	
	$imgPath2 = "../productImage/thumb/$imgName2";
	if(!copy($_FILES['imgName2']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	
	$imgPath3 = "../productImage/small/$imgName";
	if(!copy($_FILES['imgName2']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}

}
$imgName3 = '';
$is_imgName3 = 0;
if(isset($_FILES['imgName3']) && $_FILES['imgName3']['name'] !='')
{
	$mTmpDir3 = $_FILES['imgName3']['tmp_name'];
	$imgName3=time()."_".$_FILES['imgName3']['name'];
	$is_imgName3 = 1;
	
	$imgPath2 = "../productImage/thumb/$imgName3";
	if(!copy($_FILES['imgName3']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	
	$imgPath3 = "../productImage/small/$imgName";
	if(!copy($_FILES['imgName3']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}	

}
$imgName4 = '';
$is_imgName4 = 0;
if(isset($_FILES['imgName4']) && $_FILES['imgName4']['name'] !='')
{
	$mTmpDir4 = $_FILES['imgName4']['tmp_name'];
	$imgName4=time()."_".$_FILES['imgName4']['name'];
	$is_imgName4 = 1;
	
	/*$imgPath2 = "../productImage/thumb/$imgName4";
	if(!copy($_FILES['imgName4']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	
	$imgPath3 = "../productImage/small/$imgName4";
	if(!copy($_FILES['imgName4']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}	*/

}

$productQuery = "insert into product set categoryid='$categoryid', heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent', imgName = '$imgName', imgName2 = '$imgName2', imgName3 = '$imgName3', imgName4 = '$imgName4',  carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design4',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics', status = 'active',fileUpload='$destFile',URL='$URL',Add_title='$Add_title',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',Key_word='$Key_word',Description='$Description',product_id='$product_id', createdate = '".date("Y-m-d")."' ";
//echo $serviceQuery."<br>";
//exit();	
$productQueryResult = $connectionObject->executeQuery($productQuery);
if(!$productQueryResult)
{
echo mysql_error()." Error: consult your administrator";
exit();
}

/////uploading file///////

$destLoc = '../productImage/'.$destFile;
if(move_uploaded_file($_FILES['fileUpload']['tmp_name'],$destLoc)){
//$qur_update = "UPDATE mindstar_order SET destreport='$destFile', reportmessage='$messageweb' WHERE order_id='$orderid'";
//$res_update = mysql_query($qur_update) or die(mysql_error());
}else
{
	echo "failed to upload the file";
}

/////******* uploading large image********/////// 
/*
if($is_imgName == 1)
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
		$newwidth = 825;
		$newheight = 408;
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

//********** **************** start of image resizing second image ****************//
	//uploading thumbnail of large image	
	/*if($is_imgName2 == 1)
{
		// main Image upload

		$imgPath = "../productImage/large/$imgName2";
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
		$newwidth = 825;
		$newheight = 408;
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
	//********* *********** end of second image resizing **************//	
	
	
	//uploading small image of thumbnail image
	/*if($is_imgName3 == 1)
{
		// main Image upload

		$imgPath = "../productImage/large/$imgName3";
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
		$newwidth = 825;
		$newheight = 408;
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

} */

	//****************end*********	
header("Location: web_product_view.php?q=add");
?>