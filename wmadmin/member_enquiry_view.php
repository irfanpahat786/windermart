<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
include_once("../PhpIncludes/php_functions.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
?>
<html>
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<table width="1047" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td width="1043" valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;&nbsp;Website Management > View Member Request</th>
        <th width="44%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" colspan="9" align="right" valign="middle" >&nbsp;</td>
            </tr>          
          <tr> 
			<td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Product </td>
			<td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Quantity </td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Name</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Email</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Address</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">City</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">State</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Country</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Phone </td>
          <!--  <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Massege</td>-->
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Create Date </td>
            <td width="6%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>		 
          <?php 
			    $memberRequestQry = "select * from enquiry order by createdate desc";				
				$memberRequestQryResult = $connectionObject->executeQuery($memberRequestQry);
				if(!$memberRequestQryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display service category";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }    			
				while($memberRow = mysql_fetch_assoc($memberRequestQryResult))
				{
					$productIdInfo = $memberRow['productIdInfo'];
					$request_insert_num1 = explode(",",$productIdInfo);
					//print_r($request_insert_num1);		
					$request_insert_num2=count($request_insert_num1);
					//$productIdInfo = array();				
			 ?>
            <tr>
              <td width="12%" align="left" valign="top" class="style77"><?php echo $memberRow['heading']; ?></td>
			  <td width="6%" align="left" valign="top" class="style77"><?php echo $memberRow['quantity']; ?></td>
              <td width="8%" align="left" valign="top" class="style77"><?php echo $memberRow['name']; ?></td>
              <td width="10%" align="left" valign="top" class="style77"><?php echo $memberRow['email']; ?></td>
              <td width="9%" align="left" valign="top" class="style77"><?php echo $memberRow['address']; ?></td>
              <td width="9%" align="left" valign="top" class="style77"><?php echo $memberRow['city']; ?></td>
              <td width="10%" align="left" valign="top" class="style77"><?php echo $memberRow['state']; ?></td>
              <td width="11%" align="left" valign="top" class="style77"><?php echo $memberRow['country']; ?></td>
              <td width="9%" align="left" valign="top" class="style77"><?php echo $memberRow['phone']; ?></td>
<!--              <td width="10%" align="left" valign="top" class="style77"><?php //echo $memberRow['message']; ?></td>
-->			  <td width="10%" align="left" valign="top" class="style77">
			  <?php 
			  		for($i=1;$i<$request_insert_num2;$i++)
					{			
							$request_insert_num3 = $request_insert_num1[$i];
							$prodQuery = "select heading from xquisite_product where productid = '$request_insert_num3'";
							$prodQueryResult = $connectionObject->executeQuery($prodQuery);
							if(!$prodQueryResult)
							{ // if query failed to execute then print error msg
								$errorMsgstatic = mysql_errno()." : failed to login";
								echo $errorMsgstatic;
								//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
								exit();
							}
							$prodRow = mysql_fetch_assoc($prodQueryResult);
							echo $prodRow['heading'].', ';
						
					} 
			  ?>
			  <span style="margin:1px;"><?php echo $memberRow['createdate']; ?></span></td>
              <td width="6%" align="center" valign="top" class="style77"><div style="margin:1px;">
                <div style="margin:3px;">
                  <a href="member_enquiry_delete.php?enquiryid=<?php echo $memberRow['enquiryid']; ?>" onClick="return deleteAlert(this);">Delete</a>                </div>
              </div></td>
              </tr>
          <tr>
            <td height="2" colspan="11" align="center" valign="top" bgcolor="#E7EFB8" ></td>
          </tr>
          <?php
			 }
		  ?>
          <tr>
            <td colspan="9" align="center" valign="bottom" class="style7B">&nbsp;</td>
            </tr>
		  <script language="javascript">
		  	function deleteAlert(record)
			{
				if(confirm("Are you really want to delete this record?"))
				return true;
				else
				return false;
			}
		  </script>
        </table></th>
      </tr>
      <tr>
        <th colspan="2" align="right" valign="middle" class="style77" scope="col">&nbsp;</th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>