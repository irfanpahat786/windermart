<?php 
include_once('db.php');
include_once('check.php');
if(isset($_POST['register']))
{
	//print_r($_POST);
	//die();
    $cat_id= (int)$_POST['cat_id']; 
    $prod_id= (int)$_POST['prod_id'];
    $sub_pro_id= $_POST['sub_pro_id'];
	
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
		$name1 = $_FILES['image1']['name'];
		$tmp_name1 =  $_FILES['image1']['tmp_name'];
		$location1 = "../uploads/usersimage/";
		$new_name1 = time()."-".rand(1000, 9999)."-".$name1;

		if (move_uploaded_file($tmp_name1, 'uploads/usersimage/'.$new_name1)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name1 = time()."-".rand(1000, 9999)."-".$name1;
			if (move_uploaded_file($tmp_name1, 'uploads/usersimage/'.$new_name1)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
		$name2 = $_FILES['image2']['name'];
		$tmp_name2 =  $_FILES['image2']['tmp_name'];
		$location2 = "../uploads/usersimage/";
		$new_name2 = time()."-".rand(1000, 9999)."-".$name2;

		if (move_uploaded_file($tmp_name2, 'uploads/usersimage/'.$new_name2)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name2 = time()."-".rand(1000, 9999)."-".$name2;
			if (move_uploaded_file($tmp_name2, 'uploads/usersimage/'.$new_name2)){
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
	//$title=htmlentities(addslashes(trim($_POST['title'])));
	$key_word=htmlentities(addslashes(trim($_POST['key_word'])));
		

	$google_map=htmlentities(addslashes(trim($_POST['google_map'])));
	$description=htmlentities(addslashes(trim($_POST['description'])));
	$description1=htmlentities(addslashes(trim($_POST['description1'])));
	$description2=htmlentities(addslashes(trim($_POST['description2'])));
	//$pdescr=htmlentities(addslashes(trim($_POST['pdescr']))); 
	$q1="update  users SET cat_id='$cat_id',prod_id='$prod_id',sub_pro_id='$sub_pro_id',name='$name',company_name='$company_name', email='$email',address='$address',country='$country',state='$state', city='$city',pincode='$pincode',phone='$phone',mobile='$mobile',fax='$fax',website='$website',branch_address='$branch_address',establish_date='$establish_date',key_word='$key_word',google_map='$google_map',description='$description',description1='$description1',description2='$description2',image='$new_name',image1='$new_name1',image2='$new_name2',status='inactive',pagetype='verified' where id='".$_SESSION['id']."'";
	$in=ExecuteQuery($q1);
	//print_r($in);
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
			<div class="col-lg-12 col-md-12">
			<div style="text-align:center";>	  Welcome To Windermart User  Dashboard </div>
			</div>


		  </div>
		 </div>
	</header>
   	

	<div class="container">
	  <div class="row">
		<div class="col-lg-3 col-md-3">
		<div class="sidewrap">
		<h2>FILL PROFILE IN FEW STEPS</h2><?php //echo $_SESSION['company_name']; ?>
		<ul>
		<li><a href="index.php">Company Details</a></li>
		<li><a href="company.php">About Company</a></li>
		<!--<li><a href="company.php">Compny Details</a></li>-->
		<!--<li><a href="document.php">Documents</a></li>-->
		<!--<li><a href="#">Completed</a></li>-->
		<?php 
					$sql="select * from users where id='".$_SESSION['id']."'";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $qp)
					{
				?>
				<li><img src="uploads/usersimage/<?php echo $qp['image'];?>" height="100" width="100"></li>
			<?php  } ?>
						<?php
                                if(isset($_SESSION['id']) && $_SESSION['id']!= ''){
                        ?>
                        <li class="nav-item">
							<a href="../logout.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Logout  </a></li>
							<?php
                                    }else{
                                ?>  
                                <li class="nav-item">
                                <a href="../login.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Login  </a></li>
                                <?php
                                    }
                                ?>
		</ul>
		</div>
		</div>
		  <div class="col-lg-5 col-md-5">
		  <h3>Please provide your details</h3>
			<div>
				<?php 
					$sql="select * from users where id='".$_SESSION['id']."'";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $qp)
					{
				?>
				<form class="form-horizontal" name="memberform" method="post" enctype="multipart/form-data">
				  <div class="form-group">
					<label for="inputCategory" class="col-sm-3 control-label">Category</label>
						<div class="col-sm-9">
						
						<?php 
									$q="select * from category  ";
									$ar=ExecuteQueryResule($q);
									 
								    ?>
						  <select class="form-control" id="category" name="cat_id">
							  <option value="">Select Category</option>
							<?php
							  if(count($ar)>0)
								{ 
									foreach($ar as $ak)
									{ 
									 	
								    //print_r($ak);
									 echo '<option value="'.$ak['id'].'">'.$ak['cat_name'].'</option>';
									}
								}else
								{
								    echo '<option value="">Category not available</option>';
								}
								?>
								
								  
							  
						  </select>
						</div>
				  </div>
				  <div class="form-group">
					<label for="inputCategory" class="col-sm-3 control-label">Product</label>
						<div class="col-sm-9">
						  <select class="form-control" id="product" name="prod_id">
							  <option value="">Select Category first</option>
							  
							  
						  </select>
						</div>
				  </div>
				  <div class="form-group">
					<label for="inputCategory" class="col-sm-3 control-label">Sub Product</label>
						<div class="col-sm-9">
							<input type="text" name="sub_pro_id" class="form-control" value="<?php echo $qp['sub_pro_id'];?>"  placeholder="Sub Product" >
						  <!--<select class="form-control" name="sub_pro_id">
							  <option value="">Select Sub Product</option>
							  <?php /*?> <?php 
									$q="select * from subproduct  ";
									$ar=ExecuteQueryResule($q);
									 foreach($ar as $ak)
									 { 
									 	$id=(int)$ak['id'];
										$cat_name=htmlentities(addslashes(trim($ak['subproduct'])));
								    ?>
							
								<option value="<?php echo $id;?>" <?php if($id==$id){ echo  'selected'; }?>><?php echo $cat_name ?></option>
								
								  <?php }*/?>
							  
						  </select>-->
						</div>
				  </div>
				  <div class="form-group">
					<label for="inputName" class="col-sm-3 control-label"> Name *:</label>
					<div class="col-sm-9">
					  <input type="text" name="name" class="form-control" value="<?php echo $qp['name'];?>"  placeholder="Name" required>
					</div>
				  </div>


				  <div class="form-group">
					<label for="Company Name" class="col-sm-3 control-label">Company Name *:</label>
					<div class="col-sm-9">
					  <input type="text" name="company_name" value="<?php echo $qp['company_name'];?>" class="form-control"  placeholder="Company Name" required>
					</div>
				  </div>

				  <div class="form-group">
					<label for="Email" class="col-sm-3 control-label">Email *:</label>
					<div class="col-sm-9">
						  <input type="email" name="email" value="<?php echo $qp['email'];?>" class="form-control"  placeholder="Email" required>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Addresses" class="col-sm-3 control-label">Addresses *:</label>
					<div class="col-sm-9">
							<textarea class="form-control" name="address"  required><?php echo $qp['address'];?></textarea>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Country" class="col-sm-3 control-label" required>Country *:</label>
					<div class="col-sm-9">
						  <input type="text" name="country" value="<?php echo $qp['country'];?>" class="form-control"  placeholder="Country" required>

					 </div>
					</div>
				  <div class="form-group">
					<label for="State" class="col-sm-3 control-label">State *:</label>
					<div class="col-sm-9">
						  <input type="text" name="state" value="<?php echo $qp['state'];?>" class="form-control"  placeholder="State" required>

					 </div>
					</div>
				  <div class="form-group">
					<label for="City" class="col-sm-3 control-label">City *:</label>
					<div class="col-sm-9">
						  <input type="text" name="city" value="<?php echo $qp['city'];?>" class="form-control"  placeholder="City" required>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Pin Code" class="col-sm-3 control-label">Pin Code :</label>
					<div class="col-sm-9">
						  <input type="text" name="pincode" value="<?php echo $qp['pincode'];?>" class="form-control"  placeholder="Pin Code">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Phone Number" class="col-sm-3 control-label">Phone Number :</label>
					<div class="col-sm-9">
						  <input type="text" name="phone" value="<?php echo $qp['phone'];?>" class="form-control"  placeholder="Phone Number" >

					 </div>
					</div>
				  <div class="form-group">
					<label for="Mobile" class="col-sm-3 control-label">Mobile *:</label>
					<div class="col-sm-9">
						  <input type="text" name="mobile" value="<?php echo $qp['mobile'];?>" class="form-control"  placeholder="Mobile" required>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Fax No." class="col-sm-3 control-label">Fax No.</label>
					<div class="col-sm-9">
						  <input type="text" name="fax" value="<?php echo $qp['fax'];?>" class="form-control"  placeholder="Fax No.">

					 </div>
					</div>
				  <div class="form-group">
				   <label for="Website URL" class="col-sm-3 control-label">Website URL</label>
					<div class="col-sm-9">
						  <input type="text" name="website" value="<?php echo $qp['website'];?>" class="form-control"  placeholder="Website URL">

					 </div>
					</div>
				  <div class="form-group">
					<label for="Branch Address" class="col-sm-3 control-label">Branch Address :</label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="branch_address" value=""><?php echo $qp['branch_address'];?></textarea>

					 </div>
					</div>

				  <div class="form-group">
					<label for="Establish" class="col-sm-3 control-label">Date Of Establish :</label>
					<div class="col-sm-9">
						<input type="text" name="establish_date" value="<?php echo $qp['establish_date'];?>" class="form-control"  placeholder="Establish Date" >

					 </div>
					</div>
				  <!--<div class="form-group">
					<label for="Branch Address" class="col-sm-3 control-label">Title</label>
					<div class="col-sm-9">
						  <input type="text" name="title" value="<?php //echo $qp['title'];?>" class="form-control"  placeholder="Title">

					 </div>
					</div>-->
				  <div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image * :</label>
					<input type="file" name="image"  id="InputImage" required>
						<div class="col-sm-10">

				  		</div>
					</div>
					<div class="form-group">
					<label for="Description" class="col-sm-3 control-label">Product Description * :</label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="description" cols="50" rows="5"  required><?php echo $qp['description'];?></textarea>

					 </div>
					</div>
					<div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image 2* :</label>
					<input type="file" name="image1"  id="InputImage" required>
						<div class="col-sm-10">

				  		</div>
					</div>
					
					<div class="form-group">
					<label for="Description" class="col-sm-3 control-label">Product Description 2* :</label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="description1" cols="50" rows="5"  required><?php echo $qp['description1'];?></textarea>

					 </div>
					</div>
					<div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image 3 * :</label>
					<input type="file" name="image2"  id="InputImage" required>
						<div class="col-sm-10">

				  		</div>
					</div>
					<div class="form-group">
					<label for="Description" class="col-sm-3 control-label">Product Description 3 * :</label>
					<div class="col-sm-9">
						  <textarea class="form-control" name="description2" cols="50" rows="5"  required><?php echo $qp['description2'];?></textarea>

					 </div>
					</div>
				  <div class="form-group">
					<label for="Key Word" class="col-sm-3 control-label">Key Word * :</label>
					<div class="col-sm-9">
						  <input type="text" name="key_word" value="<?php echo $qp['key_word'];?>" class="form-control"  placeholder="Key Word" required>

					 </div>
					</div>
					
				  <div class="form-group">
					<label for="Google Map" class="col-sm-3 control-label">Google Map</label>
					<div class="col-sm-9">
						  <input type="text" name="google_map" value="<?php echo $qp['google_map'];?>" class="form-control"  placeholder="Google Map">

					 </div>
					</div>
				  

				  <button type="submit" name="register" class="btn btn-primary" onClick="return submitForm();">Registration</button>
				</form>
				<?php } ?>
		  </div>
		</div>
	  </div>

	  <div> <a href="pricelisting.php"> <button type="button" class="btn btn-pr">Go To Payment</button></a></div>

	 </div>
	
	
	
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
    <script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<script type="text/javascript">
	function submitForm()
	{
		if(document.memberform.cat_id.value=="")
		{
			alert("Please Select Category Name");
			document.memberform.cat_id.focus();
			return false;
		}
		if(document.memberform.prod_id.value=="")
		{
			alert("Please Select Product Name");
			document.memberform.prod_id.focus();
			return false;
		}
		/*if(document.memberform.sub_pro_id.value=="")
		{
			alert("Please Select Sub Product Name");
			document.memberform.sub_pro_id.focus();
			return false;
		}*/
		if(document.memberform.name.value=="")
		{
			alert("Please Enter Your Name");
			document.memberform.name.focus();
			return false;
		}
		if(document.memberform.company_name.value=="")
		{
			alert("Please Enter Company  Name");
			document.memberform.company_name.focus();
			return false;
		}
		if(document.memberform.email.value=="")
		{
			alert("Please Enter Email  ");
			document.memberform.email.focus();
			return false;
		}
		if(document.memberform.address.value=="")
		{
			alert("Please Enter Address ");
			document.memberform.address.focus();
			return false;
		}
		if(document.memberform.country.value=="")
		{
			alert("Please Enter  Country Name");
			document.memberform.country.focus();
			return false;
		}
		if(document.memberform.state.value=="")
		{
			alert("Please Enter State Name");
			document.memberform.state.focus();
			return false;
		}
		if(document.memberform.city.value=="")
		{
			alert("Please Enter City Name");
			document.memberform.city.focus();
			return false;
		}
		if(document.memberform.mobile.value=="")
		{
			alert("Please Enter mobile Number");
			document.memberform.mobile.focus();
			return false;
		}
		/*if(document.memberform.branch_address.value=="")
		{
			alert("Please Enter  Branch Address ");
			document.memberform.branch_address.focus();
			return false;
		}
		if(document.memberform.establish_date.value=="")
		{
			alert("Please Enter Establish Date");
			document.memberform.establish_date.focus();
			return false;
		}*/
		if(document.memberform.image.value=="")
		{
			alert("Please Upload  Product Image");
			document.memberform.image.focus();
			return false;
		}
		if(document.memberform.image1.value=="")
		{
			alert("Please Upload Sub Product Image First");
			document.memberform.image1.focus();
			return false;
		}
		if(document.memberform.image2.value=="")
		{
			alert("Please Upload Sub Product Image Second");
			document.memberform.image2.focus();
			return false;
		}
		if(document.memberform.description.value=="")
		{
			alert("Please Enter  Product Description ");
			document.memberform.description.focus();
			return false;
		}
	}
</script>
<script src="js/jquery-1.7.1.min.js"></script>
<!--<script src="js/jquery.min.js"></script>-->
<!--<script src="js/jquery.js"></script>-->
<script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
        var catId = $(this).val();
        if(catId){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id='+catId,
                success:function(html){
                    $('#product').html(html);
                   
                }
            }); 
        }else{
            $('#product').html('<option value="">Select category first</option>');
            
        }
    });
    
   
});
</script>
<script>
    
/*$('document').ready(function(){

	$('select[name=cat_name]').change(function(){

		var catId = $(this).val();

    console.log('changed ! '+catId);
		$.ajax({

			url : "ajax.php",
			type : 'POST',
			data: {"cat_name":'cat_name',catId:catId},
			beforeSend : function(){

			} ,
			success: function(response) {

				console.log(response);
			} 

		});

	});

});*/
    
</script>
  </body>
</html>
