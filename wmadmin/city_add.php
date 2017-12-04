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
<form name="memberform" action="city_add_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table align="center" class="table" style="width:700px; border:#33CCCC; border:double">
<thead>
<tr>
<th colspan="2">Add Admin Detail  <?php 
		 if($_REQUEST['q']=='ext'){?>
        <font color="#FF0000"> <strong>"This record already exists please Try Again."</strong></font>
         <?php } ?> </th>
</tr>
</thead>
<tbody>
 <tr>
            <td width="265" bgcolor="#FBFBFB">Hotel Name*</td>
             <td width="423" bgcolor="#FBFBFB"><input name="heading" type="text" class="style77" id="heading" />
			</td>
          </tr>
		  <tr>
            <td width="265" bgcolor="#FBFBFB">Set Position</td>
             <td width="423" bgcolor="#FBFBFB"><input name="numbering" type="text" class="style77" size="6" id="numbering" />
			 </td>
          </tr>
		  
		   <tr>
            <td width="265" bgcolor="#FBFBFB">Priority</td>
             <td width="423" bgcolor="#FBFBFB"><input type="checkbox" name="priority" value="">&nbsp;<span class="style1">[if you wanted to show on home page please click on checkbox.]</span>
			 </td>
          </tr>
		   <tr>
            <td width="265" bgcolor="#FBFBFB">Status</td>
             <td width="423" bgcolor="#FBFBFB"><input type="radio" name="status" value="0" <?php if($fetchRow['status']==0) echo "checked"; ?>>Show&nbsp; <input type="radio" name="status" value="1" <?php if($fetchRow['status']==1) echo "checked"; ?>>
			 </td>
          </tr>
           <tr>
            <td bgcolor="#FBFBFB">Image 1
               </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName" type="file" class="style77" />
              <br />
           </span></td>
          </tr>
    <tr>
            <td bgcolor="#FBFBFB">Image 2
               </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName2" type="file" class="style77" />
              <br />
           </span></td>
          </tr>
    <tr>
            <td bgcolor="#FBFBFB">Image 3
               </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName3" type="file" class="style77" />
              <br />
           </span></td>
          </tr>
    <tr>
            <td bgcolor="#FBFBFB">Image 4
               </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName4" type="file" class="style77" />
              <br />
           </span></td>
          </tr>
    <tr>
            <td bgcolor="#FBFBFB">Image 5
               </td>
            <td bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName5" type="file" class="style77" />
              <br />
           </span></td>
          </tr>
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
			
				</script>			</td>
             <td  bgcolor="#FBFBFB">&nbsp;</td>
          </tr>
          
           <tr>
            <td width="265" bgcolor="#FBFBFB">Price</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Add_title" type="text" style="width:300px;" id="Add_title" />
			</td>
          </tr>
		  
		  <tr>
            <td width="265" bgcolor="#FBFBFB">Price per Person</td>
             <td width="423" bgcolor="#FBFBFB"><input name="priceperson" type="text" style="width:300px;" id="Add_title" />
			</td>
          </tr>

          
           <tr>
            <td width="265" bgcolor="#FBFBFB">Duration</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Key_word" type="text" style="width:300px;" id="Key_word" />
			</td>
          </tr>
           <tr>
            <td width="265" bgcolor="#FBFBFB">Rating</td>
             <td width="423" bgcolor="#FBFBFB">
                 <input type="radio" name="Description" value="One Star" <?php if($fetchRow['status']=='One Star') echo "checked"; ?>>One Star&nbsp; <input type="radio" name="Description" value="Two Star" <?php if($fetchRow['status']=='Two Star') echo "checked"; ?>>Two Star&nbsp; <input type="radio" name="Description" value="Three Star" <?php if($fetchRow['status']=='Three Star') echo "checked"; ?>>Three Star&nbsp; <input type="radio" name="Description" value="Four Star" <?php if($fetchRow['status']=='Four Star') echo "checked"; ?>>Four Star&nbsp; <input type="radio" name="Description" value="Five Star" <?php if($fetchRow['status']=='Five Star') echo "checked"; ?>>Five Star
			 </td>
          </tr>
    <tr>
    <tr>
            <td width="265" bgcolor="#FBFBFB">City Name</td>
<td width="423" bgcolor="#FBFBFB"><input name="PetAllowed" type="text" style="width:300px;" id="PetAllowed" />
			</td>
             <!--<td width="423" bgcolor="#FBFBFB">
                                        <label>
                                            <input type="checkbox" name="PetAllowed" value="PetAllowed">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Pet allowed
                                        </label>
                 <label>
                                            <input type="checkbox" name="FitnessCentre" value="FitnessCentre">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Fitness Centre
                                        </label>
                 <label>
                                            <input type="checkbox"name="Restaurant" value="Restaurant">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Restaurant
                                        </label>
                 <label>
                                            <input type="checkbox" name="TourGuide" value="TourGuide">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Tour Guides
                                        </label><label>
                                            <input type="checkbox" name="GroupAllowed" value="GroupAllowed">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Group Allowed
                                        </label>
                 <label>
                                            <input type="checkbox" name="Parking" value="Parking">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Parking
                                        </label>
                  <label>
                                            <input type="checkbox" name="TV" value="TV">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           TV
                                        </label>
                  <label>
                                            <input type="checkbox" name="Swimmimg" value="Swimmimg Pool">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Swimming Pool
                                        </label>
                  <label>
                                            <input type="checkbox" name="Freewifi" value="Free Wifi">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Free WiFi
                                        </label>
        </td>-->
    
    
    </tr>
    
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