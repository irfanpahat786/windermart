<?php
ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");

$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

// $productQuery = "select productid, heading, createdate from product order by createdate desc";
//				//echo $productQuery;
//				$productQueryResult = $connectionObject->executeQuery($productQuery);
//				if(!$productQueryResult)
//				{ // if query failed to execute then print error msg
//					$errorMsg = mysql_errno()." : failed to display products";
//					echo $errorMsg;
//					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
//					exit();
//                }
//.........................For Paging..........................

	 $where_Query = "ORDER BY numbering asc ";
	
     $tbl_name="gallery";
	
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
<title><?php echo ADMIN_TITLE; ?></title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
<br>
<table width="80%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">

    <td valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
        <th width="20%" height="25" align="left" valign="middle" bgcolor="#999999" class="style2">&nbsp;&nbsp;Website Management > View Services </th>
        <th width="30%" align="left" valign="middle" bgcolor="#999999" class="style2"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 <tr>
     <td>&nbsp;</td>
     </tr>
      <tr>
        <th colspan="4" align="right" valign="top" class="style77" scope="col"><a href="gallary_add.php"><font color="#FF0000">Add New Destination
        </font></a>&nbsp;&nbsp;</th>
      </tr>
      <tr>
     <td>&nbsp;</td>
     </tr>
      <tr>
        <th height="22" colspan="2" class="style77" scope="col">
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">             
          <tr>
		    <td width="15%" align="left" valign="middle" bgcolor="#999999" class="style10"> Image </td>
			<td width="19%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Heading</td>
			<td width="22%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Position</td>
			<td width="15%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">ID</td>
			<td width="15%" height="22" align="left" valign="middle" bgcolor="#999999" class="style10">Status</td>
            <td width="14%" height="22" align="center" valign="middle" bgcolor="#999999" class="style10">Action</td>
          </tr>
         <?php 
    			while($userRow = mysql_fetch_assoc($result))
				{
			 ?>
            <tr>
			 <td align="left"><div style="margin:3px;">
			  <?php if ($userRow['imgName']!=''){?>
			  <img src="../gallery_images/<?php echo stripslashes($userRow['imgName'])?>" width="75" height="94" border="0"/>
			  <?php } else {?>
			  <img src="img/img_not_available.jpg" width="75" height="94" border="0"/>
			  <?php }?>
			  </div></td>
<td align="left" class="style10"><div style="margin:1px;"><?php echo stripslashes($userRow['heading'])?>
</div></td>
<td align="left"class="style10"><span ><?php echo stripslashes($userRow['numbering'])?></span></td>
<td align="left"class="style10"><span ><?php echo stripslashes($userRow['galleryid'])?></span></td>
<td align="left"class="style10"><a href="gallary_status.php?galleryid=<?php echo $userRow['galleryid']?>&status=<?php echo $userRow['status']?>"><span ><?php echo stripslashes($userRow['status'])?></span></a></td>

<td>
<a href="gallary_edit.php?galleryid=<?php echo stripslashes($userRow['galleryid']);?>" class="btn btn-danger btn-sm show-tooltip" title="Edit">Edit</a>&nbsp;|&nbsp;
<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="gallary_delete_one.php?galleryid=<?php echo stripslashes($userRow['galleryid']);?>" onClick="return deleteAlert(this);">Delete</a>
</td>
            </tr>
 <script language="javascript">
		  	function deleteAlert(record)
			{
				if(confirm("Are you really want to delete this Destination?"))
				return true;
				else
				return false;
			}
		  </script>
          <tr>
            
          <?php
			 }
		  ?>
          <tr>
            <td align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B"></td>
          </tr>
		  
        </table></th>
      </tr>
      <tr>
        <th colspan="4" align="right" valign="top" class="style77" scope="col"><a href="gallary_add.php"><font color="#FF0000">Add New Destination
        </font></a>&nbsp;&nbsp;</th>
      </tr>
      <tr>
      <td>&nbsp;
     
      </td>
      </tr>
      <tr>
      <td style="text-align:right">
      <?php echo $pagination;?>
      </td>
      </tr>
       <tr>
      <td>&nbsp;
     
      </td>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>