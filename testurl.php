<?php include_once('header.php');?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title>Untitled Document</title>
</head>

<body>
<table width="200" border="1">
  <tr>
    <td>id</td>
    <td>url</td>
	<td>image</td>
	<td>image1</td>
	<td>image2</td>
  </tr>
 <?php								$m="select * from users  ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {
											$url = $ak['url'];
											$id=$ak['id'];
											?>
 
   <tr>
    <td><?php echo $id; ?></td>
    <td><?php echo $url; ?></td>
	<td><img src="user/uploads/usersimage/<?php echo $ak['image']; ?>" height="100" width="100"><?php echo $ak['image']; ?></td>
	<td><img src="user/uploads/usersimage/<?php echo $ak['image1']; ?>" height="100" width="100"><?php echo $ak['image1']; ?></td>
	<td><img src="user/uploads/usersimage/<?php echo $ak['image2']; ?>" height="100" width="100"><?php echo$ak['image2']; ?></td>
  </tr>
  <?php 

 }
										?>	
  <tr>
    <td>&nbsp;</td>
    <td>&nbsp;</td>
  </tr>
</table>

</body>
</html>
