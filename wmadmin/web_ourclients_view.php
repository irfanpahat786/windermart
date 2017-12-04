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
<body onload="document.getElementById('myArea1').focus()" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
 
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
         
          <td align="left" valign="top"  class="grayfour"><table width="100%" border="0" cellpadding="2" cellspacing="2">
<?php
error_reporting(0);
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
include_once("../PhpIncludes/php_functions.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

?>
<html>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">

    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="45%" height="25" align="left" valign="middle" bgcolor="#999999" class="style2" scope="col">&nbsp;&nbsp;Website Management > View All Registrations </th>
        <th width="55%" align="left" valign="middle" bgcolor="#999999" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
         <!-- <tr>
            <td height="22" colspan="5" align="right" valign="middle" class="style11"><a href="web_ourclients_add.php"><font color="#FF0000">Add New Gallery Image </font></a>&nbsp;&nbsp;</td>
            </tr>-->
          <tr>
		    <td width="10%" align="left" valign="left" bgcolor="#999999" class="style10"> Name </td>
			<td width="15%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Email</td>
              <td width="15%" height="22" align="middle" valign="middle" bgcolor="#999999" class="style10">Phone Number</td>
              <td width="15%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Password</td>
              <td width="45%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Address</td>
           <!-- <td width="25%" height="22" align="center" valign="middle" bgcolor="#999999" class="style10">Action</td>-->
          </tr>
          <?php
			    $ourclientsQuery = "select * from  login";
				//echo $newsQuery;
				$ourclientsQueryResult = $connectionObject->executeQuery($ourclientsQuery);
				if(!$ourclientsQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display ourclients";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }
    			
				while($ourclientsRow = mysql_fetch_assoc($ourclientsQueryResult))
				{
				$id = $ourclientsRow['id'];
				 
					$ourclientsQry = "select * from login where id = '$id'";
					$ourclientsQryResult = $connectionObject->executeQuery($ourclientsQry);
					if(!$ourclientsQryResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display ourclients";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$ourclientsQryRow = mysql_fetch_assoc($ourclientsQryResult);
					
					 
			
			 ?>
            <tr>
			<!-- <td align="left" class="style77" valign="middle"><img src="../testimonial_images/<?php echo $ourclientsRow['imgName']; ?>" width="150" height="85"></td>-->
             
             
			   <td width="10%" align="left" valign="middle" class="style77"><div style="margin:1px;"><?php echo stripslashes($ourclientsRow['Name'])?></div></td>
                <td width="15%" align="left" valign="middle" class="style77"><div style="margin:1px;"><?php echo stripslashes($ourclientsRow['Email'])?></div></td>
                <td width="20%" align="middle" valign="middle" class="style77"><div style="margin:1px;"><?php echo stripslashes($ourclientsRow['Phone'])?></div></td>
                <td width="10%" align="left" valign="middle" class="style77"><div style="margin:1px;"><?php echo stripslashes($ourclientsRow['Password'])?></div></td>
                <td width="40%" align="left" valign="middle" class="style77"><div style="margin:1px;"><?php echo stripslashes($ourclientsRow['Address'])?></div></td>
              <!-- <td align="center" valign="middle" class="style77"><div style="margin:3px;"><a href="web_ourclients_edit.php?ourclientsid=<?php echo stripslashes($ourclientsRow['ourclientsid'])?>">Edit</a>|&nbsp;
<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="web_ourclients_delete.php?ourclientsid=<?php echo stripslashes($ourclientsRow['ourclientsid']);?>" onClick="return checkfields(this);">Delete</a></div></td>-->
            </tr>
          <tr>
            
          <?php
			 }
		  ?>
          <tr>
            <td align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
		  
        </table></th>
      </tr>
     <!-- <tr>
        <th colspan="4" align="right" valign="top" class="style77" scope="col"><a href="web_ourclients_add.php"><font color="#FF0000">Add New Gallery Image 
        </font></a>&nbsp;&nbsp;</th>
      </tr>-->
    </table></td>
  </tr>
</table>
</body>
</html>