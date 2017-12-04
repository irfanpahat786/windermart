<?php 
include_once 'db.php';
if(isset($_POST['submit']))
{

$id=$_POST['id'];
$name=htmlentities(addslashes(trim($_POST['name'])));

$q1="update service set  name='$name' where id=$id";
ExecuteQuery($q1); 

if ($q1)
{
  echo "your data has been updated successfully";
}
}


?> 

<html>
<title>Control Panel : Winder Mart</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;&nbsp;Website Management > View service List</th>
        <th width="44%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
       
        </strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="4" align="right" valign="middle" ><a href="web_category_add.php" class="style10"><font color="#FF0000">update service</font></a></td>
            </tr>      
          <tr>
			<!--<td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Image </td>-->
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Service Id </td>
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10"> Service Name  </td>
           
            <td width="15%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>		 
          <?php 
      
			    $categoryQuery = "select * from service ";				
				$categoryQueryResult = ExecuteQuery($categoryQuery);
				if(!$categoryQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display header";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }    			
				while($categoryRow = mysql_fetch_assoc($categoryQueryResult))
				{
			 ?>
            <tr>
				<!--<td width="22%" align="center" valign="top" class="style77"><span class="style777">
			  <?php 
			   if ($categoryRow['imgName']!='')
			   {
			  ?>
			  <img src="../productImage/small/<?php echo $categoryRow['imgName']; ?>" border="1" class="style8" width="100" height="97"/>
			  <?php
			  }
			  ?>
			  </span></td>-->
        <form action="edit_service.php" method="post" enctype="multipart/form-data">
             
              <td width="21%" align="left" valign="top" class="style77"><div style="margin:1px;"><input type="text" name="id" value="<?php echo $categoryRow['id']?>"</div></td>
              <td width="21%" align="left" valign="top" class="style77"><div style="margin:1px;"><input type="text" name="name" value="<?php echo $categoryRow['name']?>"></div></td>
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
      <a href="manage_service.php">Back</a>
      <!--<tr>
        <th colspan="2" align="right" valign="middle" class="style77" scope="col"><a href="web_category_add.php" class="style10"><font color="#FF0000">Add Category</font></a></th>
      </tr>-->
    </table></td>
  </tr>
</table>
</body>
</html>