<?php
session_start();
?>
<html>
<head>
<style type="text/css">
td a {text-decoration:none; color: #FFCC00; font-style:normal; font-size:11px }
td a:hover {color: #03617C; text-decoration:underline}
td { text-align:justify ; padding-left:12px;}
th { text-align:justify ; color:#03617C ;  padding-left:8px;}
th  a { text-decoration:none; text-align:justify ; color:#03617C}
</style>
<link href="img/style.css" rel="stylesheet" type="text/css">
<script src="cms_js/jquery.js" type="text/javascript"></script>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1"><style type="text/css">
<!--
body {
	background-color: #FFFFFF;
}
.style80 {font-size: 12px}
-->
</style><title>Control Panel : Winder Mart</title></head>
<body>

<table width="234" cellpadding="0" cellspacing="0" style="margin-left: 40px;">

<tr>
  <th class="style2">&nbsp;</th>
</tr>

<tr>
  <th class="style2"><a  href="updatepassword.php" onClick="parent.content.location.href='updatepassword.php'; return false;">Change Password</a></th>
</tr>
<tr>
  <th class="style2"><a href="#" id="memberOptionsAnchor" onClick="return showMemberOptions();">Product Management</a></th>
</tr>

<tr>
  <td class="style2"><table id="memberOptions">
      
     <tr>
      <td><a  href="manage_logo.php" onClick="parent.content.location.href='Manage_logo.php'; return false;">Manage Logo</a></td>
    </tr>
	<tr>
      <td><a  href="latest_post_view.php" onClick="parent.content.location.href='latest_post_view.php'; return false;">Advertisement</a></td>
    </tr>
    <tr>
      <td><a  href="advertisement_product.php" onClick="parent.content.location.href='advertisement_product.php'; return false;">Advertisement Product</a></td>
    </tr>
	<tr>
      <td><a  href="offer_view.php" onClick="parent.content.location.href='offer_view.php'; return false;">Offer Of The Day</a></td>
    </tr>
	<tr>
      <td><a  href="web_category_view.php" onClick="parent.content.location.href='web_category_view.php'; return false;">Manage Category</a></td>
    </tr>
	<tr>
      <td><a  href="add_mainproduct.php" onClick="parent.content.location.href='add_mainproduct.php'; return false;">Manage Main Product</a></td>
    </tr>
	<tr>
      <td><a  href="add_sub_product.php" onClick="parent.content.location.href='add_sub_product.php'; return false;">Manage Sub Product</a></td>
    </tr>
    <tr>
    <tr>
      <td><a  href="manage_header.php" onClick="parent.content.location.href='Manage_header.php'; return false;">Manage Header</a></td>
    </tr>
    
     <tr>
      <td><a  href="manage_slider.php" onClick="parent.content.location.href='Manage_slider.php'; return false;">Manage Slider</a></td>
    </tr>
    
    
    
    <tr>
      <td><li>Manage Package<ul><li><a  href="manage_package.php" onClick="parent.content.location.href='manage_package.php'; return false;">Package</a></</li><li><a  href="package_detail_view.php" onClick="parent.content.location.href='package_detail_view.php'; return false;">Package Detail</a></</li></ul></li></td>
    </tr>
    <tr>
    
      <td><a  href="manage_material.php" onClick="parent.content.location.href='Manage_material.php'; return false;">Material List</a></td>
    </tr>
    <tr>
      <td><a  href="web_category_view.php" onClick="parent.content.location.href='web_category_view.php'; return false;">Manage Product Category</a></td>
    </tr>
    <tr>
      <td><a  href="web_product_view.php" onClick="parent.content.location.href='web_product_view.php'; return false;">Manage Products</a></td>
    </tr>
	 <tr>
      <td><a  href="user_view.php" onClick="parent.content.location.href='user_view.php'; return false;">Users List</a></td>
    </tr>

	<tr>
      <td><a  href="informative_view.php" onClick="parent.content.location.href='informative_view.php'; return false;">Manage Informative Pages </a></td>
    </tr>
	
  </table></td>
</tr>

<tr><td height="20" class="style2"><a  href="logout.php" class="style2" onClick="parent.location.href='logout.php'; return false;">Logout</a></td>
</tr>
</table>
</body>
</html>