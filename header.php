<?php
 include_once'db.php';
 $fullur='http://www.windermart.com';
?>
 <!DOCTYPE html>
<html>

<style>
#colorstar { color: #ee8b2d;}
.badForm {color: #FF0000;}
.goodForm {color: #00FF00;}
.evaluation { margin-left:30px;} 

#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

#myBtn:hover {
  background-color: #555;
}
@media only screen and (max-width: 480px) {
    /* For mobile phones: */
    [class*="col-"] {
        width: 100%;
    }
}
</style>
<head><meta name="google-site-verification" content="_wYkYUB3GlPUCvxHeJAAtTf8L2RxKhY1QqIgrZwdkwk" />
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge;">
    <!--<meta http-equiv="refresh" content=" ;url='http://www.windermart.com'">-->
    <meta name="description" content="Business Directory India: Top Online Business Listing Site 2017. Windermart is online B2B Manufacturers Suppliers and Exporters Directory Portal in India.">
    <meta name="keywords" content="Business Directory India: Top Online Business Listing Site 2017, business directory India, top business listing site India, business listing site 2017, online business directory site, business directory in India,  top business directory site, top listing site in India, 2017 business listing site India, online business directory">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">
    
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="<?php echo $fullur;?>/assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $fullur;?>/assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $fullur;?>/assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $fullur;?>/assets/css/slick.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $fullur;?>/assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="<?php echo $fullur;?>/assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="<?php echo $fullur;?>/assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">       
    <link href="<?php echo $fullur;?>/assets/css/main.css" rel="stylesheet" type="text/css" id="css-primary">
	<link href="<?php echo $fullur;?>/assets/css/owl.carousel.css" rel="stylesheet" type="text/css" >
    <link rel="shortcut icon" href="<?php echo $fullur;?>/favicon.ico" type="image/x-icon" />
    <link rel="apple-touch-icon" href="<?php echo $fullur;?>/apple-touch-icon.png" />
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

	
<title>Business Directory India: Top Online Business Listing Site 2017</title>
</head> 
<meta name="google-site-verification" content="GONlFeJOnDt-4cJahY9uKkrZr8jHVd_oVa0-cdHCQYc" />
<body>
<button onClick="topFunction()" id="myBtn" title="Go to top">					
	<i class="md-icon">vertical_align_top</i></button>

<div class="page-wrapper">
	<div class="header-wrapper"><?php 
                             $l="select * from logo";
                             $lr=ExecuteQueryResule($l);
                           
                            
                             ?>  
	<div class="header">
		<div class="header-inner">
			<div class="header-top heade" >
				<div class="container">
					<a href="<?php echo $fullur;?>">
						<img src="<?php echo $fullur;?>/uploads/logo/<?php echo $lr[0]['image']; ?>" alt="Business Directory India: Top Online Business Listing Site 2017" class="header-top-logo">
					</a>
					<?php 
                             $h="select * from header";
                             $hr=ExecuteQueryResule($h);
                           
                            
                             ?>    

					<div class="nav-primary-wrapper collapse navbar-toggleable-sm">
						<ul class="nav nav-pills ">
							<li class="nav-item ">
							<a href="#" class="nav-link ">
Call us : <?php echo $hr[0]['phone']; ?>
</a>						
							</li>

							<li class="nav-item ">
								<a href="mailto:<?php echo $hr[0]['email']; ?>" class="nav-link ">Support : <?php echo $hr[0]['email']; ?></a>

								
							</li>
							<li class="nav-item">
							
							<a href="#" class="nav-link">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;</a>
						</li>
							<?php
                                if(isset($_SESSION['userid']) && $_SESSION['userid']!= ''){
                        ?>
                        <li class="nav-item">
							<a href="<?php echo $fullur;?>/logout.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Logout  </a></li>
							<?php
                                    }else{
                                ?>  
                                <li class="nav-item">
                                <a href="<?php echo $fullur;?>/login.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Login  </a></li>
                                <?php
                                    }
                                ?>
						</li>
						<li class="nav-item">
							
							<a href="<?php echo $fullur;?>/registration.php" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i>Registration Here</a>
						</li>
						
						</ul><!-- /.nav -->
					

					<!--<ul class="nav nav-pills secondary">
						
						
						
						
					</ul>-->
					</div><!-- /.nav-primary-wrapper -->
					<button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target=".nav-primary-wrapper">
                        <i class="md-icon">menu</i>
                    </button>						
				</div><!-- /.container -->
			</div><!-- /.header-top -->

			
				<!-- /.header-bottom -->		
				
		</div><!-- /.header-inner -->
	</div><!-- /.header -->
</div>

