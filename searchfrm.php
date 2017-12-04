	
	<div class="container contai">
		<div class="row rowmain">

		<form method="get" action="search.php" >
			
				<div class="col-md-2 scol">
				  <div class="form-group " >
					 <input type="text" name="key_word"   placeholder="Search Products"  class="form-control"/>
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
								<option value="" >Select Area</option>
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
						
	
						