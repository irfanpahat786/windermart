<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$categoryid = (isset($_GET['id']) and $_GET['id'] != '' ) ?  $_GET['id'] : 
 header("Location: web_category_edit.php?q=err");

$userQuery = "select * from category  where id='$categoryid'";
$userQueryResult = $connectionObject->executeQuery($userQuery);
   if(!$userQueryResult)
	{ // if query failed to execute then print error msg
	  $errorMsg = mysql_errno()." : failed to display user";
	  echo $errorMsg;
	  //header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	  exit();
    }
	$userRow = mysql_fetch_assoc($userQueryResult);
				
?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>


<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrative Console</title>
<link href="../css/admincss.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
</head>
<!--<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
<link href="ckeditor/sample.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" language="JavaScript">
	function validate()
	{
	
	if(document.addfrm.heading.value=="")
		{
		
		alert('Enter The Heading');
		document.addfrm.heading.focus();
		return false;
		}
		
		
	}

 </script>
<body onLoad="document.getElementById('myArea1').focus()" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
          
          <td align="left" valign="top"  class="grayfour">
          <table width="100%" border="0" cellpadding="2" cellspacing="2">
		


<html>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
	<form name="memberform" action="web_category_edit_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
		<table align="center" class="table" style="width:700px;border:#33CCCC; border:double">
			<thead>
				<tr>
					<th colspan="2">Edit  Category Detail </th>
				</tr>
			</thead>
		<tbody>
		
				 
			   <tr>
				 <td  bgcolor="#FBFBFB">Category Name*</td>
				 <td  bgcolor="#FBFBFB">
				 <input class="form-control" size="48" name="cat_name" type="text" value="<?php echo stripslashes($userRow['cat_name']);?>" style="height:40px; border-radius: 10px;">
				 </td>
				</tr>
				<tr>
				 <td  bgcolor="#FBFBFB">Category Icon*</td>
				 <td  bgcolor="#FBFBFB"><img src="../icon/<?php echo stripslashes($userRow['icon']);?>" height="100" width="100" /><br />
				 <input class="form-control" size="48" name="icon" type="file" value="<?php echo stripslashes($userRow['cat_name']);?>" style="height:40px; border-radius: 10px;">
				 </td>
				</tr>
			   <tr>
				 <td width="265" bgcolor="#FBFBFB">Description</td>
				 <td width="423" bgcolor="#FBFBFB">
				 <textarea name="description" id="editor1" rows="15" cols="50" style=" border-radius: 10px;"><?php echo stripslashes($userRow['description'])?></textarea>
				 </td>
			  </tr>
				<tr>
				   <td  bgcolor="#FBFBFB">&nbsp;</td>
				   <td  bgcolor="#FBFBFB"><br />
					<button  type="submit" onClick="return submitForm();" name="update" class="btn btn-success">Update</button>
					<input type="hidden" name="id" value="<?php echo stripslashes($userRow['id'])?>" />
				 </td>
				</tr>
		</tbody>
		</table>
	</form>
<script>
            CKEDITOR.replace( 'editor1' );
			
</script>
		</body>
</html>