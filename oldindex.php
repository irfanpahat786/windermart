<?php 
include_once('db.php');
?>
<!DOCTYPE html>
<html>

<style>
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
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="assets/css/slick.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">
	
    <title>windermart</title>
</head>

<body>
<button onclick="topFunction()" id="myBtn" title="Go to top">					
	<i class="md-icon">vertical_align_top</i></button>

<div class="page-wrapper">
	<div class="header-wrapper">
	<div class="header">
		<div class="header-inner">
			<div class="header-top">
				<div class="container">
					<a href="index.html">
						<img src="assets/img/logo (1).png" alt="" class="header-top-logo">
					</a>

					<div class="nav-primary-wrapper collapse navbar-toggleable-sm">
						<ul class="nav nav-pills ">
							<li class="nav-item ">
							<a href="#" class="nav-link ">
Call us : +91-9990008006
</a>						
							</li>

							<li class="nav-item ">
								<a href="#" class="nav-link ">Support : info@windermart.com</a>

								
							</li>

						
						</ul><!-- /.nav -->
					</div><!-- /.nav-primary-wrapper -->

					<ul class="nav nav-pills secondary">
						
						
						
						<?php
                                if(isset($_SESSION['id']) && $_SESSION['id']!= ''){
                        ?>
                        <li class="nav-item">
							<a href="logout.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Logout  </a></li>
							<?php
                                    }else{
                                ?>  
                                <li class="nav-item">
                                <a href="login.php" class="nav-link"><i class="fa fa-power-off" aria-hidden="true"></i>  Login  </a></li>
                                <?php
                                    }
                                ?>
						</li>
						<li class="nav-item">
							
							<a href="registration.php" class="nav-link"><i class="fa fa-sign-in" aria-hidden="true"></i>Registration Here</a>
						</li>
					</ul>

					<button class="navbar-toggler pull-xs-right hidden-md-up" type="button" data-toggle="collapse" data-target=".nav-primary-wrapper">
                        <i class="md-icon">menu</i>
                    </button>						
				</div><!-- /.container -->
			</div><!-- /.header-top -->

			
				<!-- /.header-bottom -->		
				
		</div><!-- /.header-inner -->
	</div><!-- /.header -->
</div><!-- /.header-wrapper -->
	
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        	

	            <div class="content">
	                <div class="hero" style="background: #426e5f;">
	<div class="hero-content">
		<div class="container">
			<h1>YOUR OWN TRADING PORTAL </h1>
			
			<p>
				THE BEST DEAL DEDICATED TO YOU.
			</p>

			
		</div><!-- /.container -->
	</div><!-- /.hero-content -->
	
<div class="hero-form ">
	<div class="container">
		<form method="get" action="http://www.windermart.com/">
			<div class="row">
				<div class="col-md-3">
					
				<div class="form-group">
    
    <input type="Search" class="form-control" id="exampleInputEmail1" placeholder="Search Today Best Offers !">
  </div>
				</div>

<div class="col-md-2">
					
				<div class="form-group">
    
    <select class="form-control">
   <option value="">Select a category</option>
