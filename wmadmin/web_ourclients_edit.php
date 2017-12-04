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
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$ourclientsid = (isset($_REQUEST['ourclientsid']) and $_REQUEST['ourclientsid'] != '' ) ?  $_REQUEST['ourclientsid'] :  header("Location: web_ourclients_view.php?q=err");

$ourclientsQuery = "select * from  ourclients where ourclientsid='$ourclientsid'";
//echo $testimonialsQuery;
$ourclientsQueryResult = $connectionObject->executeQuery($ourclientsQuery);
if(!$ourclientsQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_errno()." : failed to display ourclients ";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}
$ourclientsRow = mysql_fetch_assoc($ourclientsQueryResult);
?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>

<html>
<title>Control Panel : </title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style80 {color: #999999}
-->
</style>
<body>
<br>
<form name="memberform" id="memberform" action="web_ourclients_edit_inter.php" method="post" enctype="multipart/form-data">
  <table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th height="25" align="left" valign="middle" bgcolor="#999999" class="style2 style80" scope="col">&nbsp;Website Management > View/Edit/Delete Useful Detail </th>
        </tr>
        <tr>
          <th align="right" valign="middle" scope="col"><a href="javascript:history.back();"><span class="style79">Back</span></a>&nbsp;</th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" bgcolor="#999999" class="style777"><strong class="style10"> Detail </strong></td>
            </tr>
            <!--<tr>
              <td width="236" height="22" align="left" valign="middle" class="style77">  URL 
                <input type="hidden" name="ourclientsid" id="ourclientsid" value="<?php echo $ourclientsRow['ourclientsid']; ?>"></td>			  
              <td width="448" height="22" align="left" valign="middle" class="style77">			  	
                	<input name="heading" type="text" class="style77" value="<?php echo stripslashes($ourclientsRow['url']); ?>" size="50";>             	  </td>
            </tr>
			
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Heading</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style11"><input type="text" name="numbering" value="<?php echo $ourclientsRow['heading']; ?>" size="50";></td>
            </tr>  
			-->
			 		
            
            
            <tr>
              <td height="22" align="left" valign="top" class="style77">Upload Image <br>              <br /></td>
              <td width="448" height="22" align="left" valign="top" class="style77"><input name="imgName" type="file" class="style77">
                <br>
                <span class="style1"></span> </td>
              <td width="194" align="center" valign="top" class="style77"><span class="style777"><img src="../testimonial_images/<?php echo $ourclientsRow['imgName']; ?>" border="1" class="style8" width="100" height="97"/></span></td>
            </tr> 
       
            <tr>
              <td height="22" colspan="3" align="left" valign="middle" class="style77"><!--
				//build new richTextEditor
				var rte1 = new richTextEditor('newsContent');
				
				rte1.html ='
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
				</script>			  </td>
              </tr>   
            <tr>
              <td height="22" colspan="2" align="center" class="style777" ><input name="imgName" type="image" src="img/saveedit.jpg" onClick="return submitForm();" width="50" height="50" border="1" />
&nbsp;&nbsp;<a href="web_ourclients_delete.php?ourclientsid=<?php echo stripslashes($ourclientsRow['ourclientsid'])?>" title="delete"><img src="img/delete.jpg"  width="50" height="50" border="0" /></a> </td>
            </tr>			
            <tr>
              <td height="10" colspan="2" align="center" ></td>
            </tr>
          </table></th>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>