<?php 
include_once'header.php';
?>
    
    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">

	            <div class="content">
	                <div class="hero" style="background: #426e5f;">
						<div class="hero-content">
							<div class="container">
							 <?php 
					         $q="select * from main_head ";
					         $ar=ExecuteQueryResule($q);
					         ?>    
								<h1><?php echo $ar[0]['heading']; ?> </h1>
								
								<p>
									<?php echo $ar[0]['subheading']; ?>
								</p>

								
							</div><!-- /.container -->
						</div><!-- /.hero-content -->

						<div class="hero-form ">
							<div class="container">
								<form method="get" action="search.php" >
									<div class="row">
										<div class="col-md-3">
											
											<div class="form-group">
											
						                       
						    
						    					<input type="Search" class="form-control" name="search" placeholder="Search Today Best Products !">
							
											
						  					</div>
										</div>

										<div class="col-md-2">
											
											<div class="form-group">
						    
											    <select class="form-control">
													<option value="0">Select a category</option>
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
						  						<button type="submit" name="submit" class="btn btn-default"><i class="fa fa-search"></i></button>
						  					</div>
										</div>

									</div>
								</form> 

								
							</div><!-- /.container -->
						</div><!-- /.hero-form -->	

						<div class="hero-layer"></div>
					</div><!-- /.hero -->


					<div class="slider" style="    margin-top: -85px;">
						<?php 
						 $s="select * from slider";
						 $sr=ExecuteQueryResule($s);
						foreach ($sr as $k) {

						 ?>  

						<div>
				    		<img class="imgslider" src="img/<?php echo $k['image']; ?>" />
				  		</div>
						<?php
						}
						?>
  
					</div>







					<div class="header-bottom">
					
						<ul class="nav nav-pills">
						 <?php 
                             $s="select * from category order by id desc limit 10";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>  
							<li class="nav-item"><i class="fa fa-cogs  fa-2x" aria-hidden="true" style="    margin-left: 40%;"></i><a href="#" class="nav-link"> <?php echo $k['cat_name'];?></a></li>
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
											$m="select * from category inner join users on users.cat_id=category.id where users.id limit 12 ";
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
													<div class="card-actions">
														<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-icon"><i class="md-icon">favorite</i></a>
														<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-icon"><i class="md-icon">flag</i></a>
														<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-btn btn btn-transparent">Show More</a>
													</div><!-- /.card-actions -->
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
					<?php 
					 $m="select * from recent_news";
					 $rn=ExecuteQueryResule($m);


					 ?>  
					<div class="push-bottom">
						<div class="container">
							<div class="page-title background-white">
								<h2><?php echo $rn[0]['heading']; ?><pan/h2>
								<p><?php echo $rn[0]['subheading']; ?></p>
							</div><!-- /.page-title -->

							<div class="row">
							<?php 
					         $m="select * from recent_news";
					         $rc=ExecuteQueryResule($m);
					         foreach ($rc as $k) {
					         
					       
					         ?>  
								<div class="col-sm-12 col-md-4">
								
									<div class="card">
										<div class="card-image" style="background-image: url('assets/img/tmp/<?php echo $k['image']; ?>');">
											<a href="#"></a>
										</div><!-- /.card-image -->

										<div class="card-content">
											<h3><a href="#"><?php echo $k['subname']; ?></a></h3>
											<h2><a href="#"><?php echo $k['name']; ?></a></h2>
										</div><!-- /.card-content -->

										<div class="card-actions">
											<a href="#" class="card-action-icon"><i class="md-icon">insert_comment</i><span> 12</span></a>
											<a href="#" class="card-action-icon"><i class="md-icon">access_time</i><span> 18. June</span></a>

											<a href="#" class="card-action-btn btn btn-transparent">Read More</a>
										</div><!-- /.card-actions -->
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

							<a href="#" class="btn btn-primary">More Information</a>
						</div><!-- /.container -->
					</div><!-- /.cta -->

	            </div><!-- /.content -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

<?php include_once'footer.php';  ?>