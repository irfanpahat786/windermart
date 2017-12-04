<?php
ob_start();
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);


$Add_title = $_REQUEST['Add_title'];
$Key_word = (mysql_escape_string($_REQUEST['Key_word']) != '')?mysql_escape_string($_REQUEST['Key_word']):'';
$Description = (mysql_escape_string($_REQUEST['Description']) != '')?mysql_escape_string($_REQUEST['Description']):'';
$testimonialsid = (isset($_REQUEST['testimonialsid']) and $_REQUEST['testimonialsid'] != '' ) ?  $_REQUEST['testimonialsid'] :  header("Location: testimonial_view.php?q=err");
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




 $detail = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';




if ($imagename=='') 
{
$adminQuery = "update testimonials set heading = '$heading', numbering = '$numbering', priority = '$priority', detail ='$detail' where testimonialsid='$testimonialsid'";
}
else if ($imagename!='') 
{
$adminQuery = "update testimonials set heading = '$heading', numbering = '$numbering', priority = '$priority',  detail ='$detail',imgName='$imagename'where testimonialsid='$testimonialsid'";
}
else
{
$adminQuery = "update testimonials set heading = '$heading', numbering = '$numbering', priority = '$priority',detail ='$detail',imgName='$imagename' where testimonialsid='$testimonialsid'";
}
//echo $adminQuery;
//exit();
$adminQueryResult = $connectionObject->executeQuery($adminQuery);

if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
			 

header("Location:  testimonial_view.php?q=edt");

?>