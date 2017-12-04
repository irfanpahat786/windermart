<?php 
include_once('db.php');
include_once('check.php');
if(isset($_POST['add']))
{
	//print_r($_POST);
	//die();
    //$cat_id= (int)$_POST['cat_id']; 
	
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
	$last_name=htmlentities(addslashes(trim($_POST['last_name'])));
	$father_name=htmlentities(addslashes(trim($_POST['father_name'])));
	$adhar_no=htmlentities(addslashes(trim($_POST['pan_no'])));
	$email=htmlentities(addslashes(trim($_POST['email'])));
	
	
	

	

	$month=htmlentities(addslashes(trim($_POST['month'])));

	$day=htmlentities(addslashes(trim($_POST['day'])));

	$year=htmlentities(addslashes(trim($_POST['year'])));

	//$date_value="$month/$dt/$year";

	//echo "mm/dd/yyyy format :$date_value<br>";

	$date_value="$day-$month-$year";

	echo "YYYY-mm-dd format :$date_value<br>";
	

	
	$q1="insert into document SET u_id='".$_SESSION['id']."', name='$name',last_name='$last_name',father_name='$father_name',pan_no='$pan_no', email='$email',docs='$new_name',dob='$date_value'";
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
			<!--<li><a href="addres.html">Addresses</a></li>-->
			<li><a href="company.php">Company Details</a></li>
			<li><a href="document.php">Documents</a></li>
			<li><a href="#">Completed</a></li>
			</ul>
			</div>
		</div>
		<form name="form" method="post" enctype="multipart/form-data">
		<div class="col-lg-9 col-md-9">

		 <div class="row" style="border:1px solid #ebebeb; margin:30px 20px; padding-bottom:30px;">


		  
				<!--<div class="form-group">


					<div class="col-sm-4">
						<p>Name:</p>
						  <input type="text" name="name" class="form-control"  placeholder="First Name">
					</div>
					 <div class="col-sm-4">
						<p>Last Name</p>
						  
						 <input type="text" name="last_name" class="form-control"  placeholder="Last Name">
					</div>
					<div class="col-sm-4">
						<p>Father's Name:</p>
						  
						<input type="text" name="father_name" class="form-control"  placeholder="Enter Father's Name">
					</div>
				  </div>

			  <div class="form-group">

				<div class="col-sm-4">
					<p>Enter Email:</p>
					  <input type="text" name="email" class="form-control"  placeholder="Enter Email">
				</div>
				<div class="col-sm-4">
					<p>PAN Number:</p>
					 
					<input type="text" name="pan_no" class="form-control"  placeholder="Enter PAN Number">
				</div>
				 <div class="col-sm-4">
					<p>File input:</p>
					 <div class="form-group">

						<input type="file" name="docs" id="exampleInputFile">
				    </div>
				</div>

	  		</div>-->
	  		<div class="form-group">

				 <div class="col-sm-3">
					 <p style="    margin-top: -18px;">Quarterly :</p>
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
				<p>1 Year</p>
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
				<p>3 Year</p>
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
