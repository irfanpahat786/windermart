<?php 
include_once'header.php';
?>

	<div class="header-bottom catli">
					
						<ul class="nav nav-pills">
						 <?php 
                             $s="select * from category order by id desc limit 8,12";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>  
							
							<li class="nav-item1" >
							<a href="category.php?id=<?php echo $k['id'];?>" class=" nav-link">
							 <p><img src="icon/<?php echo $k['icon'];?>" alt="hpl sheets l hpl sheets l high pressure laminates sheets  Suppliers traders Delhi l India" class="catstyle1" /></p>
							 <p> <?php echo $k['cat_name'];?></p>
							 </a>
							</li>
							
							<?php
						}
						?>
							

							
						</ul>

						
					
					</div>

    <div class="main-wrapper" >
	    <div class="main" >
	        <div class="main-inner" >
	        	
                 <?php 
                             $s="select * from aboutus ";
                             $ser=ExecuteQueryResule($s);
                           foreach ($ser as $k) {
                           
                             ?>
	            <div class="content" >
	                <div class="container-title">
					<div class="row">
							<h1 style="text-align: center; 
    margin-top: 102px;"><?php echo $k['about'];?></h1>

							
		
						</div>
					</div>


					<div class="container push-top-bottom">
						<div class="pricing">
							<div class="row">
								
					
								
													
								<div class="pricing-col-wrapper col-lg-12" style="
    margin-left: 20px;">
									<?php echo $k['editor1'];?></div><!-- /.pricing-col-wrapper -->
							</div><!-- /.row -->
						</div><!-- /.pricing -->
					</div>
	            </div>
	            <?php } ?>
	        </div>
	    </div>
    </div>
<?php include_once('footer.php');?>