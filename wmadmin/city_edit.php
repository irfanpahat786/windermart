<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$cityid = (isset($_GET['cityid']) and $_GET['cityid'] != '' ) ?  $_GET['cityid'] :  header("Location: city_view.php?q=err");

$userQuery = "select * from city where cityid='$cityid'";
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
<form name="memberform" action="city_edit_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table align="center" class="table" style="width:700px; border:#33CCCC; border:double">
<thead>
<tr>
<th colspan="2">Add Admin Detail </th>
</tr>
</thead>
<tbody>

          <tr>
             <td  bgcolor="#FBFBFB">User Status </td>
             <td  bgcolor="#FBFBFB">
			 <input type="hidden" name="cityid" value="<?php echo stripslashes($userRow['cityid'])?>" />
			 <select name="status" class="style77">
              <option value="active" <?php if ($userRow['status']=="active") echo 'selected'?>>Active</option>
              <option value="inactive" <?php if ($userRow['status']=="inactive") echo 'selected'?>>Inactive</option>
            </select></td>
          </tr>
          <tr>
             <td  bgcolor="#FBFBFB">Hotel/Resort Name*</td>
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
        
          <tr>
             <td  bgcolor="#FBFBFB">Image 
             </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName" type="file" class="style77" value="<?php echo stripslashes($userRow['imgName'])?>" />
              <br />
             </span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName']!='')
			  {
			?>
			<img src="../docs/<?php echo stripslashes($userRow['imgName'])?>" width="80" height="80" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="80" height="80" border="0">
			<?php }?>
			</span></td>
          </tr>
        
    
    
     <tr>
             <td  bgcolor="#FBFBFB">Image 2
             </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName2" type="file" class="style77" value="<?php echo stripslashes($userRow['imgName2'])?>" />
              <br />
             </span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName2']!='')
			  {
			?>
			<img src="../docs/<?php echo stripslashes($userRow['imgName2'])?>" width="80" height="80" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="80" height="80" border="0">
			<?php }?>
			</span></td>
          </tr>
    
    
    
    
    
     <tr>
             <td  bgcolor="#FBFBFB">Image 3
             </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName3" type="file" class="style77" value="<?php echo stripslashes($userRow['imgName3'])?>"/>
              <br />
             </span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName3']!='')
			  {
			?>
			<img src="../docs/<?php echo stripslashes($userRow['imgName3'])?>" width="80" height="80" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="80" height="80" border="0">
			<?php }?>
			</span></td>
          </tr>
    
    
    
     <tr>
             <td  bgcolor="#FBFBFB">Image 4
             </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName4" type="file" class="style77" value="<?php echo stripslashes($userRow['imgName4'])?>" />
              <br />
             </span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName4']!='')
			  {
			?>
			<img src="../docs/<?php echo stripslashes($userRow['imgName4'])?>" width="80" height="80" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="80" height="80" border="0">
			<?php }?>
			</span></td>
          </tr>
    
    
     <tr>
             <td  bgcolor="#FBFBFB">Image 5 
             </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input name="imgName5" type="file" class="style77" value="<?php echo stripslashes($userRow['imgName5'])?>"/>
              <br />
             </span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 if ($userRow['imgName5']!='')
			  {
			?>
			<img src="../docs/<?php echo stripslashes($userRow['imgName5'])?>" width="80" height="80" border="0"/>
			<?php
			  }else
			  {
			?>
			<img src="img/img_not_available2.jpg" width="80" height="80" border="0">
			<?php }?>
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
            <td width="265" bgcolor="#FBFBFB">Total Price</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Add_title" type="text" value="<?php echo stripslashes($userRow['Add_title'])?>" style="width:300px;" id="title" />
			</td>
          </tr>
    
    <tr>
            <td width="265" bgcolor="#FBFBFB">Price per Person</td>
             <td width="423" bgcolor="#FBFBFB"><input name="priceperson" type="text" value="<?php echo stripslashes($userRow['priceperson'])?>" style="width:300px;" id="Add_title" />
			</td>
          </tr>
          
            <tr>
            <td width="265" bgcolor="#FBFBFB">Duration</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Key_word" type="text" value="<?php echo stripslashes($userRow['Key_word'])?>" style="width:300px;" id="Key_word" />
			</td>
          </tr>
            <tr>
            <td width="265" bgcolor="#FBFBFB">Rating</td>
             <td width="423" bgcolor="#FBFBFB">
                 <input type="radio" name="Description" value="One Star" <?php if($userRow['Description']=='One Star') echo "checked"; ?>>One Star&nbsp; <input type="radio" name="Description" value="Two Star" <?php if($userRow['Description']=='Two Star') echo "checked"; ?>>Two Star&nbsp; <input type="radio" name="Description" value="Three Star" <?php if($userRow['Description']=='Three Star') echo "checked"; ?>>Three Star&nbsp; <input type="radio" name="Description" value="Four Star" <?php if($userRow['Description']=='Four Star') echo "checked"; ?>>Four Star&nbsp; <input type="radio" name="Description" value="Five Star" <?php if($userRow['Description']=='Five Star') echo "checked"; ?>>Five Star
			 </td>
          </tr>
    
    <tr>
            <td width="265" bgcolor="#FBFBFB">City Name</td>
 <td  bgcolor="#FBFBFB"><input name="PetAllowed" type="text" value="<?php echo stripslashes($userRow['PetAllowed']); ?>"></td>
            <!-- <td width="423" bgcolor="#FBFBFB">
                 <?php
                 if($userRow['PetAllowed']=='' || $userRow['PetAllowed']==NULL)
                 {
    
                     ?>
                                        <label>
                                            <input type="checkbox" name="PetAllowed" value="PetAllowed">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Pet allowed
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 ?>
                                        <label>
                                            <input type="checkbox" name="PetAllowed" value="PetAllowed" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Pet allowed
                                        </label>
                 <?php
                     
                 }
                 
                 ?>
                 
                  <?php
                 if($userRow['FitnessCentre']=='' || $userRow['FitnessCentre']==NULL)
                 {
    
                     ?>
                                        <label>
                                            <input type="checkbox" name="FitnessCentre" value="FitnessCentre">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Fitness Centre
                                        </label>
                   <?php
                     
                 }
                 else
                 {
                 ?>
                 <label>
                                            <input type="checkbox" name="FitnessCentre" value="FitnessCentre" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Fitness Centre
                                        </label>
                 <?php
                 }
                ?>
                 
                 
                 
                 <?php
                 if($userRow['Restaurant']=='' || $userRow['Restaurant']==NULL)
                 {
    
                     ?>
                                         <label>
                                            <input type="checkbox" name="Restaurant" value="Restaurant">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Restaurant
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 
                 ?>
                 <label>
                                            <input type="checkbox" name="Restaurant" value="Restaurant" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Restaurant
                                        </label>
                 <?php
                     
                 }
                 
                 ?>
                 
                 <?php
                 if($userRow['TourGuide']=='' || $userRow['TourGuide']==NULL)
                 {
    
                     ?>
                          
                 
                                        <label>
                                            <input type="checkbox" name="TourGuide" value="TourGuide">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Tour Guides
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 ?>
                   <label>
                                            <input type="checkbox" name="TourGuide" value="TourGuide" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Tour Guides
                                        </label>
                 <?php
                     
                 }
                 
                 ?>
                  <?php
                 if($userRow['GroupAllowed']=='' || $userRow['GroupAllowed']==NULL)
                 {
    
                     ?>
                          
                                        <label>
                                            <input type="checkbox" name="GroupAllowed" value="GroupAllowed">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Group Allowed
                                        </label>
                 <?php
                 }
                 else
                 {
                 ?>
                      <label>
                                            <input type="checkbox" name="GroupAllowed" value="GroupAllowed" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                            Group Allowed
                                        </label>
                 <?php
                     
                 }
                 
                 ?>
                 
                 <?php
                 if($userRow['Parking']=='' || $userRow['Parking']==NULL)
                 {
    
                     ?>
                         
                                        <label>
                                            <input type="checkbox" name="Parking" value="Parking">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Parking
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 
                 ?>
                 
                   <label>
                                            <input type="checkbox" name="Parking" value="Parking" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Parking
                                        </label>
                 
                 <?php
                     
                 }
                 
                 ?>
                 
                  <?php
                 if($userRow['TV']=='' || $userRow['TV']==NULL)
                 {
    
                     ?>
                         
                                        <label>
                                            <input type="checkbox" name="TV" value="TV">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           TV
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 
                 ?>
                 
                   <label>
                                            <input type="checkbox" name="TV" value="TV" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           TV
                                        </label>
                 
                 <?php
                     
                 }
                 
                 ?>
                 
                 
                 
                 
                 
                 
                 
                  <?php
                 if($userRow['SwimmingPool']=='' || $userRow['SwimmingPool']==NULL)
                 {
    
                     ?>
                         
                                        <label>
                                            <input type="checkbox" name="Swimming" value="Swimming Pool">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Swimming Pool
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 
                 ?>
                 
                   <label>
                                            <input type="checkbox" name="Swimming" value="Swimming Pool" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Swimming Pool
                                        </label>
                 
                 <?php
                     
                 }
                 
                 ?>
                 
                 
                 
                 
                 <?php
                 if($userRow['FreeWiFi']=='' || $userRow['FreeWiFi']==NULL)
                 {
    
                     ?>
                         
                                        <label>
                                            <input type="checkbox" name="Freewifi" value="Free Wifi">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                          Free WiFi
                                        </label>
                 <?php
                     
                 }
                 else
                 {
                 
                 ?>
                 
                   <label>
                                            <input type="checkbox" name="Freewifi" value="Free Wifi" checked="checked">
                                            <span class="cr"><i class="cr-icon glyphicon glyphicon-ok"></i></span>
                                           Free WiFi
                                        </label>
                 
                 <?php
                     
                 }
                 
                 ?>
                 
                 
                 
                 
                 
                 
                 
        </td>-->
    
    
    </tr>
    
    
    
    
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