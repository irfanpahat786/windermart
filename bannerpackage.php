<?php include_once'header.php'; ?>
<?php 	
//print_r($_REQUEST);

				
	$id=$_REQUEST['id'];
	  $s="select * from latestpost where url='".$id."'";
	 $sr=ExecuteQueryResule($s);
	foreach ($sr as $argk) {

	 ?> 
	<!--<img src="shareimg/<?php echo $argk['image']; ?>" style="height: 400px; width: 100%;" >-->
<?php } ?>
<div class="container contai">
	<div class="row rowmain">
	<?php 
	/*$url='';
	if(isset($_GET['url']))
	{
		$url=$_GET['url'];
	}	*/				
	//print_r($id);
	 //die();
	 $s="select * from latestpost where url='".$id."'";
	 
	 $sr=ExecuteQueryResule($s);
	foreach ($sr as $argk) {
		 $prod_id=$argk['prod_id'];
		 $ltpost_id=$argk['id'];

	 ?> 
		<div class="col-sm-12">
		
			<img src="shareimg/<?php echo $argk['image']; ?>" class="addsimg" >
		<div>
			 
			<div class="divshare">
			<article style="text-align:justify;"><?php echo $argk['offers']; ?></article>
                    </div>
                </div>
            </div>
            <?php } ?>
	</div>
	
</div>
<div class="container">
<div class="row">
<?php 					
	
	 $s="select * from bannerproduct where ad_id=$ltpost_id ";
	 $sr=ExecuteQueryResule($s);
	foreach ($sr as $argk) {


	 ?> 
		<div class="col-md-4 serch">
			<div class="card">
			<img src="shareimg/<?php echo $argk['image']; ?>" class="share" >
			<p style="margin-left: 40px;"><?php echo $argk['product_name'];?></p>
			</div>
		</div>
		
		
	
	<?php } ?>
	</div>
	<div class="row" align="center"><h3>Releted Products</h3></div>
	<div class="row">
		<?php 					
	
	 $s="select * from users where prod_id=$prod_id ";

	 $sr=ExecuteQueryResule($s);

	foreach ($sr as $argk) {


	 ?> 
	
		<div class="col-md-4 serch">
			<a href="blclient/<?php echo $argk['url'];?>"><div class="card">
			<img src="user/uploads/usersimage/<?php echo $argk['image']; ?>" class="share">
			<p style="margin-left: 40px;color: black;"><?php echo $argk['product_name']; ?></p>
			</div></a>
		</div>
		
		
	
	<?php } ?>
	</div>
</div>
<?php include_once'footer.php'; ?>






