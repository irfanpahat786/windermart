<?php
ob_start();

include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");


$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);

if(isset($_GET['del']))

{
	$q1="delete from users where id='".$_GET['del']."'";
	$categoryQueryResult = $connectionObject->executeQuery($q1);
	if(!$categoryQueryResult)
	{ 
		$errorMsg = mysql_errno()." : failed to display service category";
		echo $errorMsg;
		exit();
	} 
    header("Location: web_product_view.php?q=del");
}
$category_Id = @$_GET['cat_id'];
if($category_Id!='')
{
	$where_Query = "WHERE cat_id = $category_Id ORDER BY cat_id asc";

}else
{
	$where_Query = "ORDER BY id Desc";

}
	
	$tbl_name="users";
	
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
<head>
<title>Control Panel : Winder Mart</title>

<link href="img/style.css" rel="stylesheet" type="text/css">
<script>
function goBack() {
    window.history.back()
}
</script>

<style type="text/css">
/*******************************************************************************
PAGINATION
*******************************************************************************/
div.pagination {
background-color:#fff;
color:#0072B0;
padding:10px 10px 10px 0;

font-family: Arial, Helvetica, sans-serif;
font-size: 13px;
text-align:right;
}

div.pagination a {
color:#0072B0;
padding:2px 5px;
margin:0 2px;
text-decoration:none;
border:2px solid #0072B0;
}

div.pagination a:hover, div.pagination a:active {
border:2px solid #0072B0;
color:#0072B0;
}

