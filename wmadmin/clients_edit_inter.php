<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


/*$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
	
	$imgPath2 = "../productImage/thumb/$imgName";
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath2))
	{
		die("unable to copy image");
	}	
	
	$imgPath3 = "../productImage/small/$imgName";
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath3))
	{
		die("unable to copy image");
	}	

}*/
$name = $_REQUEST['name'];
$email = (mysql_escape_string($_REQUEST['email']) != '')?mysql_escape_string($_REQUEST['email']):'';
$phone = (mysql_escape_string($_REQUEST['phone']) != '')?mysql_escape_string($_REQUEST['phone']):'';
$clientsid = $_POST['clientsid'];
?>
<script>
alert('<?php echo $clientsid; ?>');
</script>
<?php
//$address= (mysql_escape_string($_REQUEST['address']) != '')?mysql_escape_string($_REQUEST['address']):'';
//$projectsid = (isset($_REQUEST['projectsid']) and $_REQUEST['projectsid'] != '' ) ?  $_REQUEST['projectsid'] :  header("Location: projects_view.php?q=err");

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

/*if(isset($_REQUEST['status']))
{
	$status = active;
}else{
	$status = inactive;
}*/
//$status=$_REQUEST['status'];

 $address = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';




/*if ($is_imgName!='0') 
{*/
$adminQuery = "update clients set name = '$name',email = '$email', phone = '$phone', numbering = '$numbering', address = '$address' where clientsid='$clientsid'";
/*}
else
{
$adminQuery = "update clients set name = '$name',email = '$email',projectsid = '$projectsid',phone = '$phone', numbering = '$numbering', address = '$address', priority = '$priority', status = '$status', detail ='$detail',imgName='$imgName' where clientsid='$clientsid'";
}*/
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
		$newwidth = 243;
		$newheight = 95;
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
		$newwidth2 = 243;
		$newheight2 = 95;
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
		$newwidth3 = 194;
		$newheight3 = 148;
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
	
	
header("Location:  clients_view.php?q=edt");

?>