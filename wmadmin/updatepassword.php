<?php 
include_once('db.php');
include_once('');

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Admin Panel : Winder Mart</title>

<style type="text/css">
body {
	background:#FFFFff;
	background-color: #03617C;
}
div { position:absolute; left:35%; top:35%;
		background:#999999 ; color:#FFFFFF; 
		width:400px;font-size:13px;
		  vertical-align:middle ; border: #CCCCCC inset 1px}
h3 { color:#666666}
</style>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script language="javascript" type="">
function validation()
{
			if (document.memberform.loginname.value=="")
			{
				alert("Please enter login name");
				document.memberform.loginname.focus()  
				return false;
			}
			if (document.memberform.password.value=="")
			{
				alert("Please enter the password");
				document.memberform.password.focus()  
				return false;
			}
}
</script>
<style type="text/css">
<!--
.style80 {font-size: 24px}
-->
</style></head>

<body ><br />
<h4 align="center"><br />
</h4>
<?php 
			    $categoryQuery = "select * from admin ";				
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
<form name="memberform" action="update.php" method="post" onsubmit="return validation();">
<table width="35%" border="1" align="center" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td><table width="99%" height="99" border="0" align="center" bgcolor="#FFFFCC"  >
      <tr>
        <td height="33" colspan="2" align="center" valign="top" bgcolor="#03617c" class="style11" style=" height:3px"><span class="style11" style=" height:3px"><span class="style11" style=" height:3px"><img src="../assets/img/logo.png" width="233" height="79" /></span></span></td>
      </tr>
      <tr>
        <td height="33" colspan="2" class="style11" style=" height:3px">
        <?php 
        if(isset($_REQUEST['invalid']))
        	{
        		echo "Invalid Login Detail";
        	}
        ?>
            <hr size="1px;" color="#FFFFCC" /></td>
      </tr>
      <tr>
        <td width="41%" height="25" align="left" valign="top" class="style10">Login Name</td>
        <td width="59%" height="25" align="left" valign="top"><input name="username" type="text" class="style77"  id="loginname" value="<?php echo $categoryRow['username']; ?>" /></td>
      </tr>
      <tr>
        <td height="25" align="left" valign="top" class="style10">Password</td>
        <td height="25" align="left" valign="top"><input name="password" type="password" class="style77" id="password" value="<?php echo $categoryRow['password']; ?>" /></td>
      </tr>
      <tr>
        <td height="25" class="style10">&nbsp;</td>
        <td height="25"><input name="submit" type="submit" class="style10" style="font-size:10px" value="Change Password" />
        
        <input type="hidden" name="id" value="<?php echo $id; ?>" /></td>
      </tr>

      <tr>
        <td colspan="2" align="center">&nbsp;</td>
      </tr>
    </table></td>
  </tr>
</table>
</form>
<?php } ?>
</body>
</html>