div.pagination span.current {
padding:2px 5px;
border:2px solid #0072B0;
color:#fff;
font-weight:bold;
background-color:#999999;
}
div.pagination span.disabled {
display:none;
}
</style>
</head>
<body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
         <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Product List</th>

        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong> <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <span style="color:rgb(82, 244, 54);"><?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?></span>
          <span style="color:rgb(244, 54, 237);"><?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?></span>
          <span style="color:#E91E63;"><?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?></span>
          <span style="color:#F44336;"><?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?></span>
		  <button onclick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
         
        
      </tr>
	  <tr>
	    <td height="22" colspan="2">
			<table width="100%" border="0" cellspacing="0" cellpadding="0">
			<!-- <input type="hidden" name="action" value="search"> -->
             <tr>
                <th width="25%" align="center" valign="middle" scope="col">
				<select name="category_Id" id="category_Id" class="style77" onChange="gotoURL(this.value);" style="width:145px;">                 
				  <option value="<?php echo "$targetpage?id=" ?>" <?php if($category_Id=='') echo "selected"; ?>>ALL</option>
                  <?php
						$categoryQuery = "select * from category order by id asc";				
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
                  <option value="<?php echo "$targetpage?id=$categoryRow[id]";?>" <?php if($categoryRow['id']==$category_Id) echo "selected"; ?>><?php echo $categoryRow['cat_name']; ?></option>
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
							<strong>Products per Page :</strong> &nbsp;
						    <select name="pagesize" class="style77" id="pagesize" style="width: 50px;" onChange="gotoURL(this.value);">
							<option value="<?php echo "$targetpage?q=sch&pagesize=10&$linkvariable";?>" <?php if($limit==10) { echo ' selected="selected"'; } ?> >10</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=20&$linkvariable"; ?>" <?php if($limit==20) { echo ' selected="selected"'; } ?>>20</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=30&$linkvariable";	?>" <?php if($limit==30) { echo ' selected="selected"'; } ?>>30</option>
							<option value="<?php echo "$targetpage?q=sch&pagesize=40&$linkvariable"; ?>" <?php if($limit==40) { echo ' selected="selected"'; } ?>>40</option> 
							<option value="<?php echo "$targetpage?q=sch&pagesize=50&$linkvariable"; ?>" <?php if($limit==50) { echo ' selected="selected"'; } ?>>50</option> 
						</select>							</td>
                            <td width="69%" class="style77" style="text-align:right; padding:5px;">
								<?php echo $pagination; ?>							</td>
              </tr>
            </table>
		</td>
	    </tr>
	  <tr>
	 	<td height="22" colspan="2" align="right" valign="middle"><a href="web_product_add.php" class="style10"><font color="#FF0000">Add New Product</font></a>&nbsp;</td>
	 </tr>
      <tr>
        <th height="22" colspan="2" class="style77" scope="col"><table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">
          <tr>
            <td  align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Image</td>
			<td  height="22" align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Product </td>
           <!--<td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Sub Subcategory </td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Subcategory</td>-->
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Category </td>
            <td align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Company</td>
			<td  align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Status</td>
			<td  align="left" valign="middle" bgcolor="#FFFFD5" class="style10">Pagetype</td>
            <td  height="22" align="center" valign="middle" bgcolor="#FFFFD5" class="style10">Action</td>
          </tr>
          <?php 
		   $totalnum = mysql_num_rows($result);
		   if($totalnum>0)
		   {			
				while($productRow = mysql_fetch_assoc($result))
				{
					$categoryid = $productRow['cat_id'];
					$subcategoryid = $productRow['prod_id'];
					//$subsubcategoryid = $productRow['subsubcategoryid'];
					
					$catQry = "select cat_name from category where id = '$categoryid'";
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
					$subcatHeading = "select * from mainproduct where id = '$subcategoryid'";
					$subcatHeadingResult = $connectionObject->executeQuery($subcatHeading);
					if(!$subcatHeadingResult)
					{ // if query failed to execute then print error msg
						$errorMsg = mysql_errno()." : failed to display heading";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
                	}
					$subcatRow = mysql_fetch_assoc($subcatHeadingResult);
					
					/*$subsubcatHead = "select heading from subsubcategory where subsubcategoryid = '$subsubcategoryid'";
					$subsubcatHeadResult = $connectionObject->executeQuery($subsubcatHead);
					if(!subsubcatHeadResult)
					{
						$errorMsg = mysql_errno()." : failed to display heading";
						echo $errorMsg;
						//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
						exit();
					}
					$subsubRow = mysql_fetch_assoc($subsubcatHeadResult);*/
			 ?>
            <tr>
              <td width="13%" align="center" valign="top" class="style77"><span class="style777">
			  <?php 
			   if ($productRow['image']!='')
			   {
			  ?>
			  <img src="../user/uploads/usersimage/<?php echo $productRow['image']; ?>" border="1" class="style8" width="120" height="79"/>
			  <?php
			  }
			  ?>
			  </span></td>
			   <td  align="left" valign="top" class="style77"><div style="margin:1px;"><?php echo $productRow['key_word']?></div></td>
<!--			    <td width="16%" align="left" valign="top" class="style77"><?php echo $subsubRow['cat_name']; ?> <?php if ($subsubRow['cat_name']=='') echo 'N/A';?></td>
				
				 <td width="19%" align="left" valign="top" class="style77"><?php echo $subcatRow['cat_name']; ?> <?php if ($subcatRow['cat_name']=='') echo 'N/A';?></td>-->
				 
              <td align="left" valign="top" class="style77"><span style="margin:1px;">
                <?php echo $catRow['cat_name']; ?>
              </span></td>
             
             
             
              <td  align="left" valign="top" class="style77">
			  	<?php echo $productRow['company_name'];?>			  </td>

<td align="left"><a href="web_product_status.php?id=<?php echo $productRow['id']?>&status=<?php echo $productRow['status']?>"><span class="label label-info pull-center"><?php echo stripslashes($productRow['status'])?></span></a></td>
	<td align="left"><a href="web_product_pagetype.php?id=<?php echo $productRow['id']?>&pagetype=<?php echo $productRow['pagetype']?>"><span class="label label-info pull-center"><?php echo stripslashes($productRow['pagetype'])?></span></a></td>
              <td align="center" valign="top" class="style77"><div style="margin:3px;"><a href="edit_user.php?id=<?php echo $productRow['id']?>">Edit</a>&nbsp;|&nbsp;<a href="#" onClick=" del('<?php	echo stripslashes($productRow['id']);?>');">Delete</a></div></td>
            </tr>
          <tr>
            <td height="2" colspan="7" align="center" valign="top" bgcolor="#E7EFB8" ></td>
          </tr>
          <?php
			 }
		}else{
			echo '<div class="style77" style="padding:10px;">Sorry, No Records</div>';
		}
		  ?>
		  <script>
      function del(id)
          { 
		if(confirm('Sure To Remove This Record ?'))
	        {
		         window.location.href='web_product_view.php?del='+id;
	        } 
          } 
      </script>
          <tr>
            <td colspan="6" align="center" valign="bottom" class="style7B">&nbsp;</td>
            <td align="center" valign="top" class="style7B">&nbsp;</td>
          </tr>
        </table></th>
      </tr>
      <tr>
        <th height="20" colspan="2" align="right" valign="top" class="style77" scope="col"><a href="web_product_add.php" class="style10"><font color="#FF0000">Add New Product</font></a>&nbsp;</th>
      </tr>
    </table></td>
  </tr>
</table>
</body>
</html>