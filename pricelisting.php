<?php 
include_once'header.php';
?>
<div class="panel panel-default">
  <div class="panel-heading" style="text-align:center; font-size:50px; background-color:#999999;"><span style="color:#0000FF;">Offer & Packages</span> <span style="color:#FF9800;">Which We Provide</span></div>
  <div class="panel-body">
  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#0000FF; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		<div class="col-md-2"  >Sr. No.</div>
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Package</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price(3 Month)</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Price(1 Year)</div>
		<div class="col-md-3" style="border-left:1px solid #00bcd4;">Price(3 Year)</div>
		
      </div>
	  <?php 
								$m="select * from package       ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								

										?>
	  <div class="row" style="background-color:#9e9e9e; height:30px; text-align:center;   color:white; border-left:1px solid #00bcd4;line-height: 30px;">
       
		<div class="col-md-2"><?php echo $sr;?></div>
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['name'];?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs.<?php echo $ak['price1'];?></div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Rs.<?php echo $ak['price2'];?></div>
		<div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs.<?php echo $ak['price3'];?></div>
		
      </div>
	  <?php } ?>
	  
	  </div>
	  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#e91e63; height:60px; text-align:center; font-size:25px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		<div class="col-md-1"  >Sr. No.</div>
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offer</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Price(1 day)</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price(10 day)</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Price(20 day)</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Price(30 day)</div>
		
      </div>
	  <div class="row" style="background-color:#9e9e9e; height:30px; text-align:center;   color:white; border-left:1px solid #00bcd4;line-height: 30px;">
       
		<div class="col-md-1">1</div>
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offers name</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Rs.10,950</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs.10,950</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Rs.36,300</div>
		<div class="col-md-2" style="border-left:1px solid #00bcd4;">Rs.91,740</div>
		
      </div>
	  
	  </div>
	   <?php 
								$m="select * from  package where id=1       ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								$package=$ak['id'];
}
										?>
	  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#e91e63; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><?php echo $ak['name'] ;?></div>
	  <div class="row">&nbsp;</div>
	  <div class="row" style="background-color:#0000FF; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offers</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price</div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4;">Offers Details</div>
		
		
      </div>
	  <?php 
								$m="select * from package_price inner join package on package.id=package_price.package_id where package_id=1      ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								

										?>
	  <div class="row" style="background-color:#9e9e9e;  text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['duration'] ;?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs. <?php echo $ak['price'] ;?></div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4; text-align:left;"><p><?php echo $ak['detail1'] ;?></p></div>
		
		
      </div>
	   <div class="row" style="background-color:#666ccc; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><a href="#">Make Payment</a></div>
	  <?php } ?>
	 
	  
	  
	  
	  
	  </div>
	  <?php 
								$m="select * from  package where id=2       ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								$package=$ak['id'];
}
										?>
	  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#e91e63; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><?php echo $ak['name'] ;?></div>
	  <div class="row">&nbsp;</div>
	  <div class="row" style="background-color:#0000FF; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offers</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price</div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4;">Offers Details</div>
		
		
      </div>
	  <?php 
								$m="select * from package_price inner join package on package.id=package_price.package_id where package_id=2      ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								

										?>
	  <div class="row" style="background-color:#9e9e9e;  text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['duration'] ;?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs. <?php echo $ak['price'] ;?></div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4; text-align:left;"><p><?php echo $ak['detail1'] ;?></p></div>
		
		
      </div>
	   <div class="row" style="background-color:#666ccc; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><a href="#">Make Payment</a></div>
	  <?php } ?>
	 
	  
	  
	  
	  
	  </div>
	  <?php 
								$m="select * from  package where id=3       ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								$package=$ak['id'];
}
										?>
	  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#e91e63; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><?php echo $ak['name'] ;?></div>
	  <div class="row">&nbsp;</div>
	  <div class="row" style="background-color:#0000FF; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offers</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price</div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4;">Offers Details</div>
		
		
      </div>
	  <?php 
								$m="select * from package_price inner join package on package.id=package_price.package_id where package_id=3      ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								

										?>
	  <div class="row" style="background-color:#9e9e9e;  text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['duration'] ;?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs. <?php echo $ak['price'] ;?></div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4; text-align:left;"><p><?php echo $ak['detail1'] ;?></p></div>
		
		
      </div>
	   <div class="row" style="background-color:#666ccc; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><a href="#">Make Payment</a></div>
	  <?php } ?>
	 
	  
	  
	  
	  
	  </div>
	  <?php 
								$m="select * from  package where id=4       ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								$package=$ak['id'];
}
										?>
	  <div class="container" style="border:1px solid #00bcd4;     border: 1px solid #00bcd4;  margin-top: 30px; margin-bottom: 30px;;">
    <div class="row" style="background-color:#e91e63; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><?php echo $ak['name'] ;?></div>
	  <div class="row">&nbsp;</div>
	  <div class="row" style="background-color:#0000FF; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;">Offers</div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Price</div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4;">Offers Details</div>
		
		
      </div>
	  <?php 
								$m="select * from package_price inner join package on package.id=package_price.package_id where package_id=4      ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								
								

										?>
	  <div class="row" style="background-color:#9e9e9e;  text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['duration'] ;?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs. <?php echo $ak['price'] ;?></div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4; text-align:left;"><p><?php echo $ak['detail1'] ;?></p></div>
		
		
      </div>
	   <div class="row" style="background-color:#666ccc; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><a href="#">Make Payment</a></div>
	  <?php } ?>
	 
	  
	  
	  
	  
	  </div>
	  
	  
	  
	  
  </div>
</div>
<?php include_once('footer.php');?>