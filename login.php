<?php
include_once('db.php');
$error="";
if(isset($_POST['send']))
{  
	$email=htmlentities(addslashes(trim($_POST['email']))); 
	$password=md5($_POST['password']); 
	$aq1=" select id,email,password from users where email='$email' AND password='$password'  ";
	
	$art=ExecuteQueryResule($aq1); 
	
	if(count($art)>0)
	{ 
		$_SESSION["userid"]=$art[0]['id']; 
		$_SESSION["email"]=$art[0]['email']; 
		$_SESSION['name']=$art[0]['name'];
		$a="user/index.php";
		 ?> 
		<script type='text/javascript'>
		window.location.href = '<?php echo $a; ?>';
		</script>
		<?php
	}

	else 
	{ 
		$error="<p style='color:red'>Invalid User Or Password</p>"; 
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
	
    <title>Materialist - Login</title>
</head>

<body class="layout-empty">
	<a href="index.php" class="return-back">
	<i class="fa fa-long-arrow-left"></i> Return Back</a>
</a>

<div class="container login-form">
	<div class="row">
		<div class="col-lg-5 col-lg-offset-4">
			<h2>Log In Into Account</h2>
			<p style='color:red'><?php  echo $error;?></p>
			<form method="post">
				<div class="form-group">
					<label for="">Username</label>
					<input type="text" name="email" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group">
					<label for="">Password</label>
					<input type="password" name="password" class="form-control">
				</div><!-- /.form-group -->

				<div class="form-group-btn">
					<button type="submit" name="send" class="btn btn-primary pull-right">Sign In</button>
				</div><!-- /.form-group-btn -->

				<div class="form-group-bottom-link">
					<a href="reset-password.php">I forgot my password <i class="fa fa-long-arrow-left"></i></a>
					<a href="registration.php"><i class="fa fa-long-arrow-right"></i>Click here to registration </a>
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

</html>