<option value="5">Services</option>
<option value="107">&nbsp;&nbsp;Travel Agents</option>
<option value="108">&nbsp;&nbsp;Visa and Immigration</option>
<option value="104">&nbsp;&nbsp;Airline - Train - Bus Tickets</option>
<option value="109">&nbsp;&nbsp;Vacation - Tour Packages</option>
<option value="101">&nbsp;&nbsp;Advertising - Design</option>
<option value="99">&nbsp;&nbsp;Website Design</option>
<option value="210">&nbsp;&nbsp;Astrology</option>
<option value="110">&nbsp;&nbsp;Software Development</option>
<option value="111">&nbsp;&nbsp;RTO Services</option>
<option value="112">&nbsp;&nbsp;Legal Services</option>
<option value="113">&nbsp;&nbsp;Vehicle Rentals - Taxi Services</option>
<option value="52">&nbsp;&nbsp;Printing &amp; Publishing</option>
<option value="129">&nbsp;&nbsp;Catering -Tiffin Services</option>
<option value="106">&nbsp;&nbsp;Courier Services</option>
<option value="53">&nbsp;&nbsp;Casting - Auditions</option>
<option value="105">&nbsp;&nbsp;Computer Repair and Service</option>
<option value="100">&nbsp;&nbsp;Computer Training</option>
<option value="54">&nbsp;&nbsp;Computer</option>
<option value="55">&nbsp;&nbsp;Event Services</option>
<option value="56">&nbsp;&nbsp;Health - Beauty - Fitness</option>
<option value="58">&nbsp;&nbsp;Household - Domestic Help</option>
<option value="59">&nbsp;&nbsp;Moving - Storage</option>
<option value="60">&nbsp;&nbsp;Repair</option>
<option value="61">&nbsp;&nbsp;Writing - Editing - Translating</option>
<option value="62">&nbsp;&nbsp;Other Services</option>
<option value="115">Mobiles &amp; Tablets</option>
<option value="122">&nbsp;&nbsp;Accessories</option>
<option value="123">&nbsp;&nbsp;Mobile Phones</option>
<option value="124">&nbsp;&nbsp;Tablets</option>
<option value="116">Electronics &amp; Appliances</option>
<option value="182">&nbsp;&nbsp;Laptops - Computers</option>
<option value="176">&nbsp;&nbsp;Camera Accessories</option>
<option value="181">&nbsp;&nbsp;Inverters, UPS &amp; Generators</option>
</select>
  </div>
				</div>
				<div class="col-md-2">
					
				<div class="form-group">
				
    <select class="form-control" id='country-list'>
     <option value="">Select a country</option>
   
   
 <option value="101" >India</option>
  
  </select>
  </div>
				</div>

				<div class="col-md-2">
					
				<div class="form-group">
    
		    <select class="form-control" id='state-list'>
		  		<option value="" >Select a State</option>
			</select>
  </div>
				</div>
				<div class="col-md-2">
					
				<div class="form-group">
    
    <select class="form-control" id='city-list'>
  			<option value="" >Select a City</option>
	</select>
  </div>
				</div>
<div class="col-md-1">
					
				<div class="form-group">
  <button type="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
  </div>
				</div>

			</div>
		</form> 

		
	</div><!-- /.container -->
</div><!-- /.hero-form -->	

	<div class="hero-layer"></div>
</div><!-- /.hero -->



<div class="slider" style="    margin-top: -85px;">
  <div>
    <img class="imgslider" src="image/Advertisement-1.jpg" />
  </div>
  <div>
    <img class="imgslider" src="image/Advertisement-2.jpg" />
  </div>
  <div>
    <img class="imgslider"  src="image/Advertisement-3.jpg" />
  </div>
  <div>
    <img class="imgslider"  src="image/Advertisement-4.jpg" />
  </div>
  <div>
    <img class="imgslider"  src="image/Advertisement-2.jpg" />
  </div>
  <div>
    <img class="imgslider"  src="image/Advertisement-3.jpg" />
  </div>
</div>







<div class="header-bottom">
					
												<ul class="nav nav-pills">
							<li class="nav-item"><i class="fa fa-cogs  fa-2x" aria-hidden="true" style="    margin-left: 40%;"></i><a href="#" class="nav-link"> Electronics & Electrical</a></li>
							<li class="nav-item">
                            <i class="fa fa-industry fa-2x" aria-hidden="true  "
                            style="margin-left: 40%;"></i>
						<a href="#" class="nav-link"> Industrial Machinery</a></li>
						<li class="nav-item">
                        <i class="fa fa-bar-chart fa-2x" aria-hidden="true"
                        style="margin-left: 40%;"></i>
						<a href="#" class="nav-link"> Industrial Supplies</a></li>
							<li class="nav-item">
							<i class="fa fa-building fa-2x" aria-hidden="true" style="    margin-left: 40%;"></i> 
							<a href="#" class="nav-link">
                             Building & Construction
							</a></li>
							<li class="nav-item">
							<i class="fa fa-rss fa-2x" aria-hidden="true"
							style="margin-left: 40%;"></i>
							<a href="#" class="nav-link"> Mobile & Telecom</a></li>
							<li class="nav-item">
							<i class="fa fa-television fa-2x" aria-hidden="true"
							style="margin-left: 40%;"></i>
							<a href="#" class="nav-link"> Computer & Office</a></li>
							<li class="nav-item">
							<i class="fa fa-car fa-2x" aria-hidden="true"
							style="margin-left: 40%;"></i>
							<a href="#" class="nav-link"> Automobile Parts</a></li>
							
						</ul><!-- /.nav -->

						
					<!-- /.container -->
				</div>







