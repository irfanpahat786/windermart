<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$adminQuery = "select * from admin";
//echo $adminQuery;
$adminQueryResult = $connectionObject->executeQuery($adminQuery);
if(!$adminQueryResult)
	{
		echo mysql_error();
		exit();
	}
$loginRow = mysql_fetch_assoc($adminQueryResult);

$username=$loginRow['username'];
$password=$loginRow['password'];

?>

<html>
<title>Control Panel : Thrifty Auto Rental</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script language="javascript" type="">
  function validation()
   {
			if (document.memberform.username.value=="")
			{
				alert("Please enter username");
				document.memberform.username.focus()  
				return false;
			}
			if (document.memberform.password.value=="")
			{
				alert("Please enter password");
				document.memberform.password.focus()  
				return false;
			}
	}
</script>
<body>
<br>
<form name="memberform" action="web_changepw_inter.php" method="post" onSubmit="return validation();">
  <table width="600" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        <tr>
          <th width="41%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;Change Admin Login </th>
          <th width="59%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
            <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
            <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
            <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
            <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
            <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
          </strong></th>
        </tr>
        <tr>
          <th colspan="2" scope="col">&nbsp;</th>
        </tr>
        <tr>
          <th colspan="2" align="center" valign="top" scope="col"><table  width="100%">
            <tr>
              <td height="22" colspan="2" align="left" valign="middle" bgcolor="#FFFFCC" class="style777"><strong class="style10">Login  Detail </strong></td>
            </tr>
            <tr>
              <td height="22" align="left" valign="middle" class="style77">User Name* </td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><input name="username" type="text" class="style77" id="username" value="<?php echo $username;?>"/></td>
            </tr>
            <tr>
              <td width="296" height="22" align="left" valign="middle" class="style77">Password*</td>
              <td width="388" height="22" colspan="1" align="left" valign="middle" class="style77"><input name="password" type="password" class="style77" id="password" value="<?=$password?>"/></td>
            </tr>
            <tr>
              <td height="22" colspan="2" align="center" class="style777" ><input name="submit" type="submit" value="Update" /></td>
            </tr>
            <tr>
              <td height="10" colspan="2" align="center" ></td>
            </tr>
          </table></th>
        </tr>
      </table></td>
    </tr>
  </table>
</form>
</body>
</html>