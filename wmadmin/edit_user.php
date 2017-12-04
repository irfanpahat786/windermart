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
if (isset($_GET['id']) && is_numeric($_GET['id']))
{
	$id = $_GET['id'];
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
								chmod("../user/uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"../user/uploads/usersimage/".$uploaded_file);
								chmod("../user/uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded 1.<br>";
								else
								{
									if(trim($_POST["txtOldFile"])!='' && is_file("../user/uploads/usersimage/".$_POST["txtOldFile"]))
										unlink("../user/uploads/usersimage/".$_POST["txtOldFile"]);
								}
							}
						}
						else
						{
							$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only product first.";
						}	
					}
					else if(trim($_POST["txtOldFile"])!='')
					{
							$uploaded_file=$_POST["txtOldFile"];
					}
					else
					{
						$errorMsg="Please upload .jpg, .gif, .jpeg, .png, etc.  files only. else product first ";
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
								chmod("../user/uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"../user/uploads/usersimage/".$uploaded_file1);
								chmod("../user/uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded.<br>";
								else
								{
									if(trim($_POST["txtOldFile1"])!='' && is_file("../user/uploads/usersimage/".$_POST["txtOldFile1"]))
										unlink("../user/uploads/usersimage/".$_POST["txtOldFile1"]);
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
								chmod("../user/uploads/usersimage/", 0777);  // octal; correct value of mode
								$imageUploaded=uploadImage($filePath,"../user/uploads/usersimage/".$uploaded_file2);
								chmod("../user/uploads/usersimage/", 0755);  // octal; correct value of mode
								
								if(!$imageUploaded)
									$errorMsg.="File not uploaded.<br>";
								else
								{
									if(trim($_POST["txtOldFile2"])!='' && is_file("../user/uploads/usersimage/".$_POST["txtOldFile2"]))
										unlink("../user/uploads/usersimage/".$_POST["txtOldFile2"]);
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
	$google_map=htmlentities(addslashes(trim($_POST['google_map'])));
	$description=addslashes(trim($_POST['description']));
	$description1=addslashes(trim($_POST['description1']));
	$description2=addslashes(trim($_POST['description2']));
	$companyurl=$company_name;
    $url=makeContentUrl($companyurl);
	$q1="update  users SET cat_id='$cat_id',prod_id='$prod_id',sub_pro_id='$sub_pro_id',name='$name',company_name='$company_name', email='$email',address='$address',country='$country',state='$state', city='$city',pincode='$pincode',phone='$phone',mobile='$mobile',fax='$fax',website='$website',url='$url',branch_address='$branch_address',establish_date='$establish_date',key_word='$key_word',product_name='$product_name',product_name1='$product_name1',product_name2='$product_name2',google_map='$google_map',description='$description',description1='$description1',description2='$description2',image='$uploaded_file',image1='$uploaded_file1',image2='$uploaded_file2',status='inactive',pagetype='verified' where id='".$_GET['id']."'";
	$in=ExecuteQuery($q1);
	header('location:web_product_view.php?q=edt');
}
?>

<script language="JavaScript" type="text/javascript" src="cbrte/html2xhtml.js"></script>
<script language="JavaScript" type="text/javascript" src="cbrte/richtext_compressed.js"></script>
<script src='../js/jquery.js'></script>
<script src="https://cdn.ckeditor.com/4.7.1/standard/ckeditor.js"></script>
<script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<script type="text/javascript">
	function submitForm()
	{
	    /*if(document.memberform.cat_id.value=="")
		{
			alert("Please Select Your Category");
			document.memberform.cat_id.focus();
			return false;
		}
		if(document.memberform.prod_id.value=="")
		{
			alert("Please Select Your Product");
			document.memberform.prod_id.focus();
			return false;
		}
		if(document.memberform.file.value=="")
		{
			alert("Please Upload Latest Image Post");
			document.memberform.file.focus();
			return false;
		}*/
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
		}*/
		if(document.memberform.product_name.value=="")
		{
			alert("Please Enter  Product First ");
			document.memberform.product_name.focus();
			return false;
		}
		
		if(document.memberform.product_name.value.length < 1 || memberform.product_name.value.length > 36)
		{
			alert("Please Fill  Product Length less than 1 Character or Greater than 36 ");
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
		if(document.memberform.product_name1.value.length < 1 || memberform.product_name1.value.length > 36)
		{
			alert("Please Fill  Product2 Length less than 1 Character or Greater than 36 ");
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
		if(document.memberform.product_name2.value.length < 1 || memberform.product_name2.value.length > 36)
		{
			alert("Please Fill  Product Length less than 1 Character or Greater than 36 ");
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
    
    	/*
		if(document.memberform.description.value.length < 1 || memberform.description.value.length > 256)
		{
			alert("Please Fill  Product Description Length less than 1 Character or Greater than 256 ");
			document.memberform.description.focus();
			return false;
		}
		if(document.memberform.description1.value.length < 1 || memberform.description1.value.length > 256)
		{
			alert("Please Fill  Product3 Description Length less than 1 Character or Greater than 256 ");
			document.memberform.description1.focus();
			return false;
		}
		if(document.memberform.description2.value.length < 1 || memberform.description2.value.length > 256)
		{
			alert("Please Fill  Product Description Length less than 1 Character or Greater than 256 ");
			document.memberform.description2.focus();
			return false;
		}
		*/
    
	}
</script>
<html>
<head>
<title>Control Panel : Winder Mart</title>

<link href="img/style.css" rel="stylesheet" type="text/css">
<script>
function goBack() {
    window.history.back()
}
</script>
</head>
<body>
<br>
<form name="memberform" id="memberform" action="#" method="post" enctype="multipart/form-data">
<table width="90%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
<tr>
           <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><a href="home.php" style="color: white;">HOME</a>&nbsp;&nbsp;&nbsp;&nbsp;Website Management >Edit User</th>

        <th width="44%" align="right" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong><button onClick="goBack()"  style="background-color:#03617C;color: white;" >Go Back</button></strong></th>
        </tr>
        
        <tr>
              <td height="22" colspan="2" align="center" valign="middle" bgcolor="#FFFFD5" class="style777"><strong class="style10" align="center">ADDs below </strong></td>
            </tr> 
<tr>
<td width="50%" align="center" colspan="2">
  <table width="100%" >
    <tr>
      <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
        
        
        <tr>
          <th align="center" valign="top" scope="col"><table  width="100%"><tr><td width="20%"></td><td width="50%">
		  <?php 
		  		//$id=$_REQUEST['id'];
			    $categoryQuery = "select * from users where id=$id ";				
				$categoryRowresult = ExecuteQueryResule($categoryQuery);
				foreach($categoryRowresult as $categoryRow)
				{
			 ?>
		  <table width="100%">
                       
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Category Name*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
				<?php 
				$q="select * from category  ";
				$ar=ExecuteQueryResule($q);
				 
				?>
				  <select class="form-control" id="category" name="cat_id" style=" border-radius: 10px; height:40px; width:50%; size:50px;">
					  <option value="">Select Category</option>
					<?php
					  if(count($ar)>0)
						{ 
							foreach($ar as $ak)
							{ 
								
						   ?>
							 <option value="<?php echo $ak['id'];?>"<?php if($categoryRow['cat_id']==$ak['id']) { echo 'selected';}?>><?php echo $ak['cat_name'];?></option>
							<?php
							}
						}else
						{
							echo '<option value="">Category not available</option>';
						}
						?>
				  </select> 
				</td>
            </tr> 
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Product *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
			  			<select class="form-control" id="product" name="prod_id" style=" border-radius: 10px; height:40px; width:50%; size:50px;">
							  <?php if($categoryRow['cat_id']=='' || $categoryRow['cat_id']==0){?>
							  <option value="">Select Category first</option>
								<?php
								}	
								if($categoryRow['cat_id']!='' && $categoryRow['cat_id']!=0)
								{					  
									$query = "SELECT * FROM mainproduct where cat_id=".$categoryRow['cat_id']." ";
									$ar=ExecuteQueryResule($query);
									if(count($ar)>0)
									{
									   echo '<option value="">Select Product</option>';
									   foreach($ar as $ak)
									   { 
										?> 
										   <option value="<?php echo $ak['id'];?>" <?php if($categoryRow['prod_id']==$ak['id']){ echo 'selected'; }?>><?php echo $ak['product'];?></option>
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
				</td>
            </tr> 
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Sub Product*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="sub_pro_id" type="text" class="style77" value="<?php echo $categoryRow['sub_pro_id'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Name*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="name" type="text" class="style77" value="<?php echo $categoryRow['name'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Company  Name*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="company_name" type="text" class="style77" value="<?php echo $categoryRow['company_name'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Email *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="email" type="text" class="style77" value="<?php echo $categoryRow['email'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Addresses *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="address" type="text" class="style77" value="<?php echo $categoryRow['address'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Country *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="country" type="text" class="style77" value="<?php echo $categoryRow['country'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">State *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="state" type="text" class="style77" value="<?php echo $categoryRow['state'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">City *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="city" type="text" class="style77" value="<?php echo $categoryRow['city'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Pin Code*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="pincode" type="text" class="style77" value="<?php echo $categoryRow['pincode'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr><tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Phone Number *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="phone" type="text" class="style77" value="<?php echo $categoryRow['phone'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr><tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Mobile *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="mobile" type="text" class="style77" value="<?php echo $categoryRow['mobile'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Fax No*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="fax" type="text" class="style77" value="<?php echo $categoryRow['fax'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Website URL*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="website" type="text" class="style77" size="51"  style="height:40px; border-radius: 10px;" value="<?php echo $categoryRow['website'];?>"></td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Branch Address*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <textarea name="branch_address" type="text" class="style77" cols="51" rows="5"  style=" border-radius: 10px;"><?php echo $categoryRow['branch_address'];?></textarea>      </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Date Of Establish*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="establish_date" type="text" class="style77" value="<?php echo $categoryRow['establish_date'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">First Product *</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="product_name" type="text" class="style77" value="<?php echo $categoryRow['product_name'];?>" size="51"  style="height:40px; border-radius: 10px;"></td>
            </tr>
            <tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Product Image 1*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77"><img src="../user/uploads/usersimage/<?php echo $categoryRow['image'];?>" height="100" width="100" /><br>
          <input name="image" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
              
           
              <tr>
              <td height="22" align="left" valign="middle" class="style77">Product Description 1*</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="description" id="editor1" cols="40" rows="15" ><?php echo $categoryRow['description']?></textarea>       </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Second Product*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="product_name1" type="text" class="style77" value="<?php echo $categoryRow['product_name1'];?>" size="51"  style="height:40px; border-radius: 10px;"></td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Product Image 2*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77"><img src="../user/uploads/usersimage/<?php echo $categoryRow['image1'];?>" height="100" width="100" /><br>
          <input name="image1" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
              
           
              <tr>
              <td height="22" align="left" valign="middle" class="style77">Product Description 2*</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="description1" id="editor2" cols="40" rows="15" ><?php echo $categoryRow['description1']?></textarea>       </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Third Product*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="product_name2" type="text" class="style77" value="<?php echo $categoryRow['product_name2'];?>" size="51"  style="height:40px; border-radius: 10px;"></td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Product Image 3*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77"><img src="../user/uploads/usersimage/<?php echo $categoryRow['image2'];?>" height="100" width="100" /><br>
          <input name="image2" type="file" class="style77" value="" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
              
           
              <tr>
              <td height="22" align="left" valign="middle" class="style77">Product Description3*</td>
              <td height="22" colspan="1" align="left" valign="middle" class="style77"><textarea name="description2" id="editor3" cols="40" rows="15" ><?php echo $categoryRow['description2']?></textarea>       </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Key Word*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="key_word" type="text" class="style77" value="<?php echo $categoryRow['key_word'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
			<tr>
              <td width="213" height="22" align="left" valign="middle" class="style77">Google Map*</td>
              <td width="471" height="22" colspan="1" align="left" valign="middle" class="style77">
          <input name="google_map" type="text" class="style77" value="<?php echo $categoryRow['google_map'];?>" size="51"  style="height:40px; border-radius: 10px;">     </td>
            </tr>
            <tr>
              <td height="22" colspan="2" align="center" class="style777" ><input name="register"   type="submit" class="style77"  value=' Update ' onClick="return submitForm();" />
                      <input name="submit"   type="reset" class="style77"  value='Reset' />
					  <input type="hidden" name="txtOldFile" value="<?php echo $categoryRow['image'];?>">
					  <input type="hidden" name="txtOldFile1" value="<?php echo $categoryRow['image1'];?>">
					  <input type="hidden" name="txtOldFile2" value="<?php echo $categoryRow['image2'];?>">  
					  <input type="hidden" name="id" value="<?php echo $id;?>">            </td>
            </tr>
            <tr>
              <td height="10" colspan="2" align="center" ></td>
            </tr>
            </table>
			<?php } ?>
			</td></tr>
          </table></th>
        </tr>
      </table></td>
    </tr>
  </table>
  </td>
  </tr>
  </table>
</form>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
 <script>

window.onload=function(){
				//document.getElementById('').onclick=; 
			}

</script>
<script src="js/bootstrap.min.js"></script>
<script src="js/jquery-1.7.1.min.js"></script>
<script>
            CKEDITOR.replace( 'editor1' );
			 CKEDITOR.replace( 'editor2' );
			  CKEDITOR.replace( 'editor3' );
			
        </script>
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
</body>
</html>