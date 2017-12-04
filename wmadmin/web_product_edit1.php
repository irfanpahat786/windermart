<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);



$id = (isset($_REQUEST['id']) and $_REQUEST['id'] != '' ) ?  $_REQUEST['id'] :  header("Location: web_product_view.php?q=err");
//cho $id;


$productQuery = "select * from agent where id = '$id'";
				
$productQueryResult = $connectionObject->executeQuery($productQuery);
if(!$productQueryResult)
{ // if query failed to execute then print error msg
	$errorMsg = mysql_errno()." : failed to display Product";
	echo $errorMsg;
	//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
	exit();
}
$productRow = mysql_fetch_assoc($productQueryResult);

//$categoryid=$productRow['categoryid'];
//$subcategoryid=$productRow['subcategoryid'];
//$subsubcategoryid=$productRow['subsubcategoryid'];

                  
?>
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script src='../js/ajaxfunction.js'></script>
<html>
<title>Control Panel : Odisha Holidays</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>

  <table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Website Management > View Agent </th>
        </tr>
        <tr>
          <th align="right" valign="middle" scope="col"><a href="javascript:history.back();"><span class="style79">Back</span></a>&nbsp;</th>
        </tr>
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="3" align="left" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10"> Agent </strong></td>
            </tr>
			<form name="memberform1" id="memberform1" action="web_product_edit.php?id=<?php echo $id;?>" method="post">
           <!-- <tr>
              <td height="22" align="left" valign="middle" class="style77"> Category*  </td>		  			   		  
              <td height="22" colspan="2" align="left" valign="middle" class="style77">
			  <select name="categoryid" class="style77" id="categoryid" onChange="this.form.submit();">
			  <option value="" selected="selected">Select Category</option>
			  <?php
			  /*  $catid=$_REQUEST['categoryid'];
				$catid  = $_REQUEST['categoryid'];
				  if ($catid=='')
				  {
					$catid = $categoryid;
				  }
			  	$categoryQuery = "select categoryid, heading from category order by categoryid asc";
				$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);
				if(!$categoryQueryResult)
  				{
					echo mysql_error()." Error: failed to display category data";
					exit();
  				}
				while($categoryRow = mysql_fetch_assoc($categoryQueryResult))
				{*/
			  ?>
			  		<option value="<?php //echo $categoryRow['categoryid']; ?>" <?php //if ($categoryRow['categoryid']==$catid) echo 'selected';?>><?php //echo $categoryRow['heading']; ?></option>
              <?php
			  	//}
			  ?>            
              </select>		  </td>
            </tr>-->
			</form>
			
			<form name="memberform2" id="memberform2" action="web_product_edit.php?id=<?php echo $id;?>" method="post">
           <!-- <tr>
              <td width="117" height="22" align="left" valign="middle" class="style77"> Subcategory</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77">
			  <?php
			 /* $catid  = $_REQUEST['categoryid'];
				  if ($catid=='')
				  {
					$catid = $categoryid;
				  }
			  $subcatid  = $_REQUEST['subcategoryid'];
				  if ($subcatid=='')
				  {
					$subcatid = $subcategoryid;
				  }*/
			  ?>
			  <div id="divSubcategory">
			  <select name="subcategoryid" class="style77" id="subcategoryid" style="width:175px;" onChange="this.form.submit();" >
			  	<option value="" <?php if ($subcatid=='') echo 'selected';?>>Select Subcategory</option>   
				<?php
				/*$subcategoryQuery = "select subcategoryid, heading from subcategory where categoryid='$catid' order by subcategoryid asc";
				$subcategoryQueryResult = $connectionObject->executeQuery($subcategoryQuery);
				if(!$subcategoryQueryResult)
  				{
					echo mysql_error()." Error: failed to display sub category data";
					exit();
  				}
				while($subcategoryRow = mysql_fetch_assoc($subcategoryQueryResult))
				{*/
				?>
				<option value="<?php //echo $subcategoryRow['subcategoryid']; ?>" <?php //if ($subcategoryRow['subcategoryid']==$subcatid) echo 'selected';?>><?php //echo $subcategoryRow['heading']; ?></option>
              <?php
			  	//}
			  ?>            
              </select>	-->
			  <input name="categoryid" type="hidden" value="<?php echo $catid;?>">
			 <!-- </div></td>
            </tr>-->
			</form>
			
			<form name="memberform" id="memberform" action="web_product_edit_inter.php" method="post" enctype="multipart/form-data">
         
       	
             
             <tr>
             
             <td height="22" align="left" valign="middle" class="style77"> Agent Name</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77"><input name="heading" type="text" class="style77" id="heading" value="<?php echo stripslashes($productRow['Name'])?>" size="50" /></td>
            </tr>
			  <tr>
              <td height="22" align="left" valign="middle" class="style77">Email</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77"><input name="Email" type="text" class="style77" value="<?php echo $productRow['Email']; ?>" size="50"> 
              </td>
            </tr>
		   <!-- <tr>
              <td height="22" align="left" valign="middle" class="style77">Password</td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77"><input name="price" type="text" class="style77" value="<?php echo $productRow['Password']; ?>"> 
              </td>
            </tr>-->
			<tr>
              <td height="22" align="left" valign="middle" class="style77">Numbering</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input type="text" name="numbering" value="<?php echo $productRow['numbering']; ?>" style="width:40px;"></td>
            </tr>			
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Phone Number </td>
              <td height="22" colspan="2" align="left" valign="middle" class="style77"><input name="Phone" type="text" class="style77" id="Phone" value="<?php echo $productRow['Phone']; ?>" pattern="[0-9]{10}" size="10" /></td>
            </tr>
                
                
           
            			
            <tr>
              <td height="22" align="left" valign="middle" class="style77">Address</td>
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
					
					/*if (document.memberform.categoryid.value=="")
					{
						alert("Please select category heading");
						document.memberform.categoryid.focus()  
						return false;
					}*/
					/*
                    if (document.memberform.heading.value=="")
					{
						alert("Please enter product name");
						document.memberform.heading.focus()  
						return false;
					}
					
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
				//
				</script>			  </td>
              </tr>           
            <tr>
              <td height="22" colspan="3" align="left" valign="top" class="style11">&nbsp;</td>
              </tr>
        
            <tr>
              <td height="22" colspan="3" align="center" class="style777" ><input name="submit" type="submit" value="Update" onClick="return submitForm();"  />
</td>
            </tr>
			<script language="javascript">
				function deleteAlert(service)
				{
					if(confirm("Really want to delete this Agent?"))
					return true;
					else
					return false;
				}				
			</script>
            <tr>
              <td height="10" colspan="3" align="center" ></td>
            </tr>
			</form>
          </table></th>
        </tr>
      </table></td>
    </tr>
  </table>

</body>
</html>