<?php 
include_once('db.php');
include_once('check.php');
function makeContentUrl($contentText)
{
	$url='-';
	
	if(trim($contentText)!='')
		$url=strtolower(trim(preg_replace("/[\s-]+/", "-", preg_replace( "/[^a-zA-Z0-9\-]/", '-', $contentText)),"-"));
	
	return $url;
}

$errorMsg='';
function uploadImage($tempPath, $destPath)
{
	if($tempPath!="" && $destPath!="")
	{
		move_uploaded_file($tempPath,$destPath) or die("The picture can not be uploaded. Please try again?"); 
		return true;
	}
	else
	{
		return false;
	}
}

if(isset($_POST['register']))
{
	//print_r($_POST);
	//die();
	if(trim($errorMsg)=='')
			{
					if(!empty($_FILES["image"]["name"]))
					{
						$extArray=strtolower(end(explode(".", $_FILES["image"]["name"])));
						if($extArray=='jpg' || $extArray=='gif' || $extArray=='jpeg' || $extArray=='ico' || $extArray=='png')
						{
							$size=filesize($_FILES['image']['tmp_name']);
							
							if ($size > 512000*1024)
							{
								$errorMsg="Please upload File size of upto 2 MB!<br>";
							}
							else
							{
								$uploaded_file=rand(0,99).date("Ymdsi");
								$uploaded_file=$uploaded_file.".".$extArray;
								
									
								$filePath=$_FILES['image']['tmp_name'];
								$imageUploaded=false;
								chmod("uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"uploads/usersimage/".$uploaded_file);
								chmod("uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded.<br>";
								else
								{
									if(trim($_POST["txtOldFile"])!='' && is_file("uploads/usersimage/".$_POST["txtOldFile"]))
										unlink("uploads/usersimage/".$_POST["txtOldFile"]);
								}
							}
						}
						else
						{
							$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only.";
						}	
					}
					else if(trim($_POST["txtOldFile"])!='')
					{
							$uploaded_file=$_POST["txtOldFile"];
					}
					else
					{
						$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else tttttttttttttttttt";
					}
			}
	if(trim($errorMsg)=='')
			{
					if(!empty($_FILES["image1"]["name"]))
					{
						$extArray=strtolower(end(explode(".", $_FILES["image1"]["name"])));
						if($extArray=='jpg' || $extArray=='gif' || $extArray=='jpeg' || $extArray=='ico' || $extArray=='png')
						{
							$size=filesize($_FILES['image1']['tmp_name']);
							
							if ($size > 512000*1024)
							{
								$errorMsg="Please upload File size of upto 2 MB!<br>";
							}
							else
							{
								$uploaded_file1=rand(0,99).date("Ymdsi");
								$uploaded_file1=$uploaded_file1.".".$extArray;
								
									
								$filePath=$_FILES['image1']['tmp_name'];
								$imageUploaded=false;
								chmod("uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"uploads/usersimage/".$uploaded_file1);
								chmod("uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded.<br>";
								else
								{
									if(trim($_POST["txtOldFile1"])!='' && is_file("uploads/usersimage/".$_POST["txtOldFile1"]))
										unlink("uploads/usersimage/".$_POST["txtOldFile1"]);
								}
							}
						}
						else
						{
							$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only.";
						}	
					}
					else if(trim($_POST["txtOldFile1"])!='')
					{
							$uploaded_file1=$_POST["txtOldFile1"];
					}
					else
					{
						$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else tttttttttttttttttt";
					}
			}
			if(trim($errorMsg)=='')
			{
					if(!empty($_FILES["image2"]["name"]))
					{
						$extArray=strtolower(end(explode(".", $_FILES["image2"]["name"])));
						if($extArray=='jpg' || $extArray=='gif' || $extArray=='jpeg' || $extArray=='ico' || $extArray=='png')
						{
							$size=filesize($_FILES['image2']['tmp_name']);
							
							if ($size > 512000*1024)
							{
								$errorMsg="Please upload File size of upto 2 MB!<br>";
							}
							else
							{
								$uploaded_file2=rand(0,99).date("Ymdsi");
								$uploaded_file2=$uploaded_file2.".".$extArray;
								
									
								$filePath=$_FILES['image2']['tmp_name'];
								$imageUploaded=false;
								chmod("uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"uploads/usersimage/".$uploaded_file2);
								chmod("uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded.<br>";
								else
								{
									if(trim($_POST["txtOldFile2"])!='' && is_file("uploads/usersimage/".$_POST["txtOldFile2"]))
										unlink("uploads/usersimage/".$_POST["txtOldFile2"]);
								}
							}
						}
						else
						{
							$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only.";
						}	
					}
					else if(trim($_POST["txtOldFile2"])!='')
					{
							$uploaded_file2=$_POST["txtOldFile2"];
					}
					else
					{
						$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else tttttttttttttttttt";
					}
			}		
    $cat_id= (int)$_POST['cat_id']; 
    $prod_id= (int)$_POST['prod_id'];
    $sub_pro_id= $_POST['sub_pro_id'];
	
		
		
		
	$name=htmlentities(addslashes(trim($_POST['name'])));
	$product_name=htmlentities(addslashes(trim($_POST['product_name'])));
	$product_name1=htmlentities(addslashes(trim($_POST['product_name1'])));
	$product_name2=htmlentities(addslashes(trim($_POST['product_name2'])));
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
		
	//$uploaded_file=trim($_POST["image"]);
	
	$description=htmlentities(addslashes(trim($_POST['description'])));
	$description1=htmlentities(addslashes(trim($_POST['description1'])));
	$description2=htmlentities(addslashes(trim($_POST['description2'])));
	//$pdescr=htmlentities(addslashes(trim($_POST['pdescr']))); 
	$companyurl=$company_name;
    $url=makeContentUrl($companyurl);
	$q1="update  users SET cat_id='$cat_id',prod_id='$prod_id',sub_pro_id='$sub_pro_id',name='$name',company_name='$company_name', email='$email',address='$address',country='$country',state='$state', city='$city',pincode='$pincode',phone='$phone',mobile='$mobile',fax='$fax',website='$website',url='$url',branch_address='$branch_address',establish_date='$establish_date',key_word='$key_word',product_name='$product_name',product_name1='$product_name1',product_name2='$product_name2',description='$description',description1='$description1',description2='$description2',image='$uploaded_file',image1='$uploaded_file1',image2='$uploaded_file2',status='inactive',pagetype='verified' where id='".$_SESSION['userid']."'";
	
	$in=ExecuteQuery($q1);
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
		<h2>FILL PROFILE IN FEW STEPS</h2><?php //echo $_SESSION['userid']; ?>
		<ul>
		<li><a href="index.php">Company Details</a></li>
		<li><a href="company.php">About Company</a></li>
		<!--<li><a href="company.php">Compny Details</a></li>-->
		<!--<li><a href="document.php">Documents</a></li>-->
		<!--<li><a href="#">Completed</a></li>-->
		<?php 
					$sql="select * from users where id='".$_SESSION['userid']."'";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $qp)
					{
				?>
				<li><img src="uploads/usersimage/<?php echo $qp['image'];?>" height="100" width="100"></li>
			<?php  } ?>
						<?php
                                if(isset($_SESSION['userid']) && $_SESSION['userid']!= ''){
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
					$sql="select * from users where id='".$_SESSION['userid']."'";
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
									?> 	
								    <option value="<?php echo $ak['id'];?>" <?php if($qp['cat_id']==$ak['id']){ echo 'selected'; }?>><?php echo $ak['cat_name'];?></option>
									<?php
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
							  <?php if($qp['cat_id']=='' || $qp['cat_id']==0){?>
							  <option value="">Select Category first</option>
								<?php
								}	
								if($qp['cat_id']!='' && $qp['cat_id']!=0)
								{					  
									$query = "SELECT * FROM mainproduct where cat_id=".$qp['cat_id']." ";
									$ar=ExecuteQueryResule($query);
									if(count($ar)>0)
									{
									   echo '<option value="">Select Product</option>';
									   foreach($ar as $ak)
									   { 
										?> 
										   <option value="<?php echo $ak['id'];?>" <?php if($qp['prod_id']==$ak['id']){ echo 'selected'; }?>><?php echo $ak['product'];?></option>
											<?php
										}
									}
									else
									{
										echo '<option value="">product not available</option>';
									}
								}
								?>
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
						  <input type="text" name="email" value="<?php echo $qp['email'];?>" class="form-control"  placeholder="Email" required>

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
					<label for="inputName" class="col-sm-3 control-label">Product First *:</label>
					<div class="col-sm-9">
					  <input type="text" name="product_name" class="form-control" value="<?php echo $qp['product_name'];?>"  placeholder="Name" required>
					</div>
				  </div>
				  <div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image * :</label>
					<input type="file" name="image"  id="InputImage" >
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
					<label for="inputName" class="col-sm-3 control-label">Product Second *:</label>
					<div class="col-sm-9">
					  <input type="text" name="product_name1" class="form-control" value="<?php echo $qp['product_name1'];?>"  placeholder="Name" required>
					</div>
				  </div>
					<div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image 2* :</label>
					<input type="file" name="image1"  id="InputImage" >
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
					<label for="inputName" class="col-sm-3 control-label">Product Third *:</label>
					<div class="col-sm-9">
					  <input type="text" name="product_name2" class="form-control" value="<?php echo $qp['product_name'];?>"  placeholder="Name" required>
					</div>
				  </div>
					<div class="form-group">
					<label for="Image" class="col-sm-3 control-label">Product Image 3 * :</label>
					<input type="file" name="image2"  id="InputImage" >
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
					
				  
				  

				  <button type="submit" name="register" class="btn btn-primary" onClick="return submitForm();">Registration</button>
					<input name="txtOldFile" type="hidden" id="txtOldFile" value="<?php echo $qp['image']; ?>" />
					<input name="txtOldFile1" type="hidden" id="txtOldFile1" value="<?php echo $qp['image1']; ?>" />
					<input name="txtOldFile2" type="hidden" id="txtOldFile2" value="<?php echo $qp['image2']; ?>" />
				</form>
				<?php } ?>
		  </div>
		</div>
	  </div>

	  <div> <a href="pricelisting.php"> <button type="button" class="btn btn-pr">Go To Offers</button></a></div>

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
		
		var x = document.memberform.email.value;
		var atpos = x.indexOf("@");
		var dotpos = x.lastIndexOf(".");
		if (atpos<1 || dotpos<atpos+2 || dotpos+2>=x.length) {
			alert("Not a valid e-mail address");
			document.memberform.email.focus();
			return false;
		} 
	  	
		if(document.memberform.address.value=="")
		{
			alert("Please Enter Valid Address ");
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
		
	   var y = document.memberform.mobile.value;
	   if(isNaN(y)||y.indexOf(" ")!=-1)
	   {
		  alert("Enter numeric value");
		  document.memberform.mobile.focus();
		  return false; 
	   }
	   
	   
	   if (y.length<10 || y.length>10)
	   {
			alert("enter 10 characters");
			document.memberform.mobile.focus();
			return false;
	   }
		/*
		
		if (y.charAt(0)!="7" || y.charAt(1)!="8" || y.charAt(2)!="9")
	   {
			alert("Mobile No should start with 7 , 8 , 9 ");
			document.memberform.mobile.focus();
			return false
	   }
	    var x = document.memberform.mobile.value;
	   if(isNaN(x)||x.indexOf(" ")!=-1)
	   {
		  alert("Enter numeric value");
		  document.memberform.mobile.focus();
		  return false; 
	   }
	   if (x.length>8)
	   {
			alert("enter 8 characters");
			document.memberform.mobile.focus();
			return false;
	   }
	   if (x.charAt(0)!="2")
	   {
			alert("it should start with 2 ");
			document.memberform.mobile.focus();
			return false
	   }
		var mobile= /^\+?([0-9]{2})\)?[-. ]?([0-9]{4})[-. ]?([0-9]{4})$/;
		if(document.memberform.mobile.value.match(mobile))
		{
			alert("Please Enter Valid mobile Number");
			document.memberform.mobile.focus();
			return false;
		}
		if(document.memberform.branch_address.value=="")
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
		}
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
		if(document.memberform.description.value.length < 10 || memberform.description.value.length > 256)
		{
			alert("Please Fill  Product Description Length less than 10 Character or Greater than 256 ");
			document.memberform.description.focus();
			return false;
		}
		if(document.memberform.description1.value.length < 10 || memberform.description1.value.length > 256)
		{
			alert("Please Fill  Product Description Length less than 10 Character or Greater than 256 ");
			document.memberform.description1.focus();
			return false;
		}
		if(document.memberform.description2.value.length < 10 || memberform.description2.value.length > 256)
		{
			alert("Please Fill  Product Description Length less than 10 Character or Greater than 256 ");
			document.memberform.description2.focus();
			return false;
		}
		*/
		if(document.memberform.product_name.value=="")
		{
			alert("Please Enter  Product First ");
			document.memberform.product_name.focus();
			return false;
		}
		
		if(document.memberform.product_name.value.length < 10 || memberform.product_name.value.length > 36)
		{
			alert("Please Fill  Product Length less than 10 Character or Greater than 36 ");
			document.memberform.product_name.focus();
			return false;
		}
		if(document.memberform.description.value=="")
		{
			alert("Please Enter  Product Description ");
			document.memberform.description.focus();
			return false;
		}
		
		if(document.memberform.product_name1.value=="")
		{
			alert("Please Enter  Product Second ");
			document.memberform.product_name1.focus();
			return false;
		}
		if(document.memberform.product_name1.value.length < 10 || memberform.product_name1.value.length > 36)
		{
			alert("Please Fill  Product Length less than 10 Character or Greater than 36 ");
			document.memberform.product_name1.focus();
			return false;
		}
		if(document.memberform.description1.value=="")
		{
			alert("Please Enter  Product Description ");
			document.memberform.description1.focus();
			return false;
		}
		
		if(document.memberform.product_name2.value=="")
		{
			alert("Please Enter  Product Third ");
			document.memberform.product_name2.focus();
			return false;
		}
		if(document.memberform.product_name2.value.length < 10 || memberform.product_name2.value.length > 36)
		{
			alert("Please Fill  Product Length less than 10 Character or Greater than 36 ");
			document.memberform.product_name2.focus();
			return false;
		}
		if(document.memberform.description2.value=="")
		{
			alert("Please Enter  Product Description ");
			document.memberform.description2.focus();
			return false;
		}
		
		if(document.memberform.key_word.value=="")
		{
			alert("Please Enter  Product keyword ");
			document.memberform.key_word.focus();
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
