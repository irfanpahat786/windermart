

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
								<option value="" >Select cityt</option>
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
<div class="header-bottom catli" style="background-color: aliceblue;">
					
						<ul class="nav nav-pills" style="background-color:#426e5f;">
						 <?php 
                             $s="select * from category ";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>  
							
							<li class="nav-item1"  >
							<a href="portal/category/<?php echo $k['url'];?>" class=" nav-link">
							 <p><img src="icon/<?php echo $k['icon'];?>" alt="HPL sheets l HPL sheets l high pressure laminates sheets  Suppliers traders Delhi l India" class="catstyle1" /></p>
							 <p> <?php echo $k['cat_name'];?></p>
							 </a>
							</li>
							
							<?php
						}
						?>
							

							
						</ul>

						
					
					</div>

    
				<div class="container">
					<div class="row">
					<?php  
						$query = " SELECT * FROM category  WHERE id=15 ";
						$result = ExecuteQueryResule($query);
						foreach ($result as $ak) {
						?>
						<p><?php echo $ak['cat_name'];?> Categories Products</p>
						<?php } ?>
					</div>
					<div class="row">
						
									<?php  
									$query = " SELECT * FROM users  WHERE cat_id=15 ";
									$result = ExecuteQueryResule($query);
									foreach ($result as $ak) {
										$productid = $ak['prod_id'];
										$categoryid = $ak['cat_id'];
										$sql="select * from mainproduct where id=$productid";
										$fetch=ExecuteQueryResule($sql);
									foreach ($fetch as $row) {
								   ?>
										<div class="col-sm-3 scat">
									
											<div class="card">
											&nbsp;
												<div class="card-image cat-img" style="background-image: url('user/uploads/usersimage/<?php echo $ak['image'];?>');  " alt="HPL sheets l HPL sheets l high pressure laminates sheets  Suppliers traders Delhi l India" >
													<a href="blclient/<?php echo $ak['url'];?>"></a> 
												</div>
												
													<p style=" text-align:center; "><a href="blclient/<?php echo $ak['url'];?>" ><?php echo $row['product'];?></a></p>
													
												
											</div>
										</div>
									<?php } }?>
                              	
	            </div>
	        </div>
	    
    <?php 
include_once'footer.php';
    ?>








