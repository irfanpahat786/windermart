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
            	<h2>CHOOSE YOUR PACKAGE </h2>
              	<ul>
                
                	<li><a href="pan.php">Diamond Package</a></li>
                	<li><a href="pan.php">Platinum Package</a></li>
                	<li><a href="pan.php">Gold Package</a></li>
                	<li><a href="pan.php">Silver Package</a></li>
              	
              	</ul>
            </div>
    	   </div>
      <div class="col-lg-9 col-md-9">

	 <div class="row" style="border:1px solid #ebebeb; margin:30px 20px; padding-bottom:30px; background: #fbfbfb;">
	     <div class="form-group" style=" margin:30px 20px; padding-bottom:30px; border:1px solid #ebebeb;" >
          
           <div class="col-sm-3">Package</div>
           
           <div class="col-sm-9">
             <div class="col-sm-3">Price(1 Year)</div>
              <div class="col-sm-3">Price(3 Month)</div>
               <div class="col-sm-3">Price(3 Year)</div>
           </div>
        </div>
        <div class="form-group" style=" margin:30px 20px; padding-bottom:30px; border:1px solid #ebebeb;" >
          
           <div class="col-sm-3">Package name</div>
          
           <div class="col-sm-9">
             <div class="col-sm-3">35,200</div>
              <div class="col-sm-3">10000</div>
               <div class="col-sm-3">900000</div>
           </div>
        </div>
        
        
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
