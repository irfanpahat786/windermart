<?php
include_once'db.php';
if(isset($_GET['del']))
{
	//$id=$_REQUEST['sub_id'];
	$q1="delete from latestpost where id='".$_GET['del']."'";
    $result=ExecuteQueryResule($q1);
}
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
        
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management > View Advertisement</th>

        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="4" align="right" valign="middle" ><a href="latestpost.php" class="style10"><font color="#FF0000">Add New Advertisement</font></a></td>
            </tr>      
          <tr>
			<!--<td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Image </td>-->
            
            <td width="8%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">latest Post </td>
           
            <td width="20%" height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Post Description</td>
            <td width="8%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>		 
          <?php 
			    $categoryQuery = "select * from latestpost ";				
				$categoryQueryResult = ExecuteQuery($categoryQuery);
				if(!$categoryQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display service category";
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
			   if ($categoryRow['image']!='')
			   {
			  ?>
			  <img src="../img/<?php echo $categoryRow['image']; ?>" border="1" class="style8" width="100" height="97"/>
			  <?php
			  }
			  ?>
			  </span></td>-->
              
              <td  width="8%"  align="left"  class="style77"><div style="margin:1px;"><img src="../shareimg/<?php echo $categoryRow['image'];?>" height="300" width="300" /></div></td>
             
              <td  width="20%" align="left"  class="style77"><div style="margin:1px;"><?php echo $categoryRow['offers']?></div></td>
              <td  width="8%"  align="center" class="style77"><div style="margin:3px;"><a  style="margin:3px; background-color: green; color:white;"  href="edit_advertise.php?id=<?php echo $categoryRow['id'];?>">Edit</a><a  style="margin:3px; background-color: red; color:white;" onClick="del(<?php echo $categoryRow['id'];?>)" href="#">Delete</a></td> 
            </tr>
          <tr>
            <td height="2" colspan="4" align="center" valign="top"  ></td>
          </tr>
          <?php
			 }
		  ?>
          <tr>
                 
            <td colspan="2" align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
        </table>
        </th>
      </tr>
     
    </table></td>
  </tr>
</table>
<script>
      function del(id)
          { 
		if(confirm('Sure To Remove This Record ?'))
	        {
		         window.location.href='latest_post_view.php?del='+id;
	        } 
          } 

      </script>
</body>
</html>