<?php
include_once'db.php';


?>

<?php include_once'header.php'; ?>



<div class="container contai">
	<div class="row rowmain">
		<form method="get" action="search.php" class="marginform" >
			<div class="col-md-2 scol">
				 <div class="form-group " >
					 <input type="text" name="key_word"   placeholder="Type Products"  class="sin"/>
				  </div>
			 </div>
		   	 <div class="col-md-2">
				<div class="form-group">
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
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control" id='country-list' name="country"  >
							
							<option value="India" >India</option>
						</select>
					</div>
				</div>
				<div class="col-md-3">
					<div class="form-group">
					   <?php 
						$q="select * from state order by StateName ";
						$ar=ExecuteQueryResule($q);
						 
						?>
					  <select class="form-control" id="state" name="state">
						  <option value="">Select state</option>
						<?php
						  if(count($ar)>0)
							{ 
								foreach($ar as $ak)
								{ 
									
								//print_r($ak);
								 echo '<option value="'.$ak['StateID'].'">'.$ak['StateName'].'</option>';
								}
							}else
							{
								echo '<option value="">State not available</option>';
							}
							?>								
						</select>
					</div>
				</div>
				<div class="col-md-2">
					<div class="form-group">
						<select class="form-control" id='city' name="city"  >
								<option value="" >Select state first</option>
						</select>
					</div>
				</div>
				<div class="col-md-1">
					<div class="form-group">
						<input type="submit" name="search" class="btn btn-default "  value="search">
					</div>
				</div>
		</form> 
	</div>
