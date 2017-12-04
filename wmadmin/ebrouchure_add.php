<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Administrative Console</title>
<link href="../css/admincss.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">

</head>

<body>
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

<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">

<br>
<form name="memberform" action="ebrouchure_add_inter.php" enctype="multipart/form-data" method="post" onSubmit="return validation();">
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
 
                <!--<tr>
                <td height="22" align="left" valign="middle" class="style77"> Projects* </td>
                <td height="22" colspan="1" align="left" valign="middle" class="style77">
                <select name="projectsid" class="style77" id="projectsid" style="width:220px;">
                <option value="">Select Projects</option>
                <?php 
                $locationQuery = "select projectsid, heading, numbering from projects order by numbering asc";				
                $locationQueryResult = $connectionObject->executeQuery($locationQuery);
                if(!$locationQueryResult)
                { // if query failed to execute then print error msg
                $errorMsg = mysql_errno()." : failed to display product location";
                echo $errorMsg;
                //header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
                exit();
                }    			
                while($locationRow = mysql_fetch_assoc($locationQueryResult))
                {
                ?>
                <option value="<?php echo $locationRow['projectsid']?>"><?php echo $locationRow['heading']?></option>
                <?php
                }
                ?>
                </select>
                </td>
                </tr>    -->
 <tr>
            <td width="265" bgcolor="#FBFBFB">Heading*</td>
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
         <!-- <tr>
            <td bgcolor="#FBFBFB">Images 
              (Images sized) </td>
            <td bgcolor="#FBFBFB"><span class="style777">
             <input name="ufile" type="file" id="ufile" size="35" />
              <br />
            [Image Width:250 Height:250; Type:JPG, GIF; Size:Up to 1 MB]</span></td>
          </tr>-->
         <!-- <tr>
            <td bgcolor="#FBFBFB" colspan="2">Description</td>
			</tr>
			<tr>
            <td bgcolor="#FBFBFB" colspan="2">   
			<script>
					function submitForm() {					
						//make sure hidden and iframe values are in sync for all rtes before submitting form
						updateRTEs();
										
						
						document.getElementById('memberform2').submit();
						return true;
					}
					
					</script>
					<noscript>
					<p><b>Javascript must be enabled to use this form.</b></p>
					</noscript>
				  <script src="js/rte.js"></script>		</td>
          </tr>-->
          
           <tr>
            <td width="265" bgcolor="#FBFBFB">Upload File</td>
             <td width="423" bgcolor="#FBFBFB"><input type="file" name="filepdf" /> <br />
 [File Type:DOC, PDF, Size:Up to 8 MB]
			</td>
         <!-- </tr>
           <tr>
            <td width="265" bgcolor="#FBFBFB">Add Title</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Add_title" type="text" style="width:300px;" id="Add_title" />
			</td>
          </tr>
          
           <tr>
            <td width="265" bgcolor="#FBFBFB">Key Words</td>
             <td width="423" bgcolor="#FBFBFB"><input name="Key_word" type="text" style="width:300px;" id="Key_word" />
			</td>
          </tr>
           <tr>
            <td width="265" bgcolor="#FBFBFB">Description</td>
             <td width="423" bgcolor="#FBFBFB"><textarea name="Description" rows="4" cols="30"></textarea>			</td>
          </tr>
          <tr>
            <td colspan="2" bgcolor="#FBFBFB">
			
			
			</td>
            </tr>-->
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