<?php 
include_once 'db.php';
function uploadImage($tempPath, $destPath)
{
	if($tempPath!="" && $destPath!="")
	{
		move_uploaded_file($tempPath,$destPath) or die("The picture can not be uploaded. Please try again?"); 
		return true;
	}
	else
	{
		return false;
	}
}
if(isset($_POST['submit']))
{
    $id=$_GET['id'];
    if(trim($errorMsg)=='')
    	{
    			if(!empty($_FILES["image"]["name"]))
    			{
    				$extArray=strtolower(end(explode(".", $_FILES["image"]["name"])));
    				if($extArray=='jpg' || $extArray=='gif' || $extArray=='jpeg' || $extArray=='ico' || $extArray=='png')
    				{
    					$size=filesize($_FILES['image']['tmp_name']);
    					
    					if ($size > 512000*1024)
    					{
    						$errorMsg="Please upload File size of upto 2 MB!<br>";
    					}
    					else
    					{
    						$uploaded_file=rand(0,99).date("Ymdsi");
    						$uploaded_file=$uploaded_file.".".$extArray;
    						
    							
    						$filePath=$_FILES['image']['tmp_name'];
    						$imageUploaded=false;
    						chmod("../shareimg/", 0777);  // octal; correct value of mode
    						$imageUploaded=uploadImage($filePath,"../assets/images/sliders/".$uploaded_file);
    						chmod("../assets/images/sliders/", 0755);  // octal; correct value of mode
    						
    						if(!$imageUploaded)
    							$errorMsg.="File not uploaded.<br>";
    						else
    						{
    							if(trim($_POST["txtOldFile"])!='' && is_file("../shareimg/".$_POST["txtOldFile"]))
    								unlink("../assets/images/sliders/".$_POST["txtOldFile"]);
    						}
    					}
    				}
    				else
    				{
    					$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only.";
    				}	
    			}
    			else if(trim($_POST["txtOldFile"])!='')
    			{
    					$uploaded_file=$_POST["txtOldFile"];
    			}
    			else
    			{
    				$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else tttttttttttttttttt";
    			}
    	}
    $q1="update slider set image='$uploaded_file'  where id=$id";
    ExecuteQuery($q1); 
}
?> 

<html>
<title>Control Panel : Winder Mart</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script>
function goBack() {
    window.history.back()
}
</script>
<body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;Website Management > View Logo List</th>
        <th width="44%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button>
       
        </strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="4" align="right" valign="middle" ><a href="web_category_add.php" class="style10"><font color="#FF0000">update Logo</font></a></td>
            </tr>      
          <tr>
			<!--<td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Image </td>-->
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Logo image </td>
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10"> Numbering  </td>
             <td width="15%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Image</td>
            <td width="15%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>		 
          <?php 
                $id=$_GET['id'];
			    $categoryQuery = "select * from slider where id=$id";				
				$categoryQueryResult = ExecuteQueryResule($categoryQuery);
				
				foreach($categoryQueryResult as $categoryRow)
				
				{
			 ?>
            <tr>
			
        <form action="" method="post" enctype="multipart/form-data">
              <td width="42%" align="left" valign="top" class="style77"><div style="margin:1px;"><img src="../assets/images/sliders/<?php echo $categoryRow['image']?>" style="height:100px; width:100px;"/></div></td>
              
              <td width="21%" align="left" valign="top" class="style77"><div style="margin:1px;"><input type="file" name="image" value="<?php echo $categoryRow['image']?>"></div></td>
              <td align="center" valign="top" class="style77"><div style="margin:3px;"><input type="submit" name="submit" value="update" style=" background-color: rgb(3, 97, 124); color:white; height: 35px;"/>
</td>
            </tr>
          <tr>
            <td height="2" colspan="4" align="center" valign="top" bgcolor="#E7EFB8" ></td>
            </form>
          </tr>
          <?php
			 }
		  ?>
          <tr>
                <script language="javascript">
		  	function deleteAlert(record)
			{
				if(confirm("Are you really want to delete this Category?"))
				return true;
				else
				return false;
			}
		  </script>   
            <td colspan="2" align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
        </table></th>
      </tr>
      <!--<tr>
        <th colspan="2" align="right" valign="middle" class="style77" scope="col"><a href="web_category_add.php" class="style10"><font color="#FF0000">Add Category</font></a></th>
      </tr>-->
    </table></td>
  </tr>
</table>
</body>
</html>