<div class="container">
	<div class="page-title">
		<h2>Materialist</h2>

		<p>
			Maecenas augue magna, mollis a dictum id, ornare ac turpis. Morbi vel faucibus ligula.
		</p>
	</div><!-- /.page-title -->

	<div class="row">
		<div class="col-sm-12 col-xl-10">
			<div class="cards-wrapper">
				<div class="row">
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-2.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Drink &amp; Food</a></h3>
		<h2><a href="listing-detail.html">Cozzy Coffee Shop</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-1.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Education</a></h3>
		<h2><a href="listing-detail.html">Piano Lessons For Beginners</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-3.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Restaurant</a></h3>
		<h2><a href="listing-detail.html">Delicious Ocean Restaurant</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-4.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Food &amp; Drink</a></h3>
		<h2><a href="listing-detail.html">Healthy Breakfast</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-5.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Travel</a></h3>
		<h2><a href="listing-detail.html">London Trip</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					 
						<div class="col-sm-6 col-md-4">
							<div class="card">
	<div class="card-image" style="background-image: url('assets/img/tmp/card-6.jpg');">
		<a href="listing-detail.html"></a> 

		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div><!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing-detail.html">Food &amp; Drink</a></h3>
		<h2><a href="listing-detail.html">Bio Vegatables</a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing-detail.html" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing-detail.html" class="card-action-btn btn btn-transparent">Show More</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
						</div><!-- /.col-* -->
					
				</div><!-- /.row -->
			</div><!-- /.card-wrapper -->
		</div><!-- /.col-* -->

		<div class="col-sm-2 hidden-lg-down">
			<div class="your-space">
				<p>
					Do you want to be here?
				</p>

				<a href="#" class="btn btn-primary btn-block">+1-254-689</a>

				<a href="#" class="btn btn-secondary btn-block">Contact</a>
			</div><!-- /.your-space -->
		</div><!-- /.col-* -->		
	</div><!-- /.row -->
</div><!-- /.container -->







<div class="counter">
	<div class="container">
		<div class="row">
			<div class="col-sm-12 col-md-3">
				<h2>Best directory listing </h2>
			</div><!-- /.col-* -->

			<div class="col-sm-12 col-md-9">
				<div class="row">
					<div class="col-sm-3">
						<i class="md-icon">layers</i> 
						<h3>324</h3>
						<p>Listings added</p>
					</div><!-- /.col-* -->

					<div class="col-sm-3">
						<i class="md-icon">location_city</i> 
						<h3>593</h3>
						<p>Cities Covered</p>
					</div><!-- /.col-* -->					

					<div class="col-sm-3">
						<i class="md-icon">people</i> 
						<h3>1897</h3>
						<p>Registered Users</p>
					</div><!-- /.col-* -->		

					<div class="col-sm-3">
						<i class="md-icon">public</i> 
						<h3>408</h3>
						<p>Companies</p>
					</div><!-- /.col-* -->														
				</div><!-- /.row -->
			</div><!-- /.col-* -->
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.container -->

