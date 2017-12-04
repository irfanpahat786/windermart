<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

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
<title>Control Panel : Crown Hearware</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script language="javascript">
function SubmitForm()
{
  document.memberform1.action="web_manage_static.php?act=sch";
  document.memberform1.target="_self";
  document.memberform1.submit()
}
</script>
<body>
<br>
<table width="780" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="49%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Website Management > Manage Informative Pages</th>
        <th width="51%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 <form name="memberform1" action="web_mangage_static.php" method="post">
      <tr>
        <th height="33" colspan="2" align="left" valign="middle" class="style77" scope="col">
		  &nbsp;<span class="style10">Select Page</span>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;	          
		    <select name="staticpage" class="style77"  onChange="return SubmitForm();"> 
			   <option value="About Us" <?php if ($_REQUEST['staticpage']=="About Us") echo 'selected'?>>About Us</option>	
				<option value="Careers" <?php if ($_REQUEST['staticpage']=="Careers") echo 'selected'?>>Careers</option>	  
			   <option value="Contact Us" <?php if ($_REQUEST['staticpage']=="Contact Us") echo 'selected'?>>Contact Us</option>
			 </select>			
		</th>
      </tr>
	  </form>	  
	  <form name="memberform" action="web_manage_static_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="3" align="left" valign="middle" bgcolor="#FFFFFF" class="style10"><div style="margin:3px;"></div></td>
            </tr>
          <?php 
	            if ($_REQUEST['act']=='sch' or $_REQUEST['staticpage']!='')
				{
				  $staticpage = $_REQUEST['staticpage'];
				  
				  $userQuery = "select * from staticpage ";
				  if($status != '0')
					{
					 $userQuery = $userQuery . " " . " where staticpage='$staticpage' ";
					}
				}
				else
				{	 
			      $userQuery = "select * from staticpage where staticpage='About Us'";
				}
				//echo $userQuery;
				$userQueryResult = $connectionObject->executeQuery($userQuery);
				if(!$userQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display data";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }
    			
				$userRow = mysql_fetch_assoc($userQueryResult);
			?>
            <tr>
              <td align="left" valign="middle" class="style77"><strong>Page Heading</strong> 
			  <?php 
			   if ($_REQUEST['act']=='sch' or $_REQUEST['staticpage']!='')
				{
			  ?>
			  <input name="staticpageid" type="hidden" value="<?php echo $userRow['staticpageid']?>">
			  <input name="staticpage" type="hidden" value="<?php echo $_REQUEST['staticpage']?>">
			  <?php 
			    }else
			    {
			  ?>
			  <input name="staticpageid" type="hidden" value="<?php echo $userRow['staticpageid']; ?>">
			  <input name="staticpage" type="hidden" value="About Us">
			  <?php 
			    }
			  ?>			  </td>
              <td colspan="2" align="left" valign="middle" class="style77"><label>
                <input name="heading" type="text" class="style77" id="heading" size="70" value="<?php echo stripslashes($userRow['heading'])?>">
              </label></td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="style77">&nbsp;</td>
              <td colspan="2" align="center" valign="middle" class="style77">&nbsp;</td>
            </tr>
            <tr>
              <td align="left" valign="middle" class="style77" height="30"><strong>Page Description </strong></td>
              <td colspan="2" align="center" valign="middle" class="style77">&nbsp;</td>
            </tr>
            <tr>
              <td colspan="3" align="left" valign="middle" class="style77">
			        <?php 
					if ($_REQUEST['act']=='sch' or $_REQUEST['staticpage']!='' or $userRow['staticpageid']!='')
					{
					function rteSafe($strText) 
						{
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
						document.getElementById('memberform').submit();
						return true;
					}
					initRTE("cbrte/images/", "cbrte/", "", true);
					</script>
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
					
					rte1.cmdInsertHorizontalRule = true;
					rte1.cmdInsertOrderedList = true;
					rte1.cmdInsertUnorderedList = true;
					
					rte1.cmdOutdent = true;
					rte1.cmdIndent = true;
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
					</script>
					<?php 
					}else
					{
					?>
					<script>
					function submitForm() {
						//make sure hidden and iframe values are in sync for all rtes before submitting form
						updateRTEs();
						document.getElementById('memberform').submit();
						return true;
					}
					
					</script>
					<noscript>
					<p><b>Javascript must be enabled to use this form.</b></p>
					</noscript>
				    <script src="../js/rte.js"></script>
					<?php  
					 }
					?>					</td>
			  </tr>
            <tr>
              <td colspan="3" align="center" valign="middle" class="style77">&nbsp;</td>
            </tr>
            <tr>
              <td width="18%" align="left" valign="middle" class="style77"><div style="margin:3px;"><span class="style777">Page Image</span></div></td>
              <td width="42%" align="left" valign="middle" class="style77"><span style="margin:3px;"><span class="style777">
                <input name="imgName" type="file" class="style77" />
              [W=309, H=150]</span></span></td>
              <td width="40%" align="left" valign="middle" class="style77"><span style="margin:3px;">
			  <?php
			    if($userRow['imgName']!='')
			    {
			  ?>
			  <img src="../docs/<?=$userRow['imgName']?>" border="0" width="100" height="76"/>
			  <?php
			    } 
			  ?>
			  </span></td>
            </tr>          
          <tr>
            <td colspan="3" align="center" valign="top" class="style77">&nbsp;</td>
          </tr>
		  <?php 
		   if($userRow['staticpageid']!='')
		   {
		  ?>
          <tr>
            <td colspan="3" align="center" valign="top" class="style77"><span class="style777">
              <input name="image" type="image" src="img/saveedit.jpg" width="50" height="50" border="1" onClick="return submitForm();"/>
            </span></td>
          </tr>
		  <?php 
		   }else
		   {
		  ?>
		  <tr>
            <td colspan="3" align="center" valign="top" class="style77"><span class="style777">
              <input name="submit"   type="submit" class="style77"  value=' Add ' onClick="return submitForm();" />
              <input name="submit"   type="reset" class="style77"  value='Reset' />
            </span></td>
          </tr>
		  <?php 
		   }
		  ?>
        </table></th>
      </tr>
	  </form>
      <tr>
        <th colspan="2" align="center" valign="top" class="style77" scope="col">&nbsp;</th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>