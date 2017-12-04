

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
    
				<div class="container">
					<div class="row">
					<?php  
						$id=$_REQUEST['id'] ;
						$query = " SELECT * FROM category  WHERE url='".$id."' ";
						$result = ExecuteQueryResule($query);
						foreach ($result as $ak) {
						$url=$ak['id'];
						$id=$ak['url'];
						$id=$url;
						$cat=$id;
						?>
						<p><?php echo $ak['cat_name'];?> Categories Products</p>
						<?php } ?>
					</div>
					<div class="row">
						
									<?php 
									 
									$query = " SELECT * FROM users   where cat_id='".$cat."' ";									
									$result = ExecuteQueryResule($query);
									foreach ($result as $use) {
									$productid = $use['prod_id'];
									$categoryid = $use['cat_id'];
									$sql="select * from mainproduct where id=$productid";
									$fetch=ExecuteQueryResule($sql);
									foreach ($fetch as $row) {
								   ?>
										<div class="col-sm-3 scat">
									
											<div class="card">
											&nbsp;
												<div class="card-image cat-img" style="background-image: url('<?php echo $fullur;?>/user/uploads/usersimage/<?php echo $use['image'];?>');  " alt="Business Directory India: Top Online Business Listing Site 2017" >
													<a href="<?php echo $fullur;?>/blclient/<?php echo $use['url'];?>"></a> 
												</div>
												
													<p style=" text-align:center; "><a href="<?php echo $fullur;?>/blclient/<?php echo $use['url'];?>" ><?php echo $row['product'];?></a></p>
													
												
											</div>
										</div>
									<?php } }?>
                              	
	            </div>
	        </div>
	    
    <?php 
include_once'footer.php';
    ?>








