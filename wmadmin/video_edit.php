<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$videoid = (isset($_GET['videoid']) and $_GET['videoid'] != '' ) ?  $_GET['videoid'] :  header("Location: video_view.php?q=err");

$userQuery = "select * from video where videoid='$videoid'";
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

<html>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<form name="memberform" action="video_edit_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
<table align="center" class="table" style="width:700px;">
<thead>
<tr>
<th colspan="2">Add Admin Detail </th>
</tr>
</thead>
<tbody>

          <!--<tr>
             <td  bgcolor="#FBFBFB">User Status </td>
             <td  bgcolor="#FBFBFB">
			 <input type="hidden" name="videoid" value="<?php //echo stripslashes($userRow['videoid'])?>" />
			 <select name="status" class="style77">
              <option value="active" <?php //if ($userRow['status']=="active") echo 'selected'?>>Active</option>
              <option value="inactive" <?php //if ($userRow['status']=="inactive") echo 'selected'?>>Inactive</option>
            </select></td>
          </tr>-->
          <tr>
             <td  bgcolor="#FBFBFB">Video Link*</td>
             <td  bgcolor="#FBFBFB"><input name="heading" type="text" value="<?php echo stripslashes($userRow['heading']); ?>"></td>
            </tr>
        
         <tr>
             <td  bgcolor="#FBFBFB">Position*</td>
             <td  bgcolor="#FBFBFB"><input type="text" name="numbering" value="<?php echo $userRow['numbering']; ?>" style="width:40px;"></td>
            </tr>
            
        
         <!--<tr>
             <td  bgcolor="#FBFBFB">Priority*</td>
             <td  bgcolor="#FBFBFB"> <?php
			  	//$priority = $userRow['priority'];
				//if($priority==1)
				//{
			  ?>
			  	<input type="checkbox" name="priority" checked="checked">
			  	&nbsp;<span class="style11">[if you do not wanted to show this Category on home page please click on checkbox.]</span>
			  <?php
			  //	}elseif($priority==0)
				//{
			  ?>
			  	<input type="checkbox" name="priority">
			  	&nbsp;<span class="style11">[if you wanted to show this Category on home page please click on checkbox.]</span>
				<?php
			  //	}
			  ?></td>
            </tr>-->
        
         <!-- <tr>
             <td  bgcolor="#FBFBFB">Image 
              (Passport sized) </td>
             <td  bgcolor="#FBFBFB"><span class="style777">
              <input type="file" name="imgName" />
              <br />
              [Image Width:120 Height:150; Type:JPG, GIF; Size:Up to 1 MB]</span></td>
            <td rowspan="3" align="center" valign="top" class="style77"><span style="margin:3px;">
			<?php 
			 ///if ($userRow['imgName']!='')
			  {
			?>
			<img src="../video_images/<?php //echo stripslashes($userRow['imgName'])?>" width="120" height="150" border="0"/>
			<?php
			 // }else
			 // {
			?>
			<img src="img/img_not_available2.jpg" width="120" height="150" border="0">
			<?php }?>
			</span></td>
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