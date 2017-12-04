<?php include_once('db.php');
include_once('check.php');
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
      
   
    </div></div>
</header>
   	

	<div class="container">
  <div class="row">
    <div class="col-lg-3 col-md-3">
	<div class="sidewrap">
	<h2>FILL PROFILE IN FEW STEPS</h2>
	<ul>
  <li><?php echo $_SESSION['name'];?></li>
	<li><a href="index.php">Compny Details</a></li>
	<!--<li><a href="addres.php">Addresses</a></li>-->
	<!--<li><a href="company.php">Compny Details</a></li>-->
	<li><a href="document.php">Documents</a></li>
	<li><a href="#">Completed</a></li>
	</ul>
	</div>
	</div>
      <div class="col-lg-9 col-md-9">

	 <div class="row" style="border:1px solid #ebebeb; margin:30px 20px; padding-bottom:30px; background: #fbfbfb;">
	  <form class="form-horizontal" style="border-bottom:1px solid #ebebeb;">
  <div class="form-group" >
    <p class="col-sm-4 tex ">Select document to upload</p>
    <div class="col-sm-3">
     
	  
 <p><a href="adhar-card.php">Aadhar Card</a></p>
  <p><a href="pan.php">Pan Card</a></p>
 
</select>
    </div>
  </div></form>
	 
	  <div style="    padding: 50px 0;
    text-align: center;
    font-size: 18px;
    color: #aaa;
    font-weight: 300;"></div>
	   
	 </div>
	  
	</div>
	
   
    </div></div>
	
	
	
    
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
