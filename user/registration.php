<?php 
include_once('db.php');
if(isset($_POST['register']))
{
	
	$name=htmlentities(addslashes(trim($_POST['name'])));
	
	$email=htmlentities(addslashes(trim($_POST['email'])));


	$password=md5(htmlentities(addslashes(trim($_POST['password']))));
	$cpassword=md5(htmlentities(addslashes(trim($_POST['cpassword']))));
	
	$q1="insert into users SET name='$name', email='$email',password='$password',cpassword='$cpassword'";
	$in=ExecuteQuery($q1);
	//print_r($in);
	header('location:company.php');
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
	
    <title>Materialist - Registration</title>
</head>

<body class="layout-empty">
	<a href="index.html" class="return-back">
	<i class="fa fa-long-arrow-left"></i> Return Back</a>
</a>

<div class="container registration-form">	
	<form method="post">
		<div class="row">
			<div class="col-lg-5 col-lg-offset-4">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="name" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="">E-mail</label>
					<input type="mail" name="email" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="">Retype Password</label>
					<input type="password" name="cpassword" class="form-control">
				</div><!-- /.form-group -->

				<div class="center">
					<div class="checkbox">
						<label>
							<input type="checkbox"> By signing up, you agree with the <a href="#">terms and conditions</a>.
						</label>
					</div><!-- /.form-group -->

					<div class="form-group-btn">
						<button type="submit" name="register" class="btn btn-primary">Create Account</button>
					</div><!-- /.form-group-btn -->					
				</div><!-- /.center -->
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</form>			
</div><!-- /.container -->

	<!-- /.customizer -->

<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>
</body>

</html>