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
	
     $tbl_name="informative";
	
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







<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Control Panel : Winder Mart</title>
<script>
function goBack() {
    window.history.back()
}
</script>
<style type="text/css">
*******************************************************************************
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
background-color:#6e8dff;
}
div.pagination span.disabled {
display:none;
}
</style>
<link href="../css/admincss.css" rel="stylesheet" type="text/css" />
<link rel="shortcut icon" href="../favicon.ico">
<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
</head>
<!--<script type="text/javascript" src="ckeditor/ckeditor.js"></script>
<script src="ckeditor/sample.js" type="text/javascript"></script>
<link href="ckeditor/sample.css" rel="stylesheet" type="text/css" />-->
<script type="text/javascript" language="JavaScript">
	function validate()
	{
	
	if(document.addfrm.heading.value=="")
		{
		
		alert('Enter The Heading');
		document.addfrm.heading.focus();
		return false;
		}
		
		
	}

 </script>
<body onload="document.getElementById('myArea1').focus()" >
<table width="100%" border="0" cellspacing="0" cellpadding="0">
  
  <tr>
    <td align="left" valign="top" ><table width="100%" border="0" cellspacing="4" cellpadding="4">
        <tr>
         
          <td align="left" valign="top"  class="grayfour"><table width="100%" border="0" cellpadding="2" cellspacing="2">
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
<table width="100%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#999999" bgcolor="#FFFFFF">

    <td valign="top"><table width="100%" border="0" align="left" cellpadding="0" cellspacing="0">
      <tr>
       <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >View Informative</th>
        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
		<?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        <button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
          
      </tr>
	 <tr>
     <td>&nbsp;</td>
     </tr>
      <tr>
        <th colspan="4" align="right" valign="top" class="style77" scope="col"><a href="informative_add.php"><font color="#FF0000">Add New Page
        </font></a>&nbsp;&nbsp;</th>
      </tr>
      <tr>
     <td>&nbsp;</td>
     </tr>
      <tr>
        <th height="22" colspan="2" class="style77" scope="col" colspan="2">
        <table width="99%" border="0" align="center" cellpadding="0" cellspacing="0">             
          <tr>
		  <!--  <td width="15%" align="left" valign="middle" bgcolor="#999999" class="style10"> Image </td>-->
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
			 <!--<td align="left"><div style="margin:3px;">
			  <?php if ($userRow['imgName']!=''){?>
			  <img src="../docs/informative/<?php echo stripslashes($userRow['imgName'])?>" width="75" height="94" border="0"/>
			  <?php } else {?>
			  <img src="img/img_not_available.jpg" width="75" height="94" border="0"/>
			  <?php }?>
			  </div></td>-->
<td align="left"><div style="margin:1px;"><?php echo stripslashes($userRow['heading'])?>
</div></td>
<td align="left"><span class="label label-info pull-center"><?php echo stripslashes($userRow['numbering'])?></span></td>
<td align="left"><span class="label label-info pull-center"><?php echo stripslashes($userRow['informativeid'])?></span></td>
<td align="left"><a href="informative_status.php?informativeid=<?php echo $userRow['informativeid']?>&status=<?php echo $userRow['status']?>"><span class="label label-info pull-center"><?php echo stripslashes($userRow['status'])?></span></a></td>

<td>
<a href="informative_edit.php?informativeid=<?php echo stripslashes($userRow['informativeid']);?>" class="btn btn-danger btn-sm show-tooltip" title="Edit">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;Edit</a>
<!--<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="informative_delete_one.php?informativeid=<?php echo stripslashes($userRow['informativeid']);?>" onClick="return checkfields(this);">Delete</a>-->
</td>
            </tr>

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
       <!-- <th colspan="4" align="right" valign="top" class="style77" scope="col"><a href="informative_add.php"><font color="#FF0000">Add New Page
        </font></a>&nbsp;&nbsp;</th>-->
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