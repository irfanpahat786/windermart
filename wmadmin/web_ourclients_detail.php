<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$registrationid = (isset($_REQUEST['registrationid']) and $_REQUEST['registrationid'] != '' ) ?  $_REQUEST['registrationid'] :  header("Location:web_registration_view.php?q=err");

				$registrationQuery = "select * from  registration where registrationid='$registrationid'";
				//echo $productQuery;
				$registrationQueryResult = $connectionObject->executeQuery($registrationQuery);
				if(!$registrationQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display data";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }
    			
				$registrationRow = mysql_fetch_assoc($registrationQueryResult);
?>
<html>
<title>Control Panel : </title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
<!--
.style81 {color: #FFFFFF}
.style82 {color: #FF6666}
-->
</style>
<body>
<br>
<table width="700" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="49%" height="25" align="left" valign="middle" bgcolor="#999999" class="style2" scope="col">&nbsp;&nbsp;Report Management > Service Detail </th>
        <th width="51%" align="left" valign="middle" bgcolor="#999999" class="style78" scope="col">
		<strong>
		<?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
		<?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
		<?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
		<?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
		<?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
		</strong>		</th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" align="right" scope="col"><a href="web_registration_view.php" class="style10"><font color="#FF6666">Back</font></a><span class="">&nbsp;</span>&nbsp;</th>
      </tr>
 <tr>
        <th colspan="2" align="center" valign="top" class="style77" scope="col"><table width="98%" border="0" align="center" cellpadding="0" cellspacing="0">
          <form action="#" method="post" enctype="multipart/form-data" name="memberform" id="memberform">
            <tbody>
              <tr class="formtext">
                <td width="1%" height="27" align="left" bgcolor="#999999" class="formtext">&nbsp;</td>
                <td width="36%" height="27" align="left" valign="middle" bgcolor="#999999" class="style77"><span class="style10 style81 style82"><strong>Service Detail </strong></span></td>
                <td width="63%" height="27" align="left" valign="top" bgcolor="#999999" class="style77">&nbsp;</td>
              </tr>


<tr class="formtext">
                <td height="25" align="left" bgcolor="#999999" class="style_white">&nbsp;</td>
                <td height="32" align="left" valign="middle" bgcolor="#999999" class="style10 style82">Upload</td>
                <td height="32" align="left" valign="top" bgcolor="#999999" class="style77">&nbsp;</td>
              </tr>
				  <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> Heading </td>
                <td height="32" align="left" valign="middle" class="style77"><?php echo $registrationRow['heading']?> 				</td>
              </tr>
				  <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> URL </td>
                <td height="32" align="left" valign="middle" class="style77"><?php echo $registrationRow['url']?> 				</td>
              </tr>
		      <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> Numbering </td>
                <td height="32" align="left" valign="middle" class="style77"><?php echo $registrationRow['numbering']?> 				</td>
              </tr>
              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> Priority </td>
                <td height="32" align="left" valign="middle" class="style77"><?php echo $registrationRow['priority']?> 				</td>
              </tr>

              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> Detail </td>
                <td height="32" align="left" valign="middle" class="style77"><?php echo $registrationRow['detail']?> 				</td>
              </tr>
              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="middle" class="style77"> Download File </td>
                <td height="32" align="left" valign="middle" class="style77">
				<?php
				 if ($registrationRow['fileUpload']!='')
				 {
				?><span class="style11">
				<strong><a href="../docs/<?php echo stripslashes($registrationRow['fileUpload'])?>" target="_blank">Click here to Download file</a> </strong></span>
				<?php
				}else
				{
				?>
				Not Available
				<?php
				}
				?>				 </td>
              </tr>
              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="top" class="style77">Upload Photograph </td>
                <td height="32" align="left" valign="top" class="style77">
				<?php
				 if ($pregistrationRow['imgName']!='')
				 {
				?>
				<a href="../productImage/large/<?php echo stripslashes($registrationRow['imgName'])?>" target="_blank"><img src="../productImage/large/<?php echo stripslashes($registrationRow['imgName'])?>" width="120" height="150" border="0"></a>
				<?php
				}else
				{
				?>
				Not Available
				<?php
				}
				?>				</td>
              </tr>
              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="top" class="style77">&nbsp;</td>
                <td height="32" align="left" valign="top" class="style77">&nbsp;</td>
              </tr>
              <tr class="formbg">
                <td align="left">&nbsp;</td>
                <td height="32" align="left" valign="top" class="style77">&nbsp;</td>
                <td height="32" align="left" valign="top" class="style77">
				<a href="web_registration_delete.php?registrationid=<?php echo stripslashes($productRow['registrationid'])?>" title="delete"><img src="img/delete.jpg"  width="50" height="50" border="0" /></a></td>
              </tr>
              <tr class="formbg">
                <td>&nbsp;</td>
                <td valign="top" class="style77">&nbsp;</td>
                <td valign="top" class="style77">&nbsp;</td>
              </tr>
			 </tbody>
          </form>
        </table></th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>