<?php 
include_once('db.php');
if(isset($_POST['register']))
{
	//print_r($_POST);
	//die();
    $cat_id= (int)$_POST['cat_id']; 
	
		$name = $_FILES['image']['name'];
		$tmp_name =  $_FILES['image']['tmp_name'];
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
	$company_name=htmlentities(addslashes(trim($_POST['company_name'])));
	$email=htmlentities(addslashes(trim($_POST['email'])));
	$address=htmlentities(addslashes(trim($_POST['address'])));
	$country=htmlentities(addslashes(trim($_POST['country'])));
	$state=htmlentities(addslashes(trim($_POST['state'])));
	$city=htmlentities(addslashes(trim($_POST['city'])));
	$pincode=htmlentities(addslashes(trim($_POST['pincode'])));
	$phone=htmlentities(addslashes(trim($_POST['phone'])));
	$mobile=htmlentities(addslashes(trim($_POST['mobile'])));
	$fax=htmlentities(addslashes(trim($_POST['fax'])));
	$website=htmlentities(addslashes(trim($_POST['website'])));
	$branch_address=htmlentities(addslashes(trim($_POST['branch_address'])));
	$establish_date=htmlentities(addslashes(trim($_POST['establish_date'])));
	$title=htmlentities(addslashes(trim($_POST['title'])));
	$key_word=htmlentities(addslashes(trim($_POST['key_word'])));
		

	$google_map=htmlentities(addslashes(trim($_POST['google_map'])));
	$description=htmlentities(addslashes(trim($_POST['description'])));
	//$pdesc=htmlentities(addslashes(trim($_POST['pdisc'])));
	//$stock=htmlentities(addslashes(trim($_POST['stock'])));
	//$pdescr=htmlentities(addslashes(trim($_POST['pdescr']))); 
	$q1="update  users SET cat_id='$cat_id',name='$name',company_name='$company_name', email='$email',address='$address',country='$country',state='$state', city='$city',pincode='$pincode',phone='$phone',mobile='$mobile',fax='$fax',website='$website',branch_address='$branch_address',establish_date='$establish_date',key_word='$key_word',google_map='$google_map',description='$description',image='$new_name' where id='".$_SESSION['id']."'";
	$in=ExecuteQuery($q1);
	//print_r($in);
	header('location:company.php');
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
			<div style="text-align:center";>	  Welcome To Windamart Dashboard </div>
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
		<li><a href="company.php">Compny Details</a></li>
		<li><a href="document.php">Documents</a></li>
		<li><a href="#">Completed</a></li>
		</ul>
		</div>
		</div>
		  <div class="col-lg-5 col-md-5">
		  <h3>Please provide your details</h3>
			<div>
				<form class="form-horizontal" name="form" method="post" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="inputCategory" class="col-sm-3 control-label">Category</label>
						<div class="col-sm-9">
						  <select class="form-control" name="cat_id">
							  <option value="">Select Category</option>
							  <?php 
									$q="select * from category  ";
									$ar=ExecuteQueryResule($q);
									 foreach($ar as $ak)
									 { 
									 	$id=(int)$ak['id'];
										$cat_name=htmlentities(addslashes(trim($ak['cat_name'])));
								    ?>
							
								<option value="<?php echo $id;?>" <?php if($id==$id){ echo  'selected'; }?>><?php echo $cat_name ?></option>
								
								  <?php }?>
							  
						  </select>
						</div>
				  </div>

				  <div class="form-group">
					<label for="inputName" class="col-sm-3 control-label"> Name :</label>
					<div class="col-sm-9">
					  <input type="text" name="name" class="form-control" value=""  placeholder="Name">
					</div>
				  </div>


				  <div class="form-group">
					<label for="Company Name" class="col-sm-3 control-label">Company Name :</label>
					<div class="col-sm-9">
					  <input type="text" name="company_name" value="" class="form-control"  placeholder="Company Name">
					</div>
				  </div>

				  <div class="form-group">
					<label for="Email" class="col-sm-3 control-label">Email :</label>
					<div class="col-sm-9">
						  <input type="text" name="email" value="" class="form-control"  placeholder="Email">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Addresses" class="col-sm-3 control-label">Addresses :</label>
					<div class="col-sm-9">
							<textarea class="form-control" name="address"  ></textarea>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Country" class="col-sm-3 control-label">Country :</label>
					<div class="col-sm-9">
						  <input type="text" name="country" value="" class="form-control"  placeholder="Country">

					 </div>
					</div>
				  <div class="form-group">
					<label for="State" class="col-sm-3 control-label">State :</label>
					<div class="col-sm-9">
						  <input type="text" name="state" value="" class="form-control"  placeholder="State">

					 </div>
					</div>
				  <div class="form-group">
					<label for="City" class="col-sm-3 control-label">City :</label>
					<div class="col-sm-9">
						  <input type="text" name="city" value="" class="form-control"  placeholder="City">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Pin Code" class="col-sm-3 control-label">Pin Code :</label>
					<div class="col-sm-9">
						  <input type="text" name="pincode" value="" class="form-control"  placeholder="Pin Code">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Phone Number" class="col-sm-3 control-label">Phone Number :</label>
					<div class="col-sm-9">
						  <input type="text" name="phone" value="" class="form-control"  placeholder="Phone Number">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Mobile" class="col-sm-3 control-label">Mobile :</label>
					<div class="col-sm-9">
						  <input type="text" name="mobile" value="" class="form-control"  placeholder="Mobile">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Fax No." class="col-sm-3 control-label">Fax No.</label>
					<div class="col-sm-9">
						  <input type="text" name="fax" value="" class="form-control"  placeholder="Fax No.">

					 </div>
					</div>
				  <div class="form-group">
				   <label for="Website URL" class="col-sm-3 control-label">Website URL</label>
					<div class="col-sm-9">
						  <input type="text" name="website" value="" class="form-control"  placeholder="Website URL">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Branch Address" class="col-sm-3 control-label">Branch Address </label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="branch_address" value=""></textarea>

					 </div>
					</div>

				  <div class="form-group">
					<label for="Establish" class="col-sm-3 control-label">Date Of Establish </label>
					<div class="col-sm-9">
						  <input type="text" name="establish_date" value="" class="form-control"  placeholder="Establish Date">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Branch Address" class="col-sm-3 control-label">Title</label>
					<div class="col-sm-9">
						  <input type="text" name="title" value="" class="form-control"  placeholder="Title">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Image</label>
					<input type="file" name="image"  id="InputImage">
						<div class="col-sm-10">

				  </div>
					</div>
				  <div class="form-group">
					<label for="Key Word" class="col-sm-3 control-label">Key Word </label>
					<div class="col-sm-9">
						  <input type="text" name="key_word" value="" class="form-control"  placeholder="Key Word">

					 </div>
					</div>

				  <div class="form-group">
					<label for="Google Map" class="col-sm-3 control-label">Google Map</label>
					<div class="col-sm-9">
						  <input type="text" name="google_map" value="" class="form-control"  placeholder="Google Map">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Description" class="col-sm-3 control-label">Description</label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="description" value="" ></textarea>

					 </div>
					</div>

				  <button type="submit" name="register" class="btn btn-primary">Resistration</button>
				</form>
		  </div>
		</div>
	  </div>

	  <div> <button type="button" class="btn btn-pr">Go To Payment</button></div>

	 </div>
	
	
	
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
