<?php
include_once'db.php';


?>

<?php include_once'header.php'; ?>




    <div class="main-wrapper">
	    <div class="main">
	        <div class="main-inner">
	        		        
					<div class="content-title">
	<div class="container">
		<h1>Your Related Search</h1>

		<ul class="breadcrumb">
			<li><a href="index.php">Winder Mart</a> <i class="md-icon">keyboard_arrow_right</i></li>

			
				<li class="active">Your Related Search</li>
			
		</ul><!-- /.breadcrumb -->
	</div><!-- /.container -->
</div><!-- /.content-title -->
				

				<div class="container">
					<div class="row">
						<div class="col-md-8 col-lg-9">
				            <div class="content">
				                <div class="push-top-bottom">
	

	<div class="row">
		
                         <?php
                         /*$heading = $_GET['search'];
       						$category=$_REQUEST['cat_id'];
                      
        					$country=$_REQUEST['country'];
							$state=$_REQUEST['StateName'];*/
							if(isset($_POST['search']))
							{
							 
							
	                 
	              $query = " SELECT * FROM users WHERE cat_id like '%".$_POST['cat_id']."%' OR  country like '%".$_POST['country']."%'  OR  state like '%".$_POST['StateName']."%' OR  city like '%".$_POST['city_name']."%' ";
	            $result = ExecuteQueryResule($query);
				
				
    			if(count($result)>0)
				{
					foreach ($result as $ak) {
						
						$productid = $ak['prod_id'];
						$categoryid = $ak['cat_id'];
						
                    
				?>
        
        
        
        
			<div class="col-sm-4">
				<div class="card">
	<div class="card-image" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');">
		<a href="listing.php?id=<?php echo $ak['id'];?>"></a> 

        
        
		<div class="card-image-rating">
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
			<i class="md-icon">star</i>
		</div>
        
       
        
        
        <!-- /.card-image-rating -->
	</div><!-- /.card-image -->

	<div class="card-content">
		<h3><a href="listing.php?id=<?php echo $ak['id'];?>">Product : <?php echo $ak['key_word'];?></a></h3>
		<h2><a href="listing.php?id=<?php echo $ak['id'];?>">Company : <?php echo $ak['company_name'];?></a></h2>
	</div><!-- /.card-content -->

	<div class="card-actions">
		<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-icon"><i class="md-icon">favorite</i></a>
		<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-icon"><i class="md-icon">flag</i></a>
		<a href="listing.php?id=<?php echo $ak['id'];?>" class="card-action-btn btn btn-transparent">View detail</a>
	</div><!-- /.card-actions -->
</div><!-- /.card -->
			</div><!-- /.col-* -->
		
			
        <?php   } }	else {  ?> <p style=" color:red;"><?php echo 'No results';}}?></p>
        
        
        
		
	</div><!-- /.row -->
                              <nav class="pagination-wrapper">
	<ul class="pagination">
                                  
                                  </ul>
                                    </nav>
</div><!-- /.push-top-bottom -->
				            </div><!-- /.content -->
			            </div><!-- /.col-* -->

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
		                                                 <a href="listing.php?id=<?php echo $ak['id'];?>" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');"></a>
	                                                </div><!-- /.card-small-image -->

	                                                <div class="card-small-content">
	                                             	     <h3><a href="listing.php?id=<?php echo $ak['id'];?>">Product : <?php echo $ak['key_word'];?></a></h3>		
	                                             	     <h4><a href="listing.php?id=<?php echo $ak['id'];?>">Company : <?php echo $ak['company_name']; ?></a></h4>
	                                                </div><!-- /.card-small-content -->
                                            </div><!-- /.card-small -->
		                               <?php
                }
                                             
                                             
                                             ?>
			
                                             
		
	                                     </div><!-- /.cards-small-wrapper -->
                               </div><!-- /.widget -->

	<div class="widget">
	<h2 class="widgettitle">Reviews</h2>

	<div class="reviews">
        
		 
			<div class="review">
				<a href="#" class="review-user" style="background-image: url('assets/img/tmp/profile-1.jpg');"></a>

				<div class="review-content">
					<h3><a href="listing-detail.html">See H. Oceguera</a></h3>
					<div class="review-rating"><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star_border</i></div><!-- /.review-rating -->
				</div><!-- /.review-content -->
			</div><!-- /.review -->
		 
		
		
	</div><!-- /.reviews -->
</div><!-- /.widget -->
				            	
	<div class="widget">
	<h2 class="widgettitle">Navigation</h2>

	<ul class="menu nav nav-stacked">
		<li class="nav-item">
			<a href="listings.html" class="nav-link">Wooden</a>			
		</li>

		<li class="nav-item">
			<a href="blog.html" class="nav-link">Wooden</a>		
		</li>

		<li class="nav-item">
			<a href="admin-dashboard.html" class="nav-link">Wooden</a>
		</li>

		<li class="nav-item">
			<a href="submit.html" class="nav-link">Wooden</a>					
		</li>
	</ul><!-- /.nav -->
</div><!-- /.widget -->
				            </div><!-- /.sidebar -->
				        </div><!-- /.col-* -->
                        
                      
                        
                        
		            </div><!-- /.row -->
	            </div><!-- /.container -->
	        </div><!-- /.main-inner -->
	    </div><!-- /.main -->
    </div><!-- /.main-wrapper -->

    <?php 
include_once'footer.php';
    ?>








