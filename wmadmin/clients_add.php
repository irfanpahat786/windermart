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
   <!-- <td align="left" valign="top" scope="col"><?php include("header.php");?></td>-->
  </tr>
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
         <!-- <td align="left" valign="top" width="20%" class="grayfour" height="460px"><?php include("menu.php");?>
          </td>-->
          <td align="left" valign="top"  class="grayfour"> 
          <table width="100%" border="0" cellpadding="2" cellspacing="2">
<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
include_once("../PhpIncludes/php_functions.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

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
<head>
<script language="javascript">
   function SubmitForm()
   {
   
   	if(document.memberform.categoryid.value=="")
	{
		alert("please select the package category");
		document.memberform.categoryid.focus()
		return false;
	}
	document.memberform.action="web_gallery_add.php";
	document.memberform.target="_self";
	document.memberform.submit() 
	
	//document.memberform2.categoryid.value=document.memberform.categoryid.value;
   }
</script>
<script language="JavaScript">
		
    function checkbox(mid) {
	
     
   			
			if( document.getElementById(mid).style.display=='none' ){
   				document.getElementById(mid).style.display = '';
 				}else{
 
  				 document.getElementById(mid).style.display = 'none';
 			}	
     
		
        
        }
	
	function getprice(){
	
		var p = 	document.getElementById('price').value;
			
		document.getElementById('o_price').value = p -  (p * document.getElementById('o_percent').value)/100;
			
	
	}
</script>

<html>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" action="clients_add_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table align="center" class="table" style="width:700px; border:#33CCCC; border:double">
<thead>
<tr>
<th colspan="2" align="left">Add Agent Detail  <?php 
		 if($_REQUEST['q']=='ext'){?>
        <font color="#FF0000"> <strong>"This record already exists please Try Again."</strong></font>
         <?php } ?> </th>
</tr>
</thead>
<tbody>
<!-- <tr>
            <td width="265" bgcolor="#FBFBFB">Select Property *</td>
             <td width="423" bgcolor="#FBFBFB"><select name="projectsid" class="style77" id="projectsid">
              <option value="">Select Property </option>
              <?php 
			    $countryQuery = "select projectsid, heading, numbering from projects order by numbering asc";				
				$countryQueryResult = $connectionObject->executeQuery($countryQuery);
				if(!$countryQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display product country";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }    			
				while($countryRow = mysql_fetch_assoc($countryQueryResult))
				{
			 ?>
              <option value="<?php echo $countryRow['projectsid']?>"><?php echo $countryRow['heading']?></option>
              <?php
			  }
		     ?>
              
            </select>  
			</td>
          </tr>-->
          
          
          <tr>
            <td width="265" bgcolor="#FBFBFB">Agent Name</td>
             <td width="423" bgcolor="#FBFBFB"><input name="name" type="text" class="style77" id="name" />
			</td>
          </tr>
		  <tr>
            <td width="265" bgcolor="#FBFBFB">Numbering</td>
             <td width="423" bgcolor="#FBFBFB"><input name="numbering" type="text" class="style77" size="6" id="numbering" />
			 </td>
          </tr>
     <tr>
            <td width="265" bgcolor="#FBFBFB">Email</td>
             <td width="423" bgcolor="#FBFBFB"><input name="email" type="text" class="style77" id="email" />
			</td>
          </tr>
     <tr>
            <td width="265" bgcolor="#FBFBFB">Phone</td>
             <td width="423" bgcolor="#FBFBFB"><input name="phone" type="text" class="style77" id="phone" />
			</td>
          </tr>
     <tr>
             <td  bgcolor="#FBFBFB">Address</td>
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
		  
		  <!-- <tr>
            <td width="265" bgcolor="#FBFBFB">Priority</td>
             <td width="423" bgcolor="#FBFBFB"><input type="checkbox" name="priority" value="">&nbsp;<span class="style1">[if you wanted to show on home page please click on checkbox.]</span>
			 </td>
          </tr>-->
		   <!--<tr>
            <td width="265" bgcolor="#FBFBFB">Status</td>
             <td width="423" bgcolor="#FBFBFB"><input type="radio" name="status" value="0" <?php if($fetchRow['status']==0) echo "checked"; ?>>Show&nbsp; <input type="radio" name="status" value="1" <?php if($fetchRow['status']==1) echo "checked"; ?>>
			 </td>
          </tr>
          <tr>
            <td bgcolor="#FBFBFB">Images 
              (Images sized) </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName" type="file" class="style77" />
              <br />
            [Image Width:250 Height:250; Type:JPG, GIF; Size:Up to 1 MB]</span></td>
          </tr>
         -->
          <tr>
            <td colspan="2" bgcolor="#FBFBFB">
			
			
			</td>
            </tr>
<tr>
  <td>&nbsp;</td>
  <td><br />
<button  type="submit"  class="btn btn-success" onClick="return submitForm();">Add</button>
<button type="reset" class="btn btn-warning">Reset</button></td>
</tr>
</tbody>
</table>
</form>
</body>
</html>