<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
?>
<html>
<title>Control Panel : Grace Wallpaper</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="60%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;&nbsp;Website Management > View Subcategory  </th>
        <th width="40%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <!--<tr>
            <td height="22" colspan="4" align="right" valign="middle" class="style10"><a href="web_subcategory_add.php"><font color="#FF0000">Add Subcategory</font></a>&nbsp;</td>
            </tr>-->
          <tr>
		     <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Subcategory Heading</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10"> Category Heading </td>
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Numbering</td>
            <td width="10%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>
          <?php 
			    $subcatQuery = "select * from subcategory order by numbering asc";
				//echo $serviceQuery;
				$subcatQueryResult = $connectionObject->executeQuery($subcatQuery);
				if(!$subcatQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display subcategory";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }    			
				while($subcatRow = mysql_fetch_assoc($subcatQueryResult))
				{
					$categoryid = $subcatRow['categoryid'];
					$catQry = "select heading from category where categoryid = '$categoryid'";
					$catQryResult = $connectionObject->executeQuery($catQry);
					if(!$catQryResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display service type";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$catQryRow = mysql_fetch_assoc($catQryResult);
		  ?>
            <tr>
			<td width="44%" align="left" valign="top" class="style77"><div style="margin:1px;"><?php echo $subcatRow['heading']?></div></td>
              <td width="29%" align="left" valign="top" class="style77"><span style="margin:1px;">
                <?php echo $catQryRow['heading']; ?>
              </span></td>
              
              <td width="17%" align="left" valign="top" class="style77"><div style="margin:1px;"><?php echo $subcatRow['numbering']?></div></td>
              <td align="center" valign="top" class="style77"><div style="margin:3px;"><a href="web_subcategory_edit.php?subcategoryid=<?php echo $subcatRow['subcategoryid']?>">Edit</a>&nbsp;|&nbsp;
<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="web_subcategory_delete.php?subcategoryid=<?php echo stripslashes($subcatRow['subcategoryid']);?>" onClick="return deleteAlert(this);">Delete</a></div></td>
            </tr>
          <tr>
            <td height="2" colspan="4" align="center" valign="top" bgcolor="#E7EFB8" ></td>
          </tr>
          <?php
			 }
		  ?>
             <script language="javascript">
		  	function deleteAlert(record)
			{
				if(confirm("Are you really want to delete this Product?"))
				return true;
				else
				return false;
			}
		  </script>
          <tr>
            <td colspan="3" align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
        </table></th>
      </tr>
      <!--<tr>
        <th colspan="2" align="right" valign="top" class="style77" scope="col"><a href="web_subcategory_add.php" class="style10"><font color="#FF0000">Add Subcategory</font></a>&nbsp;</th>
      </tr>-->
    </table></td>
  </tr>
</table>
</body>
</html>