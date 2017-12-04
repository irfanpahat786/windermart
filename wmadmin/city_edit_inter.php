<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

/*$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;

}*/

$petallowed = (mysql_escape_string($_REQUEST['PetAllowed']) != '')?mysql_escape_string($_REQUEST['PetAllowed']):'';
$FitnessCentre = (mysql_escape_string($_REQUEST['FitnessCentre']) != '')?mysql_escape_string($_REQUEST['FitnessCentre']):'';
$Restaurant = (mysql_escape_string($_REQUEST['Restaurant']) != '')?mysql_escape_string($_REQUEST['Restaurant']):'';
$Tourguides = (mysql_escape_string($_REQUEST['ToursGuide']) != '')?mysql_escape_string($_REQUEST['ToursGuide']):'';
$Groupallowed = (mysql_escape_string($_REQUEST['GroupAllowed']) != '')?mysql_escape_string($_REQUEST['GroupAllowed']):'';
$Parking = (mysql_escape_string($_REQUEST['Parking']) != '')?mysql_escape_string($_REQUEST['Parking']):'';



$TV = (mysql_escape_string($_REQUEST['TV']) != '')?mysql_escape_string($_REQUEST['TV']):'';
$Swimmimg = (mysql_escape_string($_REQUEST['Swimming']) != '')?mysql_escape_string($_REQUEST['Swimming']):'';
$Freewifi = (mysql_escape_string($_REQUEST['Freewifi']) != '')?mysql_escape_string($_REQUEST['Freewifi']):'';



$Add_title = $_REQUEST['Add_title'];
$Key_word = (mysql_escape_string($_REQUEST['Key_word']) != '')?mysql_escape_string($_REQUEST['Key_word']):'';
$Description = (mysql_escape_string($_REQUEST['Description']) != '')?mysql_escape_string($_REQUEST['Description']):'';
$cityid = (isset($_REQUEST['cityid']) and $_REQUEST['cityid'] != '' ) ?  $_REQUEST['cityid'] :  header("Location: city_view.php?q=err");
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

if(isset($_REQUEST['status']))
{
	$status = active;
}else{
	$status = inactive;
}
//$status=$_REQUEST['status'];


// First Image


$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;

}

// Second Image

$imgName2 = '';
$is_imgName2 = 0;
if(isset($_FILES['imgName2']) && $_FILES['imgName2']['name'] !='')
{
	$mTmpDir2 = $_FILES['imgName2']['tmp_name'];
	$imgName2=time()."_".$_FILES['imgName2']['name'];
	$is_imgName2 = 1;

}

// Third Image

$imgName3 = '';
$is_imgName3 = 0;
if(isset($_FILES['imgName3']) && $_FILES['imgName3']['name'] !='')
{
	$mTmpDir3 = $_FILES['imgName3']['tmp_name'];
	$imgName3=time()."_".$_FILES['imgName3']['name'];
	$is_imgName3 = 1;

}

// Forth Image

$imgName4 = '';
$is_imgName4 = 0;
if(isset($_FILES['imgName4']) && $_FILES['imgName4']['name'] !='')
{
	$mTmpDir4 = $_FILES['imgName4']['tmp_name'];
	$imgName4=time()."_".$_FILES['imgName4']['name'];
	$is_imgName4 = 1;

}

// Fifth Image

$imgName5 = '';
$is_imgName5 = 0;
if(isset($_FILES['imgName5']) && $_FILES['imgName5']['name'] !='')
{
	$mTmpDir5 = $_FILES['imgName5']['tmp_name'];
	$imgName5=time()."_".$_FILES['imgName5']['name'];
	$is_imgName5 = 1;

}

 $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';


if ($is_imgName!='0') 
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName='$imgName',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
}
elseif ($is_imgName2!='0') 
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName2='$imgName2',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
}
elseif ($is_imgName3!='0') 
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName3='$imgName3',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
}
elseif ($is_imgName4!='0') 
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName4='$imgName4',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
}

elseif ($is_imgName5!='0') 
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',imgName5='$imgName5',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
}
else
{
$adminQuery = "update city set heading = '$heading',Key_word = '$Key_word',Description = '$Description', numbering = '$numbering', priority = '$priority', status = '$status', detail ='$detail',PetAllowed='$petallowed',FitnessCentre='$FitnessCentre', Restaurant='$Restaurant', GroupAllowed= '$Groupallowed' , Parking= '$Parking' ,TV= '$TV' , SwimmingPool= '$Swimmimg' , FreeWiFi= '$Freewifi' ,Add_title='$Add_title' where cityid='$cityid'";
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

$imgPath = "../docs/$imgName";
	if(!move_uploaded_file($mTmpDir,$imgPath))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
}

if($is_imgName2 == 1)
{
// main Image upload

$imgPath2 = "../docs/$imgName2";
	if(!move_uploaded_file($mTmpDir2,$imgPath2))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
}


if($is_imgName3 == 1)
{
// main Image upload

$imgPath3 = "../docs/$imgName3";
	if(!move_uploaded_file($mTmpDir3,$imgPath3))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
}

if($is_imgName == 1)
{
// main Image upload

$imgPath4 = "../docs/$imgName4";
	if(!move_uploaded_file($mTmpDir4,$imgPath4))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
}

if($is_imgName5 == 1)
{
// main Image upload

$imgPath5 = "../docs/$imgName5";
	if(!move_uploaded_file($mTmpDir5,$imgPath5))
		{
			$error="Failed to upload image";
			// header("Location: ");
		}
		
}




header("Location:  city_view.php?q=edt");

?>