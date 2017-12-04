<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$Add_title = $_REQUEST['Add_title'];
$Key_word = (mysql_escape_string($_REQUEST['Key_word']) != '')?mysql_escape_string($_REQUEST['Key_word']):'';
$Description = (mysql_escape_string($_REQUEST['Description']) != '')?mysql_escape_string($_REQUEST['Description']):'';
$hotdealid = (isset($_REQUEST['hotdealid']) and $_REQUEST['hotdealid'] != '' ) ?  $_REQUEST['hotdealid'] :  header("Location: hotdeal_view.php?q=err");
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

if(isset($_REQUEST['status']))
{
	$status = active;
}else{
	$status = inactive;
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
$is_imgName = 0;
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

 $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';






if ($is_imgName!='0') 
{
$adminQuery = "update hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',price='$price',imgName='$imgName',Add_title='$Add_title' where hotdealid='$hotdealid'";
}
elseif ($is_imgName2!='0') 
{
$adminQuery = "update hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',price='$price',imgName2='$imgName2',Add_title='$Add_title' where hotdealid='$hotdealid'";
}
elseif ($is_imgName3!='0') 
{
$adminQuery = "update hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',price='$price',imgName3='$imgName3',Add_title='$Add_title' where hotdealid='$hotdealid'";
}
elseif ($is_imgName4!='0') 
{
$adminQuery = "update hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',price='$price',imgName4='$imgName4',Add_title='$Add_title' where hotdealid='$hotdealid'";
}
else
{
$adminQuery = "update hotdeals set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status',price='$price', detail ='$detail',Add_title='$Add_title' where hotdealid='$hotdealid'";
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
		


}		

if($is_imgName2 == 1)
{
// main Image upload

$imgPath2 = "../gallery_images/hotdeals/$imgName2";
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






header("Location:  hotdeal_view.php?q=edt");

?>