<div class="push-bottom">
	<div class="container">
	<div class="page-title background-white">
		<h2>Recent News From Our Company</h2>
		<p>Best spots and events in your city hand picked by Materialist stuff</p>
	</div><!-- /.page-title -->

	<div class="row">
		
			<div class="col-sm-12 col-md-4">
				<div class="card">
					<div class="card-image" style="background-image: url('assets/img/tmp/post-1.jpg');">
						<a href="#"></a>
					</div><!-- /.card-image -->

					<div class="card-content">
						<h3><a href="#">Marketing</a></h3>
						<h2><a href="#">Meeting All Deadlines</a></h2>
					</div><!-- /.card-content -->

					<div class="card-actions">
						<a href="#" class="card-action-icon"><i class="md-icon">insert_comment</i><span> 12</span></a>
						<a href="#" class="card-action-icon"><i class="md-icon">access_time</i><span> 18. June</span></a>

						<a href="#" class="card-action-btn btn btn-transparent">Read More</a>
					</div><!-- /.card-actions -->
				</div><!-- /.card -->
			</div><!-- /.col-* -->
		
			<div class="col-sm-12 col-md-4">
				<div class="card">
					<div class="card-image" style="background-image: url('assets/img/tmp/post-2.jpg');">
						<a href="#"></a>
					</div><!-- /.card-image -->

					<div class="card-content">
						<h3><a href="#">Pricing Models</a></h3>
						<h2><a href="#">Best Pricing Model</a></h2>
					</div><!-- /.card-content -->

					<div class="card-actions">
						<a href="#" class="card-action-icon"><i class="md-icon">insert_comment</i><span> 12</span></a>
						<a href="#" class="card-action-icon"><i class="md-icon">access_time</i><span> 18. June</span></a>

						<a href="#" class="card-action-btn btn btn-transparent">Read More</a>
					</div><!-- /.card-actions -->
				</div><!-- /.card -->
			</div><!-- /.col-* -->
		
			<div class="col-sm-12 col-md-4">
				<div class="card">
					<div class="card-image" style="background-image: url('assets/img/tmp/post-3.jpg');">
						<a href="#"></a>
					</div><!-- /.card-image -->

					<div class="card-content">
						<h3><a href="#">Development</a></h3>
						<h2><a href="#">How To Hire Developer</a></h2>
					</div><!-- /.card-content -->

					<div class="card-actions">
						<a href="#" class="card-action-icon"><i class="md-icon">insert_comment</i><span> 12</span></a>
						<a href="#" class="card-action-icon"><i class="md-icon">access_time</i><span> 18. June</span></a>

						<a href="#" class="card-action-btn btn btn-transparent">Read More</a>
					</div><!-- /.card-actions -->
				</div><!-- /.card -->
			</div><!-- /.col-* -->
		
	</div><!-- /.row -->
</div><!-- /.container -->
</div><!-- /.push-bottom -->



<div class="cta">
	<div class="container">
		<h2>Join our listing community</h2>

		<p> 
			Mauris ac neque sed nisl posuere pretium. Aliquam volutpat, lectus nec varius mollis, turpis urna accumsan odio, eget eleifend justo mauris vitae neque.
		</p>

		<a href="#" class="btn btn-primary">More Information</a>
	</div><!-- /.container -->
</div><!-- /.cta -->

	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

    <div class="footer-wrapper">
	<div class="footer">
		<div class="footer-widgets">
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-3">
						<div class="widget right-border">
                            <h2 class="widgettitle">
                          <img src="assets/img/logo (1).png" alt="Materialist"></h2>

							<p>
								Our Mission: "Guided by the relentless focus of our visions and values, we deliver top of the line products and tailored solutions through continuous innovations with technology and immense product knowledge for sustained profitability."
							</p>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget right-border">
							<h2 class="widgettitle">Related Links</h2>

							<ul class="nav nav-stacked">
								<li class="nav-item"><a href="#" class="nav-link">Home</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Company</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Price Listing</a></li>
								<li class="nav-item"><a href="About.php" class="nav-link">About us</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Contact us</a></li>
							</ul>
						</div><!-- /.widget -->
					</div>

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget right-border">
							<h2 class="widgettitle">Pages</h2>

							<ul class="nav nav-stacked">
								<li class="nav-item"><a href="#" class="nav-link">Interior</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Life Style</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Travel</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Fashion</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Hospitality</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Building Material</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Entertenment</a></li>
								<li class="nav-item"><a href="#" class="nav-link">Real Estate</a></li>
							</ul>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->						

					<div class="col-xs-12 col-sm-12 col-md-2 col-md-offset-1">
						<div class="widget">
							<h2 class="widgettitle">News Letter</h2>

							<form>
  <div class="form-group">
    <label for="exampleInputEmail1">Email address</label>
    <input type="email" class="form-control" id="exampleInputEmail1" placeholder="Enter Your Email">
  </div>
  
  <button type="submit" class="btn btn-default">Submit</button>
