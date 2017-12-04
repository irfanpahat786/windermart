<?php
ob_start();
//session_start();
//include_once("login_check_hd.php");
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$productid = (isset($_REQUEST['productid']) and $_REQUEST['productid'] != '' ) ?  $_REQUEST['productid'] :  header("Location: web_product_view.php?q=err");

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

$heading = (mysql_escape_string($_POST['heading']) != '')?mysql_escape_string($_POST['heading']):'';
$newsContent = (mysql_escape_string($_POST['newsContent']) != '') ? mysql_escape_string($_POST['newsContent']):'';
//$newsContent2 = (mysql_escape_string($_POST['newsContent2']) != '') ? mysql_escape_string($_POST['newsContent2']):'';
//$newsContent3 = (mysql_escape_string($_POST['newsContent3']) != '') ? mysql_escape_string($_POST['newsContent3']):'';

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


$Add_title = $_REQUEST['Add_title'];
$Key_word = $_REQUEST['Key_word'];
$Description = $_REQUEST['Description'];
$product_id = $_REQUEST['product_id'];

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

$numbering = trim($_REQUEST['numbering']);
if($numbering=='')
{
	$numbering = 0;
}

$imgName = '';
$is_imgName = 0;
if(isset($_FILES['imgName']) && $_FILES['imgName']['name'] !='')
{
	$mTmpDir = $_FILES['imgName']['tmp_name'];
	$temp = explode(".", $_FILES["imgName"]["name"]);
	$time=time();
    $imgName= round(mt_rand(5, 20)) .$time. '.' . end($temp);
	//$imgName=time()."_".$_FILES['imgName']['name'];
	$is_imgName = 1;
	
	$imgPath = "../productImage/small/".$imgName;
	if(move_uploaded_file($_FILES['imgName']['tmp_name'],$imgPath)){
    //$qur_update = "UPDATE mindstar_order SET destreport='$destFile', reportmessage='$messageweb' WHERE order_id='$orderid'";
    //$res_update = mysql_query($qur_update) or die(mysql_error());
    }else
    {
	    echo "failed to upload the file";
    }/*
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath))
	{
		die("enable to copy image");
	}
	
	$imgPath = "../productImage/small/".$imgName;
	if(!copy($_FILES['imgName']['tmp_name'],$imgPath))
	{
		die("enable to copy image");
	}*/	

}

$imgName2 = '';
$is_imgName2 = 0;
if(isset($_FILES['imgName2']) && $_FILES['imgName2']['name'] !='')
{
	$mTmpDir2 = $_FILES['imgNam2']['tmp_name'];
	$temp = explode(".", $_FILES["imgName2"]["name"]);
	$time=time();
    $imgName2 = round(mt_rand(5, 20)).$time . '.' . end($temp);
	//$imgName2=time()."_".$_FILES['imgName2']['name'];
	$is_imgName2 = 1;
	
	$imgPath2 = "../productImage/small/".$imgName2;
	if(move_uploaded_file($_FILES['imgName2']['tmp_name'],$imgPath2)){
    //$qur_update = "UPDATE mindstar_order SET destreport='$destFile', reportmessage='$messageweb' WHERE order_id='$orderid'";
    //$res_update = mysql_query($qur_update) or die(mysql_error());
    }else
    {
	    echo "failed to upload the file";
    }/*
	if(!copy($_FILES['imgName2']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	
	$imgPath2 = "../productImage/small/".$imgName2;
	if(!copy($_FILES['imgName2']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}*/

}
$imgName3 = '';
$is_imgName3 = 0;
if(isset($_FILES['imgName3']) && $_FILES['imgName3']['name'] !='')
{
	$mTmpDir3 = $_FILES['imgName3']['tmp_name'];
	$temp = explode(".", $_FILES["imgName3"]["name"]);
	$time=time();
    $imgName3 = round(mt_rand(5, 20)) .$time. '.' . end($temp);
	//$imgName3=time()."_".$_FILES['imgName3']['name'];
	$is_imgName3 = 1;
	
	$imgPath3 = "../productImage/small/".$imgName3;
	//move_uploaded_file($_FILES['imgName3'][''])
	if(move_uploaded_file($_FILES['imgName3']['tmp_name'],$imgPath3)){
    //$qur_update = "UPDATE mindstar_order SET destreport='$destFile', reportmessage='$messageweb' WHERE order_id='$orderid'";
    //$res_update = mysql_query($qur_update) or die(mysql_error());
    }else
    {
	    echo "failed to upload the file";
    }
	/*if(!copy($_FILES['imgName3']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}
	
	$imgPath3 = "../productImage/small/".$imgName3;
	if(!copy($_FILES['imgName3']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}*/	

}



