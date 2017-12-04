<?php
include_once'db.php';
?>


<html>
<head>
<title>Control Panel : Winder Mart</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >View Package List</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="4" align="right" valign="middle" ><a href="package_duration_add.php" class="style10"><font color="#FF0000">Add New Package</font></a></td>
            </tr>      
          <tr>
            <td width="8%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Package </td>
            <td width="8%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Price</td>
            <td width="8%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Duration</td>
            <td width="20%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Offers</td>
            <td width="8%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>		 
          <?php 
			    $categoryQuery = "select * from package_price inner join package on package_price.package_id=package.id ";				
				$categoryQueryResult = ExecuteQuery($categoryQuery);
				if(!$categoryQueryResult)
				{
					$errorMsg = mysql_errno()." : failed to display service category";
					echo $errorMsg;
					exit();
                }    			
				while($categoryRow = mysql_fetch_assoc($categoryQueryResult))
				{
			 ?>
            <tr>
              <td  width="8%"  align="left"  class="style77"><div style="margin:1px;"><?php echo $categoryRow['name']?></div></td>
              <td  width="8%"  align="left"  class="style77"><div style="margin:1px;"><?php echo $categoryRow['price']?></div></td>
              <td  width="8%"  align="left"  class="style77"><div style="margin:1px;"><?php echo $categoryRow['duration']?></div></td>
              <td  width="20%" align="left"  class="style77"><div style="margin:1px;"><?php echo $categoryRow['offers']?></div></td>
              <td  width="8%"  align="center" class="style77"><div style="margin:3px;"><a style="margin:3px; background-color: green; color:white;" href="edit_slider.php?id=<?php echo $categoryRow['id']?>">Edit</a>||<a  style="margin:3px; background-color: red; color:white;" href="edit_slider.php?id=<?php echo $categoryRow['id']?>">Delete</a></td> 
            </tr>
          <tr>
            <td height="2" colspan="4" align="center" valign="top"  ></td>
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
        </table>
        </th>
      </tr>
      
    </table></td>
  </tr>
</table>
</body>
</html>