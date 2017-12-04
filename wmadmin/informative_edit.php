<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$informativeid = (isset($_GET['informativeid']) and $_GET['informativeid'] != '' ) ?  $_GET['informativeid'] : 
 header("Location: informative_view.php?q=err");

$userQuery = "select * from informative where informativeid='$informativeid'";
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
<form name="memberform" action="informative_edit_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table align="center" class="table" style="width:700px;border:#33CCCC; border:double">
<thead>
<tr>
<th colspan="2">Add Admin Detail </th>
</tr>
</thead>
<tbody>

          <tr>
             <td  bgcolor="#FBFBFB">User Status </td>
             <td  bgcolor="#FBFBFB">
			 <input type="hidden" name="informativeid" value="<?php echo stripslashes($userRow['informativeid'])?>" />
			 <select name="status" class="style77">
              <option value="active" <?php if ($userRow['status']=="active") echo 'selected'?>>Active</option>
              <option value="inactive" <?php if ($userRow['status']=="inactive") echo 'selected'?>>Inactive</option>
            </select></td>
          </tr>
          <tr>
             <td  bgcolor="#FBFBFB">Heading*</td>
             <td  bgcolor="#FBFBFB"><input name="heading" type="text" value="<?php echo stripslashes($userRow['heading']); ?>"></td>
            </tr>
        
         <tr>
             <td  bgcolor="#FBFBFB">Position*</td>
             <td  bgcolor="#FBFBFB"><input type="text" name="numbering" value="<?php echo $userRow['numbering']; ?>" style="width:40px;"></td>
            </tr>
        
         <tr>
             <td  bgcolor="#FBFBFB">Priority*</td>
             <td  bgcolor="#FBFBFB"> <?php
			  	$priority = $userRow['priority'];
				if($priority==1)
				{
			  ?>
			  	<input type="checkbox" name="priority" checked="checked">
			  	&nbsp;<span class="style11">[if you do not wanted to show this Category on home page please click on checkbox.]</span>
			  <?php
			  	}elseif($priority==0)
				{
			  ?>
			  	<input type="checkbox" name="priority">
			  	&nbsp;<span class="style11">[if you wanted to show this Category on home page please click on checkbox.]</span>
				<?php
			  	}
			  ?></td>
            </tr>
        
<!--          <tr>
             <td  bgcolor="#FBFBFB">Image 
              (Passport sized) </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName" type="file" class="style77" />
              <br />
              [Image Width:120 Height:150; Type:JPG, GIF; Size:Up to 1 MB]</span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName']!='')
			  {
			?>
			<img src="../docs/informative/<?php echo stripslashes($userRow['imgName'])?>" width="120" height="150" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="120" height="150" border="0">
			<?php }?>
			</span></td>
          </tr>-->
        
          <tr>
             <td  bgcolor="#FBFBFB">Description</td>
             <td  bgcolor="#FBFBFB">&nbsp;</td>
             <tr><td bgcolor="#FBFBFB" colspan="2"> <?php
				function rteSafe($strText) {
					//returns safe code for preloading in the RTE
					$tmpString = $strText;
					
					//convert all types of single quotes
					$tmpString = str_replace(chr(145), chr(39), $tmpString);
					$tmpString = str_replace(chr(146), chr(39), $tmpString);
					$tmpString = str_replace("'", "&#39;", $tmpString);
					
					//convert all types of double quotes
					$tmpString = str_replace(chr(147), chr(34), $tmpString);
					$tmpString = str_replace(chr(148), chr(34), $tmpString);
				//	$tmpString = str_replace("\"", "\"", $tmpString);
					
					//replace carriage returns & line feeds
					$tmpString = str_replace(chr(10), " ", $tmpString);
					$tmpString = str_replace(chr(13), " ", $tmpString);
					
					return $tmpString;
				}
				?>
				
				<script>
				function submitForm() {
				
				
					//make sure hidden and iframe values are in sync for all rtes before submitting form
					updateRTEs();
					
					if (document.memberform.heading.value=="")
					{
						alert("Please select heading heading");
						document.memberform.heading.focus()  
						return false;
					}
					
					if (document.memberform.detail.value=="")
					{
						alert("Please select detail heading");
						document.memberform.detail.focus()  
						return false;
					}
					
						
					if(document.getElementById('memberform').submit())
					{
						return true;
					}											
					
				}
				initRTE("cbrte/images/", "cbrte/", "", true);
				</script>
				<noscript>
				<p><b>Javascript must be enabled to use this form.</b></p>
				</noscript>
				<script language="JavaScript" type="text/javascript">
				<!--
				//build new richTextEditor
				var rte1 = new richTextEditor('newsContent');
				
				rte1.html ='<?php echo rteSafe(stripslashes($userRow['detail']))?>';
				//enable all commands for demo
				rte1.cmdFormatBlock = true;
				rte1.cmdFontName = true;
				rte1.cmdFontSize = true;
				rte1.cmdIncreaseFontSize = true;
				rte1.cmdDecreaseFontSize = true;
				
				rte1.cmdBold = true;
				rte1.cmdItalic = true;
				rte1.cmdUnderline = true;
				rte1.cmdStrikethrough = true;
				rte1.cmdSuperscript = true;
				rte1.cmdSubscript = true;
				
				rte1.cmdJustifyLeft = true;
				rte1.cmdJustifyCenter = true;
				rte1.cmdJustifyRight = true;
				rte1.cmdJustifyFull = true;
				rte1.cmdInsertUnorderedList = true;
				
				rte1.cmdOutdent = true;
				rte1.cmdIndent = true;
				
				rte1.cmdInsertHorizontalRule = true;
				rte1.cmdInsertOrderedList = true;
				rte1.cmdForeColor = true;
				rte1.cmdHiliteColor = true;
				rte1.cmdInsertLink = true;
				rte1.cmdInsertImage = false;
				rte1.cmdInsertSpecialChars = true;
				rte1.cmdInsertTable = true;
				rte1.cmdSpellcheck = true;
				
				rte1.cmdCut = true;
				rte1.cmdCopy = true;
				rte1.cmdPaste = true;
				rte1.cmdUndo = true;
				rte1.cmdRedo = true;
				rte1.cmdRemoveFormat = true;
				rte1.cmdUnlink = true;
				
				rte1.toggleSrc = true;
				
				rte1.build();
				//-->
				</script>			</td>
             <td  bgcolor="#FBFBFB">&nbsp;</td>
          </tr>
          
          <!--  <tr>
            <td width="265" bgcolor="#FBFBFB">Title</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Add_title" type="text" value="<?php echo stripslashes($userRow['Add_title'])?>" style="width:300px;" id="title" />
			</td>
          </tr>
          
            <tr>
            <td width="265" bgcolor="#FBFBFB">Key Words</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Key_word" type="text" value="<?php echo stripslashes($userRow['Key_word'])?>" style="width:300px;" id="Key_word" />
			</td>
          </tr>
           <tr>
            <td width="265" bgcolor="#FBFBFB">Description</td>
             <td width="423" bgcolor="#FBFBFB"><textarea name="Description" rows="4" cols="30"><?php echo stripslashes($userRow['Description'])?></textarea>			</td>
          </tr>-->
<tr>
   <td  bgcolor="#FBFBFB">&nbsp;</td>
   <td  bgcolor="#FBFBFB"><br />
<button  type="submit" onClick="return submitForm();"  class="btn btn-success">Update</button>
<button type="reset" class="btn btn-warning">Reset</button></td>
</tr>
</tbody>
</table>
</form></body>
</html>