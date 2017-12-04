<?php 
include_once('header.php');

?>
<?php
if(isset($_POST['email'])) {
 
    $email_to = "info@windermart.com";
	
 
    function died($error) {
        // your error code can go here
        $error_message= "We are very sorry, but there were error(s) found with the form you submitted. ";
        $error_message= "These errors appear below.<br /><br />";
        $error_message= $error."<br /><br />";
        $error_message= "Please go back and fix these errors.<br /><br />";
        
    }
    if(!isset($_POST['email']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $email_from = $_POST['emailid']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below of News Letter.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Email: ".clean_string($email_from)."\n";
    
$headers = 'From: Windermart <do_not_reply@windermart.com>'."\r\n".
'Reply-To: '.'<do_not_reply@windermart.com>'."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
 
<!-- include your own success html here -->
 
 
<?php
 $success='';
$success="Thank you for contacting us. We will be in touch with you very soon."; 
}
?>
    
    <div class="main-wrapper">
	    <div class="main">
		<!-- Popup Start Here--->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog1">
				
				  <!-- Modal content-->
				  <div class="modal-content">
					<div class="modal-header">
					  <button type="button" class="close" data-dismiss="modal">&times;</button>
					  <h4 class="modal-title">Welcome To Windermart Portal</h4>
					</div>
					<div class="modal-body">
					<?php 
											
						$m="select * from offerday  order by id desc    limit 1 ";
						$mr=ExecuteQueryResule($m);
						foreach ($mr as $ak) {

					?>	
					  <div class="row top-text">
						  <div class="col-xs-12 col-sm-12 col-md-8 left">
						  <img src="offersimage/<?php echo $ak['image'];?>" alt="Business Directory India: Top Online Business Listing Site 2017"    class="img-popup">
						  <div>
						  <h3><?php echo $ak['name'];?></h3>
							<div class="divshare"><article style="text-align:justify;"><?php echo $ak['description'];?> </article></div>
							
							</div>
							</div>
       					  <div class="col-xs-12 col-sm-12 col-md-4">
						<form name="enquiry" method="post" action="sms.php">
						  <div  class="margin-form">
							<p  class="font-form"><strong><?php echo $ak['company'];?></strong></p>
							<p ><img src="offersimage/<?php echo $ak['image'];?>" alt="Top 20 Best B2B websites in India"  class="img-popup-form" style="height:40px;width:40px; position:relative; border-radius:50%; "  ><strong><?php echo $ak['name'];?></strong></span> </p>
							<p><?php echo $ak['url'];?></p> 
							 <form name="form" method="post" action="sms.php">
                                <div class="form-group">
                                  <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
                                </div>
                                <button type="submit" class="btn btn-default" name="enquiry">Enquiry</button>
                    			</form>
							<p class="pad" ></p>
						  </div>
						  </form>
						</div>
     				 </div>
	   <?php } ?>
					</div>
					<div class="modal-footer">
					  <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
					</div>
				  </div>
				  
				</div>
	  		</div>
	  <!-- Popup Stop Here--->
	        <div class="main-inner">

	            <div class="content">
	              <div class="heros hero-background " >
					  	<!--<div class="container">
							<div class="row rowmain" >
									 <?php 
									 $q="select * from main_head ";
									 $ar=ExecuteQueryResule($q);
									 ?>    
										<h1 class="heading"><?php echo $ar[0]['heading']; ?> </h1>
										<p  class="subheading"><?php echo $ar[0]['subheading']; ?></p>
							 </div>
						</div>
						<div class="container">
						<?php		
						$m="select * from offerday  order by id desc    limit 1 ";
						$mr=ExecuteQueryResule($m);
						foreach ($mr as $ak) {
						?>	
							<div class="row rowmain">
								<div class="col-md-3 marquebo"><a href="#" data-toggle="modal" data-target="#myModal"><img  src="offersimage/<?php echo $ak['image'];?>"  class="img-pop" alt="Top 20 Best B2B websites in India" title="adidas"></a></div>
								<div class="col-md-7 marquebo" ><marquee><a href="#" data-toggle="modal" data-target="#myModal"  class="marque-cont" >Supplier's Best Deal Of The Day</a></marquee></div>
								<div class="col-md-2"><button type="button"  data-toggle="modal" data-target="#myModal" name="Click Here" class="gotod"  >Go To Deal</button></div>
							</div>
						<?php } ?>
						</div>
						<div class="container">
						
          <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
  
  <ol class="carousel-indicators">
    <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
    <li data-target="#carousel-example-generic" data-slide-to="1"></li>
    <li data-target="#carousel-example-generic" data-slide-to="2"></li>
  </ol>

  
  <div class="carousel-inner" role="listbox">
    <div class="item active">
      <img src="assets/images/sliders/01.jpg" alt="..." style="height:280px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
    <div class="item">
      <img src="assets/images/sliders/02.jpg" alt="..." style="height:280px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>
<div class="item">
      <img src="assets/images/sliders/3.jpg" alt="..." style="height:280px;">
      <div class="carousel-caption">
        ...
      </div>
    </div>  </div>

 
  
</div>
         
        
						</div>
						<div class="slider " >
						<?php 
						 $s="select * from latestpost";
						 $sr=ExecuteQueryResule($s);
						foreach ($sr as $argk) {
						    
						 ?>  
	
						<div>
							<a href="http://www.windermart.com/<?php echo $argk['url'];?>"><img  src="shareimg/<?php echo $argk['image']; ?>" alt="Business Directory of Indian Suppliers"  style="height:280px; width:1349px;"  /></a>
							<a class="left carousel-control" href="#carousel-example-generic" role="button" data-slide="prev">
    <span class="glyphicon glyphicon-chevron-left" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="right carousel-control" href="#carousel-example-generic" role="button" data-slide="next">
    <span class="glyphicon glyphicon-chevron-right" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
						</div>
						<?php
						}
						?>
						
	
					</div>-->
					
  
  <div id="myCarousel" class="carousel slide" data-ride="carousel">
    <!-- Indicators -->
    <ol class="carousel-indicators">
      <li data-target="#myCarousel" data-slide-to="0" class="active"></li>
      <li data-target="#myCarousel" data-slide-to="1"></li>
      <li data-target="#myCarousel" data-slide-to="2"></li>
	   <li data-target="#myCarousel" data-slide-to="3"></li>
    </ol>

    <!-- Wrapper for slides -->
    <div class="carousel-inner">
      <div class="item active">
        <img src="assets/images/sliders/3.jpg" alt="Los Angeles" style="width:100%;">
      </div>

      <div class="item">
        <img src="assets/images/sliders/1.jpg" alt="Chicago" style="width:100%;">
      </div>
    
      <div class="item">
        <img src="assets/images/sliders/2.jpg" alt="New york" style="width:100%;">
      </div>
	  <div class="item">
        <img src="assets/images/sliders/4.jpg" alt="New york" style="width:100%;">
      </div>
    </div>

    <!-- Left and right controls -->
    <a class="left carousel-control" href="#myCarousel" data-slide="prev">
      <span class="glyphicon glyphicon-chevron-left" style="margin-left: -100px;"></span>
      <span class="sr-only">Previous</span>
    </a>
    <a class="right carousel-control" href="#myCarousel" data-slide="next">
      <span class="glyphicon glyphicon-chevron-right" style="margin-right: -100px;"></span>
      <span class="sr-only">Next</span>
    </a>
  </div>

						<?php include('searchfrm.php'); ?>
							
					</div>
				</div>

				
				
					<div class="slider slider-mar" >
						<?php 
						 $s="select * from latestpost";
						 $sr=ExecuteQueryResule($s);
						foreach ($sr as $argk) {
						    
						 ?>  
	
						<div>
							<a href="http://www.windermart.com/<?php echo $argk['url'];?>"><img class="imgslider" src="shareimg/<?php echo $argk['image']; ?>" alt="Business Directory of Indian Suppliers" /></a>
						</div>
						<?php
						}
						?>
	
					</div>                    	
					<div class="header-bottom catli" style="margin-top:0px;">
					
						<ul class="nav ">
						 <?php 
                             $s="select * from category order by id desc limit 8,11";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>  
							
							<li class="nav-item1" >
							<a href="category.php?id=<?php echo $k['id'];?>" class=" nav-link">
							 <p><img src="icon/<?php echo $k['icon'];?>" alt="Widermart directory of Manufacturer, supplier, Trader, exporter, B2B business portal in India" class="catstyle1" /></p>
							 <p style="color:black;"> <?php echo $k['cat_name'];?></p>
							 </a>
							</li>
							
							<?php
						}
						?>
							

							
						</ul>

						
					
					</div>



					  


					<div class="container">
						<?php 
							$m="select * from material ";
	 						$mr=ExecuteQueryResule($m);
	 						//foreach ($mr as $ak) {

						?>
						<div class="page-title">
							<h2><?php echo $mr[0]['heading'];?></h2>

							<p>
								<?php echo $mr[0]['subheading'];?>
							</p>
						</div><!-- /.page-title -->
						<?php //} ?>
						<div class="row">
							<div class="col-sm-12 col-xl-12">
								<div class="cards-wrapper">
									<div class="row">
										
										<?php 
											$m="select * from users  where status='active' and pagetype='list'   limit 9 ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {
										?>	
										 
											<div class="col-sm-6 col-md-4 serch">
												<div class="card">
													<div class="card-image" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');">
														<a href="listing.php?id=<?php echo $ak['id'];?>"></a> 

														<div class="card-image-rating">
															<i class="md-icon">star</i>
															<i class="md-icon">star</i>
															<i class="md-icon">star</i>
															<i class="md-icon">star</i>
															<i class="md-icon">star</i>
														</div><!-- /.card-image-rating -->
													</div><!-- /.card-image -->

													<div class="card-content">
														<!--<h3><a href="index.php">Food &amp; Drink</a></h3>-->
														<h2><a href="listing.php?id=<?php echo $ak['id'];?>">Product  : <?php echo $ak['key_word'];?></a></h2>
														<h2><a href="listing.php?id=<?php echo $ak['id'];?>">Company  : <?php echo $ak['company_name'];?></a></h2>
														
													</div><!-- /.card-content -->
													<!--<div class="card-content">
																												
														<div><?php echo $ak['key_word'];?></div>
														
													</div>-->
													<!-- /.card-actions -->
												</div><!-- /.card -->
											</div><!-- /.col-* -->
										<?php } ?>
									</div><!-- /.row -->
								</div><!-- /.card-wrapper -->
							</div><!-- /.col-* -->
							<?php 
					         $m="select * from do";
					         $mr=ExecuteQueryResule($m);
					      
					       
					         ?>  

							<!--<div class="col-sm-2 hidden-lg-down">
								<div class="your-space">
									<p>
										Do you want to be here?
									</p>

									<a href="#" class="btn btn-primary btn-block"><?php echo $mr[0]['number']; ?></a>

									<a href="#" class="btn btn-secondary btn-block">Contact</a>
								</div>
							</div><!-- /.col-* -->		
						</div><!-- /.row -->
					</div><!-- /.container -->






                    <div id="preview" class="divlist">
						<button onclick="myFunction()" class="divbutton" >Best Business Directory Website in India</button></div>
						<div id="myDIV1" class="divlist">
						<button onclick="myFunction()" class="divbutton">Best Business Directory Website in India</button></div>
					<div class="counter" id="myDIV" >
						<div class="container">
						   
							<div class="row" class="rowlist" >
								<div class="col-sm-12 col-md-3">
									<!--<h2>Best directory listing </h2>-->
									<!--<button onclick="myFunction()">Best directory listing</button>-->
								</div><!-- /.col-* -->

								<div class="col-sm-12 col-md-9">
								<?php 
								$m="select count(*) as totaluser from users      ";
								$mr=ExecuteQueryResule($m);
								foreach ($mr as $ak) {
								$totaluser= $ak['totaluser'];
								$before=10060;
								$total=$before+$totaluser;
								}

										?>
										<?php 
									$ma="	SELECT count(city) as count, city FROM users GROUP BY city ORDER BY count";
								//$ma="SELECT city, count(*) as total FROM `users` GROUP BY `city` ";
								$mra=ExecuteQueryResule($ma);
								foreach ($mra as $aka) {
								$totalusera= $aka['count'];
								$beforea=10050;
								$totala=$beforea+$totalusera;
								}

										?>	
										<?php 
								$ma="SELECT company_name, count(*) as company FROM `users` ";
								$mra=ExecuteQueryResule($ma);
								foreach ($mra as $aka) {
								$totalusera= $aka['company'];
								$beforea=10050;
								$tota=$beforea+$totalusera;
								}

										?>	
										<?php 
								$mp="select count(*) as totalcompany from users      ";
								$mrp=ExecuteQueryResule($mp);
								foreach ($mrp as $akp) {
								$totalcompany= $akp['totalcompany'];
								$before=10050;
								$totalcompany=$before+$totalcompany;
								}

										?>
								<div  class="col-sm-12 col-md-9" id="myDIV">
								
									<div class="row">
										<div class="col-sm-3">
											<div class="row">
											<i class="md-icon">layers</i> 
											<h3><?php echo  $total; ?></h3>
											<p>Listings added</p>
											</div>
										</div><!-- /.col-* -->

										<div class="col-sm-3">
										<div class="row">
											<i class="md-icon">location_city</i> 
											<h3><?php echo  $totala; ?></h3>
											<p>Cities Covered</p>
											</div>
										</div><!-- /.col-* -->					

										<div class="col-sm-3">
										<div class="row">
											<i class="md-icon">people</i> 
											<h3><?php echo  $tota; ?></h3>
											<p>Registered Users</p>
											</div>
										</div><!-- /.col-* -->		

										<div class="col-sm-3">
										<div class="row">
											<i class="md-icon">public</i> 
											<h3><?php echo  $totalcompany; ?></h3>
											<p>Companies</p>
											</div>
										</div><!-- /.col-* -->														
									</div>
									<?php //} ?><!-- /.row -->
								</div><!-- /.col-* -->
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div>
					</div>
					<?php 
					 $m="select * from recent_news";
					 $rn=ExecuteQueryResule($m);


					 ?>  
					<div class="push-bottom">
						<div class="container">
							<div class="page-title background-white">
								<h2><?php echo $rn[0]['heading']; ?></h2>
								<p><?php echo $rn[0]['subheading']; ?></p>
							</div>

							<div class="row">
							<?php 
								//$m="select * from users inner join category on category.id=users.cat_id inner join mainproduct on mainproduct.id=users.prod_id  limit 12 ";
								$m="select * from users  where status='active' and pagetype='verified' order by id desc   limit 12 ";
								$mr=ExecuteQueryResule($m);
								foreach ($mr as $ak) {

										?>	
								<div class="col-sm-12 col-md-4 serch">
								
									<div class="card">
										<div class="card-image" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');">
											<a href="listing.php?id=<?php echo $ak['id'];?>"></a>
										</div><!-- /.card-image -->

										<div class="card-content">
											<h2><a href="listing.php?id=<?php echo $ak['id'];?>">Product  : <?php echo $ak['key_word']; ?></a></h2>
											<h2><a href="listing.php?id=<?php echo $ak['id'];?>">Company  : <?php echo $ak['company_name']; ?></a></h2>
										</div><!-- /.card-content -->

										<!-- /.card-actions -->
									</div><!-- /.card -->
								</div><!-- /.col-* -->
							
							<?php	}	?>
								
							
							</div><!-- /.row -->
						</div><!-- /.container -->
					</div><!-- /.push-bottom -->

					
					<div class="cta">
						<div class="container">
							<h2><?php echo $rn[1]['heading']; ?></h2>

							<p style="text-align:justify;"> 
								<?php echo $rn[1]['subheading']; ?>
							</p>

							<a href="registration.php" class="btn btn-primary">Join Us</a>
						</div><!-- /.container -->
					</div><!-- /.cta -->

	            </div><!-- /.content -->
	        
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

<?php include_once'footer.php';  ?>