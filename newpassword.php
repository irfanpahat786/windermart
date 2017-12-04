<?php
include_once('db.php');

$error="";
if(isset($_POST['send']))
{  
    $password=md5(htmlentities(addslashes(trim($_POST['password']))));
	$cpassword=md5(htmlentities(addslashes(trim($_POST['cpassword']))));
		
	
	
	if($password!=$cpassword)
	{
	    $error="Password or confirm password not macthed";
	}
	if($error=='')
	{
		
		$q1="update  users SET password='$password',cpassword='$cpassword' where id='".$_SESSION["id"]."'";
		
		$in=ExecuteQuery($q1);
		//print_r($in);
		header('location:login.php');
	
	}
	
}
?>
<!DOCTYPE html>
<html>


<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
	
    <title>Materialist - Reset Password</title>
</head>

<body class="layout-empty">
	<div class="container reset-form">
	<div class="row">
		<div class="col-lg-4 col-lg-offset-4">
		    <p style='color:red'><?php  echo $error;?></p>
			<form method="post">
				<div class="form-group">
					<label for="">New Password</label>
					<input type="password" name="password" class="form-control">
				</div><!-- /.form-group -->
				<div class="form-group">
					<label for="">Confirm Password</label>
					<input type="password" name="cpassword" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group-btn">
					<button type="submit" name="send" class="btn btn-primary btn-block">Submit</button>
				</div><!-- /.form-group-btn -->

				<div class="form-group-bottom-link">
					<a href="login.php"><i class="fa fa-long-arrow-left"></i> Return back to login</a>
				</div><!-- /.form-group-bottom-link -->
			</form>
		</div><!-- /.col-* -->
	</div><!-- /.row -->
</div><!-- /.container -->

	

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>
</body>

<!-- Mirrored from materialist-html.wearecodevision.com/reset-password.html by HTTrack Website Copier/3.x [XR&CO'2014], Fri, 23 Jun 2017 06:23:07 GMT -->
</html>