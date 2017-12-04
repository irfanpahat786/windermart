<?php include_once'header.php';
print_r($_REQUEST);	
?>

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
						  <select class="form-control1" id="category" name="cat_id">
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
						<select class="form-control1" id='country-list' name="country"  >
							
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
					  <select class="form-control1" id="state" name="state">
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
						<select class="form-control1" id='city' name="city"  >
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
  <div id="carouselExampleControls" class="carousel slide" data-ride="carousel">
    <div class="carousel-inner" role="listbox">
      <div class="carousel-item active"> <img class="d-block img-fluid" src="assets/img/tmp/01.jpg" style="width: 100%; height: 200px;" alt="Business Directory India: Top Online Business Listing Site 2017"> </div>
      <div class="carousel-item"> <img class="d-block img-fluid" src="assets/img/tmp/02.jpg" style="width: 100%;height: 200px;" alt="Business Directory India: Top Online Business Listing Site 2017"> </div>
      <div class="carousel-item"> <img class="d-block img-fluid" src="assets/img/tmp/05.jpg" style="width: 100%;height: 200px;" alt="Business Directory India: Top Online Business Listing Site 2017"> </div>
    </div>
    <a class="carousel-control-prev" href="#carouselExampleControls" role="button" data-slide="prev"> <span class="carousel-control-prev-icon" aria-hidden="true"></span> <span class="sr-only">Previous</span> </a> <a class="carousel-control-next" href="#carouselExampleControls" role="button" data-slide="next"> <span class="carousel-control-next-icon" aria-hidden="true"></span> <span class="sr-only">Next</span> </a> </div>
  <div class="container contai">
    <div class="row rowmain">
      <div class="col-xs-12 col-sm-12 col-md-12" id="mysearchdiv">
	  <?php 
	  									
											$id=$_REQUEST['lid'];
											echo $m="select * from users  inner join category on category.id=users.cat_id inner join mainproduct on mainproduct.id=users.prod_id    where users.url='$id'  ";
											
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {
											$product=$ak['product'];
											$prod=$ak['prod_id'];
											
											//$id=$ak['cat_id'];

										?>	
        <div style="margin-top:20px">
          <p style=" font-size: 18px;    margin-bottom: 0;"><?php echo $ak['cat_name'];?><img src="assets/img/download.jpg" alt="Business Directory India: Top Online Business Listing Site 2017" style="    height: 15px; width: 15px; margin: 0 10px;"><?php echo $ak['product'];?></p>
          <p style=" font-size: 20px;   margin-bottom: 0;">Company<img src="assets/img/download.jpg" alt="Business Directory India: Top Online Business Listing Site 2017" style=" height: 15px; width: 15px; margin: 0 10px;"><?php echo $ak['company_name'];?></p>
        </div>
		<?php }?>
      </div>
    </div>
    <div class="wrapper">
      <div class="row rowmain">
        <div class="col-xs-12 col-sm-12 col-md-12">
		<?php 
											$id=$_REQUEST['id'];
											$m="select * from users where id='$id'  ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {

										?>	
           <img src="user/uploads/usersimage/<?php echo $ak['image'];?>" alt="Business Directory India: Top Online Business Listing Site 2017" class="lisimg" >
	<?php } ?>
        </div>
      </div>
    </div>
    <div class="wrapper" >
	<?php 
											$id=$_REQUEST['id'];
											$_SESSION['id']=$id;
											$m="select * from users where id='$id'  ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {

										?>	
      <div class="row rowmain lispro">
	  <div class="col-xs-12 col-sm-12 col-md-8" >
        <div class="col-xs-12 col-sm-12 col-md-5"> <img src="user/uploads/usersimage/<?php echo $ak['image'];?>" alt="Business Directory India: Top Online Business Listing Site 2017"  class="primg" > </div>
        <div class="col-xs-12 col-sm-12 col-md-1"></div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <p style="font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></p>
            <p  style="text-align:justify;"><?php echo $ak['description'];?></p>
            <p><?php echo $ak['website'];?></p>
          
        </div>
		</div>
		
        <div class="col-xs-12 col-sm-12 col-md-4" style="border-left:2px solid #000; ">
          <div style=" margin: 20px; ">
            <p  style="font-size: 20px;"><strong><?php echo $ak['company_name'];?></strong></p>
            <p ><img src="user/uploads/usersimage/<?php echo $ak['image'];?>" style="    width: 10%;
    height: 10%;"> <span style="padding-left: 20px; font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></span> </p>
		
            <form name="form" method="post" action="sms.php">
            <div class="form-group">
              <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
            </div>
            <button type="submit" class="btn btn-default" name="enquiry">Enquiry</button>
			</form>
            <p style="    padding-top: 12px;"></p>
          </div>
        </div>
		
      </div>
	  <?php } ?>
    </div>
	<div class="wrapper" >
	<?php 
											$id=$_REQUEST['id'];
											$m="select * from users where id='$id'  ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {

										?>	
      <div class="row rowmain lispro">
	  <div class="col-xs-12 col-sm-12 col-md-8" >
        <div class="col-xs-12 col-sm-12 col-md-5"> <img src="user/uploads/usersimage/<?php echo $ak['image1'];?>"  class="primg" > </div>
        <div class="col-xs-12 col-sm-12 col-md-1"></div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <p style="font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></p>
            <p  style="text-align:justify;"><?php echo $ak['description'];?></p>
            <p><?php echo $ak['website'];?></p>
          
        </div>
		</div>
		
        <div class="col-xs-12 col-sm-12 col-md-4" style="border-left:2px solid #000; ">
          <div style=" margin: 20px; ">
            <p  style="font-size: 20px;"><strong><?php echo $ak['company_name'];?></strong></p>
            <p ><img src="user/uploads/usersimage/<?php echo $ak['image1'];?>" style="    width: 10%;
    height: 10%;"> <span style="padding-left: 20px; font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></span> </p>
		
            <form name="form" method="post" action="sms.php">
            <div class="form-group">
              <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
            </div>
            <button type="submit" class="btn btn-default" name="enquiry">Enquiry</button>
			</form>
            <p style="    padding-top: 12px;"></p>
          </div>
        </div>
		
      </div>
	  <?php } ?>
    </div>
	<div class="wrapper" >
	<?php 
											$id=$_REQUEST['id'];
											$m="select * from users where id='$id'  ";
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {
											$prod_id=$ak['prod_id'];

										?>	
      <div class="row rowmain lispro">
	  <div class="col-xs-12 col-sm-12 col-md-8" >
        <div class="col-xs-12 col-sm-12 col-md-5"> <img src="user/uploads/usersimage/<?php echo $ak['image2'];?>"  class="primg" > </div>
        <div class="col-xs-12 col-sm-12 col-md-1"></div>
          <div class="col-xs-12 col-sm-12 col-md-6">
            <p style="font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></p>
            <p  style="text-align:justify;"><?php echo $ak['description'];?></p>
            <p><?php echo $ak['website'];?></p>
          
        </div>
		</div>
		
        <div class="col-xs-12 col-sm-12 col-md-4" style="border-left:2px solid #000; ">
          <div style=" margin: 20px; ">
            <p  style="font-size: 20px;"><strong><?php echo $ak['company_name'];?></strong></p>
            <p ><img src="user/uploads/usersimage/<?php echo $ak['image2'];?>" style="    width: 10%;
    height: 10%;"> <span style="padding-left: 20px; font-size: 18px;"><strong><?php echo $ak['key_word'];?></strong></span> </p>
		
            <form name="form" method="post" action="sms.php">
            <div class="form-group">
              <input type="number" class="form-control" name="mobile" placeholder="Enter Your Mobile No.">
            </div>
            <button type="submit" class="btn btn-default" name="enquiry">Enquiry</button>
			</form>
            <p style="    padding-top: 12px;"></p>
          </div>
        </div>
		
      </div>
	  <?php } ?>
    </div>
  </div>
  <div class="container">
	<div class="row">
		<div class="col-md-1">
		</div>
		<div class="col-md-6 reviewm">
    	<div class="well well-sm">
            <div class="text-right">
                <a class="btn btn-success btn-green" href="#reviews-anchor" id="open-review-box">Leave a Review</a>
            </div>
        
            <div class="row" id="post-review-box" style="display:none;">
                <div class="col-md-12">
                    <form accept-charset="UTF-8" action="review.php" method="post">
                        <input id="ratings-hidden" name="id" type="hidden" value="<?php echo $_SESSION['id'];?>"> 
						 <input id="ratings-hidden" name="prod_id" type="hidden" value="<?php echo $prod_id;?>"> 
                        <textarea class="form-control animated" cols="50" id="new-review" name="review" placeholder="Enter your review here..." rows="5" style="margin-bottom:20px;"></textarea>
        				<input type="radio" name="rating" value="One Star" <?php if($ak['status']=='One Star') echo "checked"; ?>>One Star&nbsp; <input type="radio" name="rating" value="Two Star" <?php if($ak['status']=='Two Star') echo "checked"; ?>>Two Star&nbsp; <input type="radio" name="rating" value="Three Star" <?php if($ak['status']=='Three Star') echo "checked"; ?>>Three Star&nbsp; <input type="radio" name="rating" value="Four Star" <?php if($ak['status']=='Four Star') echo "checked"; ?>>Four Star&nbsp; <input type="radio" name="rating" value="Five Star" <?php if($ak['status']=='Five Star') echo "checked"; ?>>Five Star
                        <div class="text-right">
                           
                            <button class="btn btn-success btn-lg" name="send" type="submit">Submit</button>
                        </div>
                    </form>
                </div>
            </div>
        </div> 
         
		</div>
	</div>
	</div>
	<div class="container">
	<div class="row rowmain">
	<div class="col-md-1">
		</div>
	<div class="col-md-11">
	<h3>Reviews & Rating</h3>
		</div>
	</div>
	</div>
	<div class="container contai">
	<?php
		 $sql = "SELECT * FROM  rating  where prod_id='$prod_id' ORDER BY id desc ";
		 $result = ExecuteQueryResule($sql);
		 foreach ($result as $ak) {
		 $pr=$ak['user_id'];
		   $sqlr="SELECT * FROM users  where id='$pr'  ";
		 $result1 = ExecuteQueryResule($sqlr);
		 foreach ($result1 as $result1s) {

			//$productid = $ak['prod_id'];
			//$categoryid = $ak['cat_id'];
		?>
	<div class="row rowmain">
	<div class="col-md-1">
		</div>
	<div class="col-md-11">
	<div class="review">
	<a href="http://www.windermart.com/<?php echo $result1s['id'];?>" class="review-user" style="background-image: url('user/uploads/usersimage/<?php echo $result1s['image'];?>');"></a>
	<div class="review-content">
		<h3><a href="http://www.windermart.com/<?php echo $ak['id'];?>"><?php echo $result1s['company_name']; ?></a></h3>
		<div class="rating"><?php echo $ak['review']; ?></div>
		<div class="review-rating"><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i><i class="md-icon">star</i></div><!-- /.review-rating -->
												</div>
												</div>
		</div>
	</div>
	<?php } } ?>
	</div>


  <div class="push-bottom">
    <div class="container">
      <div class="page-title background-white">
        <h2>Related Products</h2>
		 <?php 
	  										
											$id=$_REQUEST['id'];
											$m="select * from users  inner join category on category.id=users.cat_id inner join mainproduct on mainproduct.id=users.prod_id    where users.id='$id'  ";
											
					 						$mr=ExecuteQueryResule($m);
					 						foreach ($mr as $ak) {
											$product=$ak['product'];
											$prod=$ak['prod_id'];
											
											//$id=$ak['cat_id'];

										?>	
        <p><?php echo $ak['product'];?></p>
		<?php } ?>
      </div>
      <!-- /.page-title -->
      <div class="row">
	  <?php 
	  										
		$id=$_REQUEST['id'];
		$m="select * from users  inner join category on category.id=users.cat_id inner join mainproduct on mainproduct.id=users.prod_id    where users.prod_id='$prod'  ";
		
		$mr=ExecuteQueryResule($m);
		foreach ($mr as $ak) {
		//$id1=$ak['cat_id'];
		
		
		//$id=$ak['cat_id'];

	?>	
        <div class="col-sm-12 col-md-4 serch">
          <div class="card">
            <div class="card-image" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');"> <a href="http://www.windermart.com/<?php echo $ak['id'];?>"></a> </div>
            <!-- /.card-image -->
            <div class="card-content">
              <h2><a href="http://www.windermart.com/<?php echo $ak['id'];?>"><?php echo $ak['key_word']; ?></a></h2>
              <h2><a href="http://www.windermart.com/<?php echo $ak['id'];?>"><?php echo $ak['company_name']; ?></a></h2>
            </div>
            <!-- /.card-content -->
            
            <!-- /.card-actions -->
          </div>
          <!-- /.card -->
        </div>
		<?php } ?>
       
      </div>
      <!-- /.row -->
    </div>
    <!-- /.container -->
  </div>
  <?php include_once'footer.php';  ?>