</div>
<div class="main-wrapper">
	<div class="main">
		<div class="main-inner">
				<div class="content-title">
				<?php
						$strWhereSearch='';
						
						$category=$_REQUEST['cat_id'];                      
						$country=$_REQUEST['country'];
						$state=$_REQUEST['state'];
						$city=$_REQUEST['city'];
						$key_word=$_REQUEST['key_word']; 
						$querys = " SELECT StateName FROM state WHERE StateID='".$state."' ";
						$results = ExecuteQueryResule($querys);
						if(count($results)>0)
						{
							foreach ($results as $aks) {
								
								$state = $aks['StateName'];
							}
						}
						$cityr = " SELECT city_name FROM cities WHERE city_id='".$city."' ";
						$citys = ExecuteQueryResule($cityr);						
						if(count($citys)>0)
						{
							foreach ($citys as $citi) {
								
								$city = $citi['city_name'];
							}
						}
						if($key_word!='')
						{ 
						  $strWhereSearch.=" and key_word like '%".$key_word."%' ";
						}
						if($category!='')
						{ 
						  $strWhereSearch.=" and cat_id='".$category."' ";
						}
						if($country!='')
						{ 
						  $strWhereSearch.=" and country like '%".$country."%'";
						}
						if($state!='')
						{ 
						  $strWhereSearch.=" and state like '%".$state."%'";
						}
						if($city!='')
						{ 
						  $strWhereSearch.=" and city like '%".$city."%'";
						}
						
						if(isset($_REQUEST['search']))
						{
				 
							$quer= " SELECT count(*) as total  FROM users WHERE 1 ".$strWhereSearch." ";
							$resul = ExecuteQueryResule($quer);							
							foreach ($resul as $a) {
								$produc = $a['total'];
							}
						}	
					?>
						<div class="container">
							<h1>Total Record Found(<?php echo $produc;?>)</h1>
							<ul class="breadcrumb">
								<li><a href="index.php">Winder Mart</a> <i class="md-icon">keyboard_arrow_right</i></li>
								<li class="active">Your Related Search</li>
							</ul><!-- /.breadcrumb -->
						</div><!-- /.container -->
				</div>
				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9">
							<div class="content">
								<div class="push-top-bottom">
								
									 <?php
										$strWhereSearch='';
										$category=$_REQUEST['cat_id'];                      
										$country=$_REQUEST['country'];
										$state=$_REQUEST['state'];
										$city=$_REQUEST['city'];
										$key_word=$_REQUEST['key_word']; 
										$querys = " SELECT StateName FROM state WHERE StateID='".$state."' ";
										$results = ExecuteQueryResule($querys);										
										if(count($results)>0)
										{
											foreach ($results as $aks) {
												
												$state = $aks['StateName'];
											}
										}
										$cityr = " SELECT city_name FROM cities WHERE city_id='".$city."' ";
										$citys = ExecuteQueryResule($cityr);
										if(count($citys)>0)
										{
											foreach ($citys as $citi) {
												
												$city = $citi['city_name'];
											}
										}
										if($key_word!='')
										{ 
										  $strWhereSearch.=" and key_word like '%".$key_word."%' ";
										}
										if($category!='')
										{ 
										  $strWhereSearch.=" and cat_id='".$category."' ";
										}
										if($country!='')
										{ 
										  $strWhereSearch.=" and country like '%".$country."%'";
										}
										if($state!='')
										{ 
										  $strWhereSearch.=" and state like '%".$state."%'";
										}
										if($city!='')
										{ 
										  $strWhereSearch.=" and city like '%".$city."%'";
										}
										
										if(isset($_REQUEST['search']))
										{
								 
											$query = " SELECT * FROM users WHERE 1 ".$strWhereSearch." ";
											$result = ExecuteQueryResule($query);
											if(count($result)>0)
											{
												foreach ($result as $ak) {
													
													$productid = $ak['prod_id'];
													$categoryid = $ak['cat_id'];
											?>
										<div class="col-sm-4 serch">
											<div class="card">
												<div class="card-image" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');" alt="Business Directory India: Top Online Business Listing Site 2017">
													<a href="BLClient/<?php echo $ak['url'];?>"></a>
													<div class="card-image-rating">
														<i class="md-icon">star</i>
														<i class="md-icon">star</i>
														<i class="md-icon">star</i>
														<i class="md-icon">star</i>
														<i class="md-icon">star</i>
													</div>
												</div>
												<div class="card-content">
													<h2><a href="BLClient/<?php echo $ak['url'];?>">Product : <?php echo $ak['key_word'];?></a></h2>
													<h2><a href="BLClient/<?php echo $ak['url'];?>">Company : <?php echo $ak['company_name'];?></a></h2>
												</div>
											</div>
									   </div>
									<?php   } }	else {  ?> <p style=" color:red;"><?php echo 'No results';}}?></p>
									</div>
									<nav class="pagination-wrapper">
										<ul class="pagination">
									  
										</ul>
									</nav>
								</div>
						</div>
						<div class="col-md-4 col-lg-3">
							<div class="sidebar">
								<div class="widget">
									<h2 class="widgettitle">Releted Products</h2>
										 <div class="cards-small-wrapper">
										 <?php
											 $sql = "SELECT * FROM users where prod_id='$productid' ORDER BY id desc limit 4";
											 $result = ExecuteQueryResule($sql);
											 foreach ($result as $ak) {
												$productid = $ak['prod_id'];
												$categoryid = $ak['cat_id'];
											?>
											 <div class="card-small">
													<div class="card-small-image">
														 <a href="BLClient/<?php echo $ak['url'];?>" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');" alt="Business Directory India: Top Online Business Listing Site 2017"></a>
													</div>
													<div class="card-small-content">
														 <h3><a href="BLClient/<?php echo $ak['url'];?>">Product : <?php echo $ak['key_word'];?></a></h3>		
														 <h4><a href="BLClient/<?php echo $ak['url'];?>">Company : <?php echo $ak['company_name']; ?></a></h4>
													</div><!-- /.card-small-content -->
											</div><!-- /.card-small -->
											<?php }  ?>
										 </div><!-- /.cards-small-wrapper -->
							   </div>
								<div class="widget">
									<h2 class="widgettitle">Navigation</h2>
										<div class="reviews">
										<?php
											 $sql = "SELECT * FROM users where prod_id='$productid' ORDER BY id desc ";
											 $result = ExecuteQueryResule($sql);
											 foreach ($result as $ak) {
												$productid = $ak['prod_id'];
												$categoryid = $ak['cat_id'];
											?>
											<div class="review">
												<a href="BLClient/<?php echo $ak['url'];?>" class="review-user" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');" alt="Business Directory India: Top Online Business Listing Site 2017"></a>
									
												<div class="review-content">
													<h3><a href="BLClient/<?php echo $ak['url'];?>"><?php echo $ak['company_name']; ?></a></h3>
													<div class="rating"><?php echo $ak['description']; ?></div>
													<div class="review-rating"><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i></div><!-- /.review-rating -->
												</div><!-- /.review-content -->
											</div>
											<?php } ?>
										</div><!-- /.reviews -->
								</div>            	
								<div class="widget">
									<h2 class="widgettitle">Navigation</h2>
							
										<ul class="menu nav nav-stacked">
										 <?php
											 $sql = "SELECT * FROM users where prod_id='$productid' ORDER BY id desc ";
											 $result = ExecuteQueryResule($sql);
											 foreach ($result as $ak) {
												$productid = $ak['prod_id'];
												$categoryid = $ak['cat_id'];
											?>
											<li class="nav-item">
												<a href="BLClient/<?php echo $ak['url'];?>" class="nav-link"><?php echo $ak['key_word'];?></a>			
											</li>
											<?php } ?>
											<!--<li class="nav-item">
												<a href="blog.html" class="nav-link">Wooden</a>		
											</li>
									
											<li class="nav-item">
												<a href="admin-dashboard.html" class="nav-link">Wooden</a>
											</li>
									
											<li class="nav-item">
												<a href="submit.html" class="nav-link">Wooden</a>					
											</li>-->
										</ul><!-- /.nav -->
								</div><!-- /.widget -->
							</div><!-- /.sidebar -->
						</div>                        
		            </div><!-- /.row -->
	            </div><!-- /.container -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

    <?php 
include_once'footer.php';
    ?>








