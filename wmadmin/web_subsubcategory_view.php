<?php
ob_start();
session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

$category_Id = @$_GET['category_Id'];
if($category_Id!='')
{
	$where_Query = "WHERE categoryid = $category_Id ORDER BY categoryid asc, subcategoryid asc, numbering asc ";

}else
{
	$where_Query = "ORDER BY subcategoryid asc, numbering asc ";

}
	
	$tbl_name="subsubcategory";
	
	$adjacents = 2;
	
	$query = "SELECT COUNT(*) as num FROM $tbl_name $where_Query";
	//echo $query;
	$total_pages_row = $connectionObject->executeQuery($query);
	$total_pages_num = mysql_fetch_assoc($total_pages_row);
	$total_pages = $total_pages_num[num];
	
	$targetpage = $_SERVER['PHP_SELF']; 	
	
	$limit_val = @$_GET['pagesize'];
	if($limit_val!='') {
		$limit = $limit_val;
	} else {
		$limit = 10;				//how many items to show per page
	}
	$page = $_GET['page'];
	if($page) 
		$start = ($page - 1) * $limit; 			//first item to display on this page
	else
		$start = 0;								//if no page var is given, set start to 0
	
	/* Get data. */
	$sql = "SELECT * FROM $tbl_name $where_Query LIMIT $start, $limit";
	//echo $sql;
	$result = $connectionObject->executeQuery($sql);
	
	/* Setup page vars for display. */
	if ($page == 0) $page = 1;					//if no page var is given, default to 1.
	$prev = $page - 1;							//previous page is page - 1
	$next = $page + 1;							//next page is page + 1
	$lastpage = ceil($total_pages/$limit);		//lastpage is = total pages / items per page, rounded up.
	$lpm1 = $lastpage - 1;						//last page minus 1
	
	$linkvariable = "";
	if($category_Id != "")    //manufacturerid
	{
		$linkvariable .= "&category_Id=$category_Id";
	}
	
	/* 
		Now we apply our rules and draw the pagination object. 
		We're actually saving the code to a variable in case we want to draw it more than once.
	*/
	
	$pagination = "";
		if($lastpage > 1)
		{
		$pagination .= "<div class=\"pagination\">";
		//previous button
		if ($page > 1)
		$pagination.= "<a href=\"$targetpage?page=$prev&q=sch&pagesize=$limit$linkvariable\">« previous</a>";
		else
		$pagination.= "<span class=\"disabled\">« previous</span>";
		
		//pages
		if ($lastpage < 7 + ($adjacents * 2)) //not enough pages to bother breaking it up
		{
		for ($counter = 1; $counter <= $lastpage; $counter++)
		{
		if ($counter == $page)
		$pagination.= "<span class=\"current\">$counter</span>";
		else
		$pagination.= "<a href=\"$targetpage?page=$counter&q=sch&pagesize=$limit$linkvariable\">$counter</a>";
		}
		}
		elseif($lastpage > 5 + ($adjacents * 2)) //enough pages to hide some
		{
		//close to beginning; only hide later pages
		if($page < 1 + ($adjacents * 2))
		{
		for ($counter = 1; $counter < 4 + ($adjacents * 2); $counter++)
		{
		if ($counter == $page)
		$pagination.= "<span class=\"current\">$counter</span>";
		else
		$pagination.= "<a href=\"$targetpage?page=$counter&q=sch&pagesize=$limit$linkvariable\">$counter</a>";
		}
		$pagination.= "...";
		$pagination.= "<a href=\"$targetpage?page=$lpm1&q=sch&pagesize=$limit$linkvariable\">$lpm1</a>";
		$pagination.= "<a href=\"$targetpage?page=$lastpage&q=sch&pagesize=$limit$linkvariable\">$lastpage</a>";
		}
		//in middle; hide some front and some back
		elseif($lastpage - ($adjacents * 2) > $page && $page > ($adjacents * 2))
		{
		$pagination.= "<a href=\"$targetpage?page=1\">1</a>";
		$pagination.= "<a href=\"$targetpage?page=2\">2</a>";
		$pagination.= "...";
		for ($counter = $page - $adjacents; $counter <= $page + $adjacents; $counter++)
		{
		if ($counter == $page)
		$pagination.= "<span class=\"current\">$counter</span>";
		else
		$pagination.= "<a href=\"$targetpage?page=$counter&q=sch&pagesize=$limit$linkvariable\">$counter</a>";
		}
		$pagination.= "...";
		$pagination.= "<a href=\"$targetpage?page=$lpm1&q=sch&pagesize=$limit$linkvariable\">$lpm1</a>";
		$pagination.= "<a href=\"$targetpage?page=$lastpage&q=sch&pagesize=$limit$linkvariable\">$lastpage</a>";
		}
		//close to end; only hide early pages
		else
		{
		$pagination.= "<a href=\"$targetpage?page=1&q=sch&pagesize=$limit$linkvariable\">1</a>";
		$pagination.= "<a href=\"$targetpage?page=2&q=sch&pagesize=$limit$linkvariable\">2</a>";
		$pagination.= "...";
		for ($counter = $lastpage - (2 + ($adjacents * 2)); $counter <= $lastpage; $counter++)
		{
		if ($counter == $page)
		$pagination.= "<span class=\"current\">$counter</span>";
		else
		$pagination.= "<a href=\"$targetpage?page=$counter&q=sch&pagesize=$limit$linkvariable\">$counter</a>";
		
		}
		}
		}
		
		//next button
		if ($page < $counter - 1)
		$pagination.= "<a href=\"$targetpage?page=$next&q=sch&pagesize=$limit$linkvariable\">next »</a>";
		else
		$pagination.= "<span class=\"disabled\">next »</span>";
		$pagination.= "</div>\n";
		}
