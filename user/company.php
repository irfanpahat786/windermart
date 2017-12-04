<?php 
include_once('db.php');
//include_once('check.php');
if(isset($_POST['register']))
{
	//print_r($_POST);
	//die();
    
	$aboutcompany=htmlentities(addslashes(trim($_POST['aboutcompany'])));
	$q2=" update  users SET aboutcompany='$aboutcompany' where id='".$_SESSION['userid']."'";
	$in=ExecuteQuery($q2);
	header('location:index.php');
}
?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    
    <!-- Title -->
    <title>Personal Details</title>
    
   
    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/style.css" rel="stylesheet" /><!-- font css --> 
   
   
</head>
    
<body>
    
	<header>
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 col-md-12"><?php 
                             $l="select * from logo";
                             $lr=ExecuteQueryResule($l);
                           
                            
                             ?>
			<div><a href="../index.php" class="nav-link"><img src="../uploads/logo/<?php echo $lr[0]['image']; ?>" style="height:36px;"></a><a href="#" class="nav-link" style="margin-left:20%;">Welcome To Windermart User  Dashboard</a> </div>
			</div>


		  </div>
		 </div>
	</header>
   	

	<div class="container">
	  <div class="row">
		<div class="col-lg-3 col-md-3">
		<div class="sidewrap">
		<h2>FILL Compny Profile IN FEW STEPS</h2>
		<ul>
		<li><a href="index.php">Company Details</a></li>
		<li><a href="company.php">About Company</a></li>
		<!--<li><a href="company.php">Compny Details</a></li>-->
		<!--<li><a href="document.php">Documents</a></li>-->
		<!--<li><a href="#">Completed</a></li>-->
		</ul>
		</div>
		</div>
		  <div class="col-lg-5 col-md-5">
		  <h3>About Your Company Details</h3>
			<div>
			<?php
				$sql="select * from users where id ='".$_SESSION['userid']."'";
				$result=ExecuteQueryResule($sql);
				foreach($result as $results)
				{
				?>
				<form class="form-control" name="form" method="post" enctype="multipart/form-data">
					
				  
					
					<div class="row">
						  <textarea  name="aboutcompany" id="editor1" ><?php echo $results['aboutcompany'];?></textarea>

					 </div>
					

				  <button type="submit" name="register" class="btn btn-primary">Register</button>
				</form>
				<?php } ?>
		  </div>
		</div>
	  </div>

	  <div><!-- <button type="button" class="btn btn-pr">Go To Payment</button>--></div>

	 </div>
	
	
	
    <script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
	<script>
            CKEDITOR.replace( 'editor1' );
			
    </script>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
