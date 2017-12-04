<?php include_once'header.php';?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1" />
<title></title>
<a href="http://www.windermart.com">
<?php 
	$q="select * from latestpost order by id desc limit 1 ";
	$ar=ExecuteQueryResule($q);
			foreach ($ar as $ak) {
	?>
	<img src="shareimg/<?php echo $ak['image'];?>" style=" width:100%;" alt="Business Directory India: Top Online Business Listing Site 2017" />
	<p><?php echo $ak['offers'];?></p>
	<?php } ?>
	</a>
</head>

<body>
<!-- Go to www.addthis.com/dashboard to customize your tools --> 
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-5986a6cc6eb68fdb"></script> 
</body>
</html>
