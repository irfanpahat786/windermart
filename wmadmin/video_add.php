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
<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>

<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">

<br>
<form name="memberform" action="video_add_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table width="80%" align="center" class="table" style="width:700px; border:#33CCCC; border:double">
<thead>
<tr>
<th colspan="2">Add Admin Detail  <?php 
		 if($_REQUEST['q']=='ext'){?>
        <font color="#FF0000"> <strong>"This record already exists please Try Again."</strong></font>
         <?php } ?> </th>
</tr>
</thead>
<tbody>
  <!-- <tr> 
       <td width="265" bgcolor="#FBFBFB">Select Category*</td>
   <td width="423" bgcolor="#FBFBFB"> <select name="category">
  <option value="Kitchen">Kitchen</option>
  <option value="Wardrobes">Wardrobes</option>
  <option value="Doors">Doors</option>
  <option value="Door Frames">Door Frames</option>
        <option value="Interior">Interior</option>
        <option value="Shuttering Plywood">Shuttering Plywood</option>
        <option value="Wooden Flooring">Wooden Flooring</option>
</select></td>
       </tr>  -->
 <tr>
            <td width="265" bgcolor="#FBFBFB">Agent Name</td>
             <td width="423" bgcolor="#FBFBFB"><input name="name" type="text" class="style77"  style="width:400px;" id="name" />
			</td>
          </tr>
		  <tr>
            <td width="265" bgcolor="#FBFBFB">Email</td>
             <td width="423" bgcolor="#FBFBFB"><input name="email" type="text" class="style77"  style="width:400px;" id="email" />
			</td>
          </tr>
		  <tr>
            <td width="265" bgcolor="#FBFBFB">Set Position</td>
             <td width="423" bgcolor="#FBFBFB"><input name="numbering" type="text" class="style77" size="6" id="numbering" />
			 </td>
          </tr>
		  <td width="265" bgcolor="#FBFBFB">Phone Number</td>
             <td width="423" bgcolor="#FBFBFB"><input name="phone" type="text" class="style77"  style="width:400px;" id="phone" />
			</td>
          </tr>
		<!--  <tr>
            <td width="265" bgcolor="#FBFBFB">Address</td>
             <td width="423" bgcolor="#FBFBFB"><input name="address" type="text" class="style77"  style="width:400px;" id="name" />
			</td>
          </tr> -->
		  
		  <!-- <tr>
            <td width="265" bgcolor="#FBFBFB">Priority</td>
             <td width="423" bgcolor="#FBFBFB"><input type="checkbox" name="priority" value="">&nbsp;<span class="style1">[if you wanted to show on home page please click on checkbox.]</span>
			 </td>
          </tr>
		   <tr>
            <td width="265" bgcolor="#FBFBFB">Status</td>
             <td width="423" bgcolor="#FBFBFB"><input type="radio" name="status" value="0" <?php //if($fetchRow['status']==0) echo "checked"; ?>>Show&nbsp; <input type="radio" name="status" value="1" <?php //if($fetchRow['status']==1) echo "checked"; ?>>
			 </td>
          </tr>-->
          <!--<tr>
            <td bgcolor="#FBFBFB">Images 
              (Images sized) </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName" type="file" class="style77" />
              <br />
            [Image Width:250 Height:250; Type:JPG, GIF; Size:Up to 1 MB]</span></td>
          </tr>-->
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
          
           <!--<tr>
            <td width="265" bgcolor="#FBFBFB">Heading</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Add_title" type="text" style="width:300px;" id="Add_title" />
			</td>
          </tr>-->
          
          <!-- <tr>
            <td width="265" bgcolor="#FBFBFB">Key Words</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Key_word" type="text" style="width:300px;" id="Key_word" />
			</td>
          </tr>
           <tr>
            <td width="265" bgcolor="#FBFBFB">Description</td>
             <td width="423" bgcolor="#FBFBFB"><textarea name="Description" rows="4" cols="30"></textarea>			</td>
          </tr>-->
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