?>
<html>
<title>Control Panel : Crown Hearware</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<style type="text/css">
*******************************************************************************
PAGINATION
*******************************************************************************/
div.pagination {
background-color:#fff;
color:#333333;
padding:10px 10px 10px 0;

font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
text-align:right;
}

div.pagination a {
color:#333333;
padding:2px 5px;
margin:0 2px;
text-decoration:none;
border:2px solid #333333;
}

div.pagination a:hover, div.pagination a:active {
border:2px solid #333333;
color:#03617C;
}

div.pagination span.current {
padding:2px 5px;
border:2px solid #333333;
color:#fff;
font-weight:bold;
background-color:#999999;
}
div.pagination span.disabled {
display:none;
}
</style>
<body>
<br>
<table width="750" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="49%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;&nbsp;Website Management > View  Sub Subcategory</th>
        <th width="51%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
<script type="text/javascript">
<!--
function gotoURL(site) {
  if (site !="") {
    self.location = site;
  }
}
//-->
</script>
	  <tr>
	    <td height="22" colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<!-- <input type="hidden" name="action" value="search"> -->
              <tr>
                <th width="25%" align="center" valign="middle" scope="col">
				<select name="category_Id" id="category_Id" class="style77" onChange="gotoURL(this.value);" style="width:145px;">                 
				  <option value="<?php echo "$targetpage?category_Id=" ?>" <?php if($category_Id=='') echo "selected"; ?>>ALL</option>
                  <?php
						$categoryQuery = "select categoryid, heading, createdate from category order by categoryid asc";				
						$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);
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
                  <option value="<?php echo "$targetpage?category_Id=$categoryRow[categoryid]";?>" <?php if($categoryRow['categoryid']==$category_Id) echo "selected"; ?>><?php echo $categoryRow['heading']; ?></option>
                  <?php
						}
					?>
                </select></th>
                <th width="3%" scope="col">&nbsp;</th>
                <th width="72%" align="left" valign="middle" scope="col"><!-- <input name="submit" type="submit" class="style77" style="width:100px;" value="Search"> --></th>
              </tr>
            </table>
		</td>
	    </tr>
	  <tr>
	    <td height="22" colspan="2">
		<table width="100%" border="0" cellspacing="0" cellpadding="0" style="border:1px solid #E9E9E9;">
 					
					<tr>
  					  <td colspan="2" class="table_td txt2" style="text-align:right;">
					    <table width="100%" border="0" cellspacing="0" cellpadding="0">
                          <tr>
                            <td width="36%" class="txt2" style="text-align:left; padding:5px; font-size:12px;">
								<?php echo 'Total <strong style="color:#CC0000;">'.$total_pages."</strong> Products Found :"; ?>							</td>
                            <td width="64%" class="txt2" style="text-align:right; padding:5px; font-size:12px;">
								<?php echo 'Showing <strong style="color:#CC0000;">'.$page.'</strong> of Total <strong  style="color:#CC0000;">'.$lastpage."</strong> Page(s)"; ?>							</td>
                          </tr>
                        </table>					  </td>
					</tr>
					<tr>
                            <td width="31%" class="style77" style="text-align:left; padding:5px;">
							<strong>Sub Subcategory per Page :</strong> &nbsp;
						    <select name="pagesize" class="style77" id="pagesize" style="width: 50px;" onChange="gotoURL(this.value);">
							<option value="<?php echo "$targetpage?q=sch&pagesize=10";?>" <?php if($limit==10) { echo ' selected="selected"'; } ?> >10</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=20"; ?>" <?php if($limit==20) { echo ' selected="selected"'; } ?>>20</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=30";	?>" <?php if($limit==30) { echo ' selected="selected"'; } ?>>30</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=40"; ?>" <?php if($limit==40) { echo ' selected="selected"'; } ?>>40</option> 
							<option value="<?php echo "$targetpage?q=sch&pagesize=50"; ?>" <?php if($limit==50) { echo ' selected="selected"'; } ?>>50</option> 
						</select>							</td>
                            <td width="69%" class="style77" style="text-align:right; padding:5px;">
								<?php echo $pagination; ?>							</td>
              </tr>
            </table>
		</td>
	    </tr>
	  <tr>
	 	<td height="22" colspan="2" align="right" valign="middle"><a href="web_subsubcategory_add.php" class="style10"><font color="#FF0000">Add Sub Subcategory</font></a>&nbsp;</td>
	 </tr>
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Sub Subcategory</td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Subcategory</td>
			<td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Category </td>
            
            <td width="13%" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Numbering</td>
            <td width="11%" height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>
          <?php 
		   $totalnum = mysql_num_rows($result);
		   if($totalnum>0)
		   {			
				while($productRow = mysql_fetch_assoc($result))
				{
					$categoryid = $productRow['categoryid'];
					$subcategoryid = $productRow['subcategoryid'];
										
					$catQry = "select heading from category where categoryid = '$categoryid'";
					$catQryResult = $connectionObject->executeQuery($catQry);
					if(!$catQryResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display category";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$catRow = mysql_fetch_assoc($catQryResult);
					
					//fetching heading from spark subcategory i.e subcategory table
					$subcatHeading = "select heading from subcategory where subcategoryid = '$subcategoryid'";
					$subcatHeadingResult = $connectionObject->executeQuery($subcatHeading);
					if(!$subcatHeadingResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display heading";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$subcatRow = mysql_fetch_assoc($subcatHeadingResult);
					
					
			 ?>
            <tr>
			<td width="28%" align="left" valign="top" class="style77"><div style="margin:1px;"><?php echo $productRow['heading']?></div></td>
              
              <td width="24%" align="left" valign="top" class="style77"><?php echo $subcatRow['heading']; ?></td>
              
			  <td width="24%" align="left" valign="top" class="style77"><span style="margin:1px;">
                <?php echo $catRow['heading']; ?>
              </span></td>
			  
              <td align="center" valign="top" class="style77"><?php echo $productRow['numbering']?></td>
              <td align="center" valign="top" class="style77"><div style="margin:3px;"><a href="web_subsubcategory_edit.php?subsubcategoryid=<?php echo $productRow['subsubcategoryid']?>">Edit</a>&nbsp;|&nbsp;<a href="web_subsubcategory_delete.php?subsubcategoryid=<?php echo $productRow['subsubcategoryid']; ?>" onClick="return deleteAlert(this);">Delete</a></div></td>
            </tr>
          <tr>
            <td height="2" colspan="5" align="center" valign="top" bgcolor="#E7EFB8" ></td>
          </tr>
          <?php
			 }
		}else{
			echo '<div class="style77" style="padding:10px;">Sorry, No Records</div>';
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
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th height="20" colspan="2" align="right" valign="top" class="style77" scope="col"><a href="web_subsubcategory_add.php" class="style10"><font color="#FF0000">Add Sub Subcategory</font></a>&nbsp;</th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>