/*
$imgName3 = '';
$is_imgName3 = 0;
if(isset($_FILES['imgName3']) && $_FILES['imgName3']['name'] !='')
{
	$mTmpDir = $_FILES['imgName3']['tmp_name'];
	$imgName3=time()."_".$_FILES['imgName3']['name'];
	$is_imgName3 = 1;
	
	$imgPath2 = "../productImage/thumb/$imgName3";
	if(!copy($_FILES['imgName3']['tmp_name'],$imgPath2))
	{
		die("enable to copy image");
	}
	$imgPath3 = "../productImage/small/$imgName3";
	if(!copy($_FILES['imgName3']['tmp_name'],$imgPath3))
	{
		die("enable to copy image");
	}

}
*/




/*if($is_imgName!='') //changing Product image (if Product image change)
{
	$productQry = "update product set categoryid='$categoryid', subcategoryid = '$subcategoryid', subsubcategoryid = '$subsubcategoryid', heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent',imgName='$imgName', URL='$URL',Add_title='$Add_title',Key_word='$Key_word', status = '$status',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics',Description='$Description',product_id='$product_id', modifydate = '".date("Y-m-d")."' where productid='$productid'";	
}
elseif($is_imgName2!='') 
{
	$productQry = "update product set categoryid='$categoryid', subcategoryid = '$subcategoryid', subsubcategoryid = '$subsubcategoryid',heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent', imgName2='$imgName2', status = '$status',URL='$URL',Add_title='$Add_title',Key_word='$Key_word',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics', Description='$Description',product_id='$product_id', modifydate = '".date("Y-m-d")."' where productid='$productid'";
}
elseif($is_imgName3!='') 
{
	$productQry = "update product set categoryid='$categoryid', subcategoryid = '$subcategoryid', subsubcategoryid = '$subsubcategoryid',heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent', imgName3='$imgName3', fileUpload='$destFile', status = '$status',URL='$URL',Add_title='$Add_title',Key_word='$Key_word',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics', Description='$Description',product_id='$product_id', modifydate = '".date("Y-m-d")."' where productid='$productid'";
	//exit();
}else
{
   $productQry = "update product set categoryid='$categoryid', subcategoryid = '$subcategoryid', subsubcategoryid = '$subsubcategoryid',heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent', URL='$URL',Add_title='$Add_title',Key_word='$Key_word', status = '$status',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics',Description='$Description',product_id='$product_id', modifydate = '".date("Y-m-d")."' where productid='$productid'";	
}*/
if($is_imgName!='' ||$is_imgName2!='' ||$is_imgName3!='') //changing Product image (if Product image change)
{
	$productQry = "update product set categoryid='$categoryid', subcategoryid = '$subcategoryid', subsubcategoryid = '$subsubcategoryid', heading ='$heading', price = '$price', priority = '$priority', numbering = '$numbering', detail = '$newsContent',imgName='$imgName',imgName2='$imgName2',imgName3='$imgName3', URL='$URL',Add_title='$Add_title',Key_word='$Key_word', status = '$status',imageheading='$imageheading',imageheading1='$imageheading1',imageheading2='$imageheading2',carriermaterial = '$carriermaterial',   surface = '$surface',   look = '$look',   design = '$design',  basiccolour = '$basiccolour',  patterncolour = '$patterncolour', dimensions = '$dimensions', salesunit = '$salesunit',patternrepeat = '$patternrepeat',grammage = '$grammage',characteristics = '$characteristics',Description='$Description',product_id='$product_id', modifydate = '".date("Y-m-d")."' where productid='$productid'";	
}

$productQryResult = $connectionObject->executeQuery($productQry);
//exit();
if(!$productQryResult)
{
	echo mysql_error()." Error: consult your administrator";
	exit();
}



	//****************end*********	
	//*****************
header("Location: web_product_view.php?q=edt");
?>