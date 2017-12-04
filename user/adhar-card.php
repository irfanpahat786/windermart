<?php 
include_once('db.php');
include_once('check.php');
if(isset($_POST['add']))
{
	
	
		$name = $_FILES['docs']['name'];
		$tmp_name =  $_FILES['docs']['tmp_name'];
		$location = "../uploads/usersimage/";
		$new_name = time()."-".rand(1000, 9999)."-".$name;

		if (move_uploaded_file($tmp_name, 'uploads/usersimage/'.$new_name)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name = time()."-".rand(1000, 9999)."-".$name;
			if (move_uploaded_file($tmp_name, 'uploads/usersimage/'.$new_name)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
	$name=htmlentities(addslashes(trim($_POST['name'])));
	$adhar_no=htmlentities(addslashes(trim($_POST['adhar_no'])));
	$email=htmlentities(addslashes(trim($_POST['email'])));
	
	
	$pincode=htmlentities(addslashes(trim($_POST['pincode'])));
	
	
	
	$title=htmlentities(addslashes(trim($_POST['title'])));
	
	//$todo=$_POST['todo'];

	

	$month=htmlentities(addslashes(trim($_POST['month'])));

	$day=htmlentities(addslashes(trim($_POST['day'])));

	$year=htmlentities(addslashes(trim($_POST['year'])));

	//$date_value="$month/$dt/$year";

	//echo "mm/dd/yyyy format :$date_value<br>";

	$date_value="$day-$month-$year";

	echo "YYYY-mm-dd format :$date_value<br>";
	

	
	$q1="insert into document SET u_id='".$_SESSION['id']."', name='$name',adhar_no='$adhar_no', email='$email',pincode='$pincode',title='$title',docs='$new_name',dob='$date_value'";
	$in=ExecuteQuery($q1);
	//print_r($in);
	header('location:document.php');
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
					<div class="col-lg-12 col-md-12">
						<div><?php echo $_SESSION['name'];?></div>
					</div>


			   </div>
		 </div>
	</header>
   	

	<div class="container">
	  <div class="row">
		<div class="col-lg-3 col-md-3">
			<div class="sidewrap">
				<h2>FILL PROFILE IN FEW STEPS</h2>
				<ul>
				<li><a href="index.php">Personal Details</a></li>
				<!--<li><a href="addres.php">Addresses</a></li>-->
				<li><a href="Family.php">Family & Friends</a></li>
				<li><a href="document.php">Documents</a></li>
				<li><a href="#">Completed</a></li>
				</ul>
			</div>
		</div>
	  <form name="form" method="post" enctype="multipart/form-data">
		<div class="col-lg-9 col-md-9">

		 <div class="row" style="border:1px solid #ebebeb; margin:30px 20px; padding-bottom:30px;">


			
				<div class="form-group">

					<div class="col-sm-2">
					  <p>Title:</p>
						 <select class="form-control" name="title">
							  <option>Mr</option>
							  <option>Mrs</option>
							  <option>Ms</option>
							  <option>Miss</option>
							  <option>Master</option>
						</select>
					  </div>
					  <div class="col-sm-3">
						<p>Name:</p>
						  <input type="text" name="name" class="form-control"  placeholder="First Name">
					   </div>
					  <div class="col-sm-3">
						<p>Aadhar Number</p>
						  <input type="text" name="adhar_no" class="form-control"  placeholder="Enter Aadhar Number">
					  </div>
					  <div class="col-sm-4">
						<p>File input:</p>
						 <div class="form-group">

							<input type="file" name="docs" id="exampleInputFile">
						  </div>
						</div>
				  </div>

				  <div class="form-group">

					<div class="col-sm-8">
						<p>Enter Email:</p>
						  <input type="text" name="email" class="form-control"  placeholder="Enter Email">
					</div>
					<div class="col-sm-4">
						<p>Pin Code</p>
						  <input type="text" name="pincode" class="form-control"  placeholder="Enter Pin Code">
					</div>

				  </div>
				  <div class="form-group">

					 <div class="col-sm-3">
						 <p style="    margin-top: -18px;">DOB :</p>
						  <select class="form-control" name="day">
							  <option value="">Select Date</option>
							
						 <?php 
							for($i=0;$i<=30;$i++){
							$day=date('d',strtotime(" +$i day"));
							echo "<option value=$day>$day</option> ";
							}
							
						 ?>
						 </select>
						</div>


					   <div class="col-sm-3">
						<p></p>
						  <select class="form-control" name="month">
							  <option value="">Select Month</option>
							  
						   <?php 
							for($i=0;$i<=11;$i++){
							$month=date('F',strtotime("first day of -$i month"));
							echo "<option value=$month>$month</option> ";
							}
							
						 ?>
						   </select>
						</div>
						<div class="col-sm-3">
						<p></p>
						  <select class="form-control" name="year">
								  <option value="">Select Year</option>
							  
								   <?php 
									for($i=0;$i<=115;$i++){
									$year=date('Y',strtotime("last day of -$i year"));
									echo "<option name='$year'>$year</option>";
									}

								 ?>
							</select>
						</div>
					  </div>

				 <button type="submit" name="add" class="btn btn-primary">Add </button>
		     </div>
		   <button type="submit" name="save" class="btn btn-primary">Save & Continue</button>
		</div>

	   </form>
  
	  </div>
   </div>
	
	
	
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