</form>
						</div><!-- /.widget -->
					</div><!-- /.col-* -->				
				</div><!-- /.row -->
			</div><!-- /.container -->
		</div><!-- /.footer-widgets -->

		<div class="footer-top">
			<div class="container">
				<div class="footer-top-left">
					<strong class="hidden-xs-down">Supported credit cards:</strong>
					<i class="fa fa-cc-stripe"></i>
					<i class="fa fa-cc-visa"></i>
					<i class="fa fa-cc-discover"></i>
					<i class="fa fa-cc-mastercard"></i>
				</div><!-- /.footer-top-left -->
				<div class="footer-top-right">
					
					<ul class="nav nav-pills">
						<li class="footer-nav-item nav-link">KEEP IN TOUCH :</li>
						<li class="footer-nav-item"><a href="#">
                        <img alt="follow me on facebook" src="https://c866088.ssl.cf3.rackcdn.com/assets/facebook40x40.png" border="0"></a>
						</li>
						<li class="footer-nav-item"><a href="#">
						<img alt="follow me on twitter" src="https://c866088.ssl.cf3.rackcdn.com/assets/twitter40x40.png" border="0"></a></li>
						<li class="footer-nav-item"><a href="#">
						<img alt="follow me on instagram" src="https://c866088.ssl.cf3.rackcdn.com/assets/instagram40x40.png" border="0"></a></li>
						<li class="footer-nav-item"><a href="#"><img alt="follow me on google plus" src="https://c866088.ssl.cf3.rackcdn.com/assets/googleplus40x40.png" border="0"></a></li>
					</ul>
				</div><!-- /.footer-top-right -->
			</div><!-- /.container -->
		</div><!-- /.footer-top -->

		<div class="footer-bottom">
			<div class="container">
				<div class="footer-bottom-left">
					<a href="#">Total Visitors</a>
				</div><!-- /.footer-bottom-left -->

				<div class="footer-bottom-right">
					Copyright &copy; 2016 - All Rights Reserved
				</div><!-- /.footer-bottom-right -->			
			</div><!-- /.container -->
		</div><!-- /.footer-bottom -->
	</div><!-- /.footer -->
</div><!-- /.footer-wrapper -->
</div><!-- /.page-wrapper -->

<!-- /.customizer -->


<script type="text/javascript" src="assets/js/jquery.js"></script>
<script type="text/javascript" src="assets/js/slick.min.js"></script>
<script type="text/javascript" src="assets/js/tether.min.js"></script>
<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
<script type="text/javascript" src="assets/js/leaflet.js"></script>
<script type="text/javascript" src="assets/js/leaflet.markercluster.js"></script>
<script type="text/javascript" src="assets/libraries/owl-carousel/owl.carousel.min.js"></script>
<script type="text/javascript" src="assets/js/materialist.js"></script>


 <script type="text/javascript">
    	
    	$('.slider').slick({
 autoplay:true,
  autoplaySpeed:1500,
    slidesToShow: 4,
    slidesToScroll: 4,
    dots: true,
    infinite: true,
    cssEase: 'linear'
});
    </script>
    <script>
// When the user scrolls down 20px from the top of the document, show the button
window.onscroll = function() {scrollFunction()};

function scrollFunction() {
    if (document.body.scrollTop > 20 || document.documentElement.scrollTop > 20) {
        document.getElementById("myBtn").style.display = "block";
    } else {
        document.getElementById("myBtn").style.display = "none";
    }
}

// When the user clicks on the button, scroll to the top of the document
function topFunction() {
    document.body.scrollTop = 0;
    document.documentElement.scrollTop = 0;
}
</script>

<script>	

$('document').ready(function(){

	$('#country-list').on('change',function(){

		var country = $(this).val();
		

		$.ajax({

			type : 'POST',
			url : 'ajax.php',
			data :{'get_states': 'states',country:country},
			beforeSend : function() {


			},
			success  :function(html){

				// console.log(html);
				$('#state-list').html(html);

				if (country=='') {

					$('#city-list').html(html);
				}

			}


		});


	});

	$('#state-list').on('change',function(){

		var state = $(this).val();
		

		$.ajax({

			type : 'POST',
			url : 'ajax.php',
			data :{'get_cities': 'cities',state:state},
			beforeSend : function() {


			},
			success  :function(html){

				// console.log(html);
				$('#city-list').html(html);

			}


		});


	});


});

</script>

</body>


</html>