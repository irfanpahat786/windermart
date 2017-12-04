<!-- /.hero-form -->	
					<div class="hero-form ">
							<div class="container" style="    margin-bottom: -7px;">
								<form method="get" action="search.php" >
									<div class="row">
										
										<div class="col-md-2" style="margin-bottom:2px;">
												  <div class="form-group" >
													 <input type="text" name="key_word" style="margin-left:-8px; border:1px solid white; height:38px; background-color: ghostwhite; border-bottom-color: gainsboro;width: 106%; "  placeholder="Type Products"/>
												  </div>
											  </div>
										<div class="col-md-2">
											
											<div class="form-group">
						    
											    <?php 
									$q="select * from category  ";
									$ar=ExecuteQueryResule($q);
									 
								    ?>
						  <select class="form-control" id="category" name="cat_id" style="margin-left:-8px;">
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
						    
											    <select class="form-control" id='country-list' name="country" style="margin-left:-13px;">
											     	<option value="">Select a country</option>
											   
											   
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
						  <select class="form-control" id="state" name="state" style="margin-left:-18px;">
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
						    
											    <select class="form-control" id='city' name="city" style="margin-left:-23px;">
											  			<option value="" >Select state first</option>
												</select>
											</div>
										</div>
										<div class="col-md-1">
											
											<div class="form-group">
						  						<input type="submit" name="search" class="btn btn-default" style="margin-left:-30px;" value="search"><i class="fa fa-search"></i>
						  					</div>
										</div>

									</div>
								</form> 

								
							</div><!-- /.container -->
						</div>
						