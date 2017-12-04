<?php 
include_once'header.php';

?>
    
    <div class="main-wrapper">
	    <div class="main">
		<!-- Popup Start Here--->
			<div class="modal fade" id="myModal" role="dialog">
				<div class="modal-dialog">
				
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
						  <div class="col-xs-12 col-sm-12 col-md-8">
							<div class="col-xs-12 col-sm-12 col-md-6"> <img src="offersimage/<?php echo $ak['image'];?>"  class="img-popup" style=" height:220px;"> </div>
							<div class="col-xs-12 col-sm-12 col-md-6">
							  <div  class="margin-popup">
								<p  class="font-popup"><strong><?php echo $ak['name'];?></strong></p>
								<p><?php echo $ak['description'];?></p>
								<p><?php echo $ak['url'];?></p>
							  </div>
							</div>
							</div>
       					  <div class="col-xs-12 col-sm-12 col-md-4">
						<form name="enquiry" method="post" action="sms.php">
						  <div  class="margin-form">
							<p  class="font-form"><strong><?php echo $ak['company'];?></strong></p>
							<p ><img src="offersimage/<?php echo $ak['image'];?>"   class="img-popup-form"  ><strong><?php echo $ak['name'];?></strong></span> </p>
							<p><?php echo $ak['url'];?></p>
							<div class="form-group">
							  <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
							</div>
							<button type="submit" class="btn btn-default" name="enquiry"  >Enquiry</button>
							<p style="    padding-top: 12px;"></p>
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
	                <div class="hero hero-background " >
						<div class="hero-content">
							<div class="container hero-containar-margin" >
							 <?php 
					         $q="select * from main_head ";
					         $ar=ExecuteQueryResule($q);
					         ?>    
								<h1  class="heading"><?php echo $ar[0]['heading']; ?> </h1>
								
								<p  class="subheading" style="color:#fff900;">
									<?php echo $ar[0]['subheading']; ?>
								</p>

								
							</div>
							</div>
							<div class="hero-content" ;>
							<?php 
											
											$m="select * from offerday  order by id desc    limit 1 ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {

										?>	
							<div class="container containar-pop" >
							
								<div class="col-md-3 border2p" ><a href="#" data-toggle="modal" data-target="#myModal"><img  src="offersimage/<?php echo $ak['image'];?>" class="img-pop" alt="12345" title="adidas"></a></div>
								<div class="col-md-7" ><marquee><a href="#" data-toggle="modal" data-target="#myModal"  class="marque-cont">Supplier's Best Deal Of The Day</a></marquee></div>
								<div class="col-md-2"><button type="button"  data-toggle="modal" data-target="#myModal" name="Click Here" class="gotod" style="background-color:#FF6600;">Go To Deal</button></div>
							</div>
							
							<?php } ?>
						</div><!-- /.hero-content -->
						
						<?php include('searchfrm.php'); ?>
						
						
					</div>


					<div class="slider slider-mar" >
						<?php 
						 $s="select * from slider";
						 $sr=ExecuteQueryResule($s);
						foreach ($sr as $k) {

						 ?>  

						<div>
				    		<a href="listing.php?id=<?php echo $k['id'];?>"><img class="imgslider" src="img/<?php echo $k['image']; ?>" /></a>
				  		</div>
						<?php
						}
						?>
  
					</div>







					<div class="header-bottom">
					
						<ul class="nav nav-pills">
						 <?php 
                             $s="select * from category order by id desc limit 8,8";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>  
							
							<li class="nav-item" >
							<a href="category.php?id=<?php echo $k['id'];?>" class=" nav-link">
							 <img src="icon/<?php echo $k['icon'];?>" style="border-radius:50%; height:40px; width:40px; position: relative;" /> <?php echo $k['cat_name'];?>
							 </a>
							</li>
							
							<?php
						}
						?>
							

							
						</ul><!-- /.nav -->

						
					<!-- /.container -->
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
							<div class="col-sm-12 col-xl-10">
								<div class="cards-wrapper">
									<div class="row">
										
										<?php 
											//$m="select * from users inner join category on category.id=users.cat_id inner join mainproduct on mainproduct.id=users.prod_id  limit 12 ";
											$m="select * from users  where status='active' and pagetype='list'   limit 9 ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {

										?>	
										 
											<div class="col-sm-6 col-md-4">
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

							<div class="col-sm-2 hidden-lg-down">
								<div class="your-space">
									<p>
										Do you want to be here?
									</p>

									<a href="#" class="btn btn-primary btn-block"><?php echo $mr[0]['number']; ?></a>

									<a href="#" class="btn btn-secondary btn-block">Contact</a>
								</div><!-- /.your-space -->
							</div><!-- /.col-* -->		
						</div><!-- /.row -->
					</div><!-- /.container -->







					<div class="counter" >
						<div class="container" >
							<div class="row" >
								<div class="col-sm-12 col-md-3">
									<h2>Best directory listing </h2>
								</div><!-- /.col-* -->

								<div class="col-sm-12 col-md-9">
								<?php 
								$m="select count(*) as totaluser from users      ";
								$mr=ExecuteQueryResule($m);
								foreach ($mr as $ak) {
								$totaluser= $ak['totaluser'];
								$before=10000;
								$total=$before+$totaluser;
								}

										?>
										<?php 
									$ma="	SELECT count(city) as count, city
FROM users
GROUP BY city
ORDER BY count";
								//$ma="SELECT city, count(*) as total FROM `users` GROUP BY `city` ";
								$mra=ExecuteQueryResule($ma);
								foreach ($mra as $aka) {
								$totalusera= $aka['count'];
								$beforea=10000;
								$totala=$beforea+$totalusera;
								}

										?>	
										<?php 
								$ma="SELECT company_name, count(*) as company FROM `users` ";
								$mra=ExecuteQueryResule($ma);
								foreach ($mra as $aka) {
								$totalusera= $aka['company'];
								$beforea=10000;
								$tota=$beforea+$totalusera;
								}

										?>	
										<?php 
								$mp="select count(*) as totalcompany from users      ";
								$mrp=ExecuteQueryResule($mp);
								foreach ($mrp as $akp) {
								$totalcompany= $akp['totalcompany'];
								$before=10000;
								$totalcompany=$before+$totalcompany;
								}

										?>
										<div class="col-sm-12 col-md-9">
								
									<div class="row">
										<div class="col-sm-3">
											<i class="md-icon">layers</i> 
											<h3><?php echo  $total; ?></h3>
											<p>Listings added</p>
										</div><!-- /.col-* -->

										<div class="col-sm-3">
											<i class="md-icon">location_city</i> 
											<h3><?php echo  $totala; ?></h3>
											<p>Cities Covered</p>
										</div><!-- /.col-* -->					

										<div class="col-sm-3">
											<i class="md-icon">people</i> 
											<h3><?php echo  $tota; ?></h3>
											<p>Registered Users</p>
										</div><!-- /.col-* -->		

										<div class="col-sm-3">
											<i class="md-icon">public</i> 
											<h3><?php echo  $totalcompany; ?></h3>
											<p>Companies</p>
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
								<div class="col-sm-12 col-md-4">
								
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

							<p> 
								<?php echo $rn[1]['subheading']; ?>
							</p>

							<a href="registration.php" class="btn btn-primary">Join Us</a>
						</div><!-- /.container -->
					</div><!-- /.cta -->

	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

<?php include_once'footer.php';  ?>