<?php 
include_once'header.php';
?>
<div class="panel panel-default">
  <div class="panel-heading" style="text-align:center; font-size:50px; background-color:#999999;"><span style="color:#0000FF;">Offer & Packages</span> <span style="color:#FF9800;">Which We Provide</span></div>
  <div class="panel-body">
  
	  
	   <?php 					
								$m="select * from  package where id='".$_REQUEST['id']."'       ";
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
								$m="select * from package_price  where id='".$_REQUEST['id']."'      ";
								$mr=ExecuteQueryResule($m);
								$sr=0;
								foreach ($mr as $ak) {
								$sr++;
								$_SESSION['price']=$ak['price'];
								$_SESSION['duration']=$ak['duration'];
								//$_SESSION['price']=$ak['price'];
								}

										?>
	  <div class="row" style="background-color:#9e9e9e;  text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;" >
	
        
		
        <div class="col-md-2" style="border-left:1px solid #00bcd4;"><?php echo $ak['duration'] ;?></div>
        <div class="col-md-3" style="border-left:1px solid #00bcd4;">Rs. <?php echo $ak['price'] ;?></div>
		<div class="col-md-7" style="border-left:1px solid #00bcd4; text-align:left;"><p><?php echo $ak['offers'] ;?></p></div>
		
		
      </div>
	   <div class="row" style="background-color:#666ccc; height:60px; text-align:center; font-size:30px; vertical-align:middle; color:white; border-left:1px solid #00bcd4;line-height: 60px;" ><a href="PayUMoney_form.php">Make Payment</a></div>
	  <?php  ?>
	 
	  
	  
	  
	  
	  </div>
	  
	 
	  
	  
	  
	  
	  </div>
	  
	  
	  
	  
  </div>

<?php include_once('footer.php');?>