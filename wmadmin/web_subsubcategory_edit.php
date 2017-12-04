<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$subsubcategoryid = (isset($_REQUEST['subsubcategoryid']) and $_REQUEST['subsubcategoryid'] != '' ) ?  $_REQUEST['subsubcategoryid'] :  header("Location: web_subsubcategory_view.php?q=err");


$productQuery = "select * from subsubcategory where subsubcategoryid = '$subsubcategoryid'";
				
$productQueryResult = $connectionObject->executeQuery($productQuery);
if(!$productQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_errno()." : failed to display Product";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}
$productRow = mysql_fetch_assoc($productQueryResult);
?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script src='../js/ajaxfunction.js'></script>
<html>
<title>Control Panel : Crown Hearware</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" id="memberform" action="web_subsubcategory_edit_inter.php" method="post" enctype="multipart/form-data">
  <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Website Management > View Sub Subcategory </th>
        </tr>
        <tr>
          <th align="right" valign="middle" scope="col"><a href="javascript:history.back();"><span class="style79">Back</span></a>&nbsp;</th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="3" align="left" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10"> Sub Subcategory Detail </strong></td>
            </tr>
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Select Category*</td>		  			   		  
              <td width="492" height="22" colspan="2" align="left" valign="middle" class="style77">
			  <select name="categoryid" class="style77" id="categoryid" onChange="geturlview('findsubcategory.php?categoryid='+this.value,'subcategory')" style="width:175px;">
			  <option value="">Select Category</option>
			  <?php
			  		$categoryid = $productRow['categoryid'];
					$catQry = "select categoryid, heading from category order by categoryid asc";
					$catQryResult = $connectionObject->executeQuery($catQry);
					if(!$catQryResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display category";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					while($catRow = mysql_fetch_array($catQryResult))
					{
			  ?>
			  		<option value="<?php echo $catRow['categoryid']; ?>" <?php if($catRow['categoryid']==$categoryid) echo "selected"; ?>><?php echo $catRow['heading']; ?></option>
					
			  <?php
			  		}
			  ?>
			  </select>			  </td>
            </tr>
            <tr>
              <td width="192" height="22" align="left" valign="middle" class="style77"> Select Subcategory*</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77">
			  <div id="divSubcategory">
			  <select name="subcategoryid" class="style77" id="subcategoryid" style="width:175px;">
			  <option value="">Select Subcategory</option>
			  	<?php
					//fetching the heading of subcategory
			  		$subcategoryid = $productRow['subcategoryid'];
					$subcatQry = "select subcategoryid, heading from subcategory where categoryid = '$categoryid' order by subcategoryid asc";
					$subcatResult = $connectionObject->executeQuery($subcatQry);
					if(!$subcatResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display heading";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					while($subcatRow = mysql_fetch_array($subcatResult))
					{
			  ?>	
			  		<option value="<?php echo $subcatRow['subcategoryid']; ?>" <?php if($subcatRow['subcategoryid']==$subcategoryid) echo "selected"; ?>><?php echo $subcatRow['heading']; ?></option>
			  <?php
			  		}
			  ?></select></div></td>
            </tr>
            <tr>
              <td height="22" align="left" valign="middle" class="style77"> Sub Subcategory Heading
			    <input type="hidden" name="subsubcategoryid" id="subsubcategoryid" value="<?php echo $productRow['subsubcategoryid']; ?>">			  </td>			  
              <td height="22" colspan="2" align="left" valign="middle" class="style77"><input name="heading" type="text" class="style77" id="heading" value="<?php echo stripslashes($productRow['heading'])?>" size="70" /></td>
            </tr>
		    			
             <tr>
              <td height="22" align="left" valign="middle" class="style77">Numbering</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style11"><input type="text" name="numbering" value="<?php echo $productRow['numbering']; ?>" style="width:40px;"></td>
            </tr> 
			
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Description/Detail</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style11">&nbsp;</td>
            </tr>
            <tr>
              <td height="22" colspan="3" align="left" valign="middle" class="style77">
			    <?php
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
					
					if (document.memberform.categoryid.value=="")
						{
							alert("Please select category");
							document.memberform.categoryid.focus()  
							return false;
						}
						if (document.memberform.subcategoryid.value=="")
						{
							alert("Please select sub category");
							document.memberform.subcategoryid.focus()  
							return false;
						}
					/*
					if (document.memberform.subcategoryid.value=="")
					{
						alert("Please select subcategory heading");
						document.memberform.subcategoryid.focus()  
						return false;
					}
					
					if(document.memberform.heading.value=="")
					{
						alert("Please enter Product heading");
						document.memberform.heading.focus();
						return false;
					}
					*/	
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
				
				rte1.html ='<?php echo rteSafe(stripslashes($productRow['detail']))?>';
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
              <td height="22" colspan="3" align="left" valign="top" class="style11">&nbsp;</td>
              </tr>
            
			           
            <tr>
              <td height="22" colspan="3" align="center" class="style777" ><input name="image" type="image" src="img/saveedit.jpg" onClick="return submitForm();" width="50" height="50" border="1" />
&nbsp;&nbsp; <a href="web_product_delete.php?subsubcategoryid=<?php echo stripslashes($productRow['subsubcategoryid']); ?>" title="delete" onClick="return deleteAlert(this);"><img src="img/delete.jpg"  width="50" height="50" border="0" /></a></td>
            </tr>
			<script language="javascript">
				function deleteAlert(service)
				{
					if(confirm("Really want to delete this Product?"))
					return true;
					else
					return false;
				}				
			</script>
            <tr>
              <td height="10" colspan="3" align="center" ></td>
            </tr>
          </table></th>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>