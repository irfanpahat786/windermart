<?php 
include_once('db.php');
include_once('check.php');

?>
<!DOCTYPE html>
<html lang="en">


<head>
    <!-- Meta information -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0"><!-- Mobile Specific Metas -->
    
    <!-- Title -->
    <title>Personal Details</title>
    
   
    <!-- CSS Stylesheet -->
    <link href="css/bootstrap.css" rel="stylesheet"><!-- bootstrap css -->
    <link href="css/style.css" rel="stylesheet" /><!-- font css --> 
   
   
</head>
    
<body>
    
	<header>
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 col-md-12">
			<div><?php echo $_SESSION['name'];?></div>
			</div>

		  </div>
		</div>
	</header>
   	

	<div class="container">
	  <div class="row">
		<div class="col-lg-3 col-md-3">
			<div class="sidewrap">
				<h2>CHOOSE YOUR PACKAGE</h2>
				<ul>
					
					<?php 
					$sql="select * from package ";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $qp)
					{
				?>
				<li><a href="pan1.php?id=<?php echo $qp['id'];?>"><?php echo $qp['name'];?></a></li>
			<?php  } ?>
                	
				</ul>
			</div>
		</div>
		<form name="form" method="post" enctype="multipart/form-data">
		<div class="col-lg-9 col-md-9" >
			<div class="row" style="border:1px solid #ebebeb; margin:30px 20px; padding-bottom:30px;">
				<div class="form-group" style=" margin:30px 20px; padding-bottom:30px;" >
					<div class="col-sm-3" >Choose Your Package</div>
					<div class="col-sm-3" >
					<?php 
					$sql="select * from package_price where id='".$_REQUEST['id']."' ";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $ar)
					{
				?>
						<select class="form-control" name="duration">
							  <option value="">Select Duration</option>
				<?php 
									$q="select * from package_price   ";
									$ar=ExecuteQueryResule($q);
									 foreach($ar as $ak)
									 { 
									 	$id=(int)$ak['id'];
										$cat_name=htmlentities(addslashes(trim($ak['duration'])));
								    ?>
									<option value="<?php echo $id;?>" <?php if($id==$id){ echo  'selected'; }?>><?php echo $cat_name ?></option>
								
								  <?php }?>
				
						 </select>
					<?php } ?>
					</div>
					<div class="col-sm-1" > 
						Price 
					</div>
					<div class="col-sm-3" > 
						<?php 
					$sql="select * from package where id='".$_REQUEST['id']."' ";
					$ar=ExecuteQueryResule($sql);
				    foreach($ar as $ar)
					{
				?>
						<select class="form-control" name="price">
							  <option value="">Select Price</option>
				<?php 
									$q="select * from package_price  ";
									$ar=ExecuteQueryResule($q);
									 foreach($ar as $ak)
									 { 
									 	$id=(int)$ak['id'];
										$cat_name=htmlentities(addslashes(trim($ak['price'])));
								    ?>
									<option value="<?php echo $id;?>" <?php if($id==$id){ echo  'selected'; }?>><?php echo $cat_name ?></option>
								
								  <?php }?>
				
						 </select>
					<?php } ?> 
					</div>
					<div class="col-sm-2" >
						<input type="submit" name="submit" value="MakePayment">
					</div>
				</div>
				
				
		</div>
		

		  </form>
		</div>
	</div>
	
	
	
    <script type="text/javascript">
$(document).ready(function(){
    $('#category').on('change',function(){
        var catId = $(this).val();
        if(catId){
            $.ajax({
                type:'POST',
                url:'ajaxData.php',
                data:'id='+catId,
                success:function(html){
                    $('#product').html(html);
                   
                }
            }); 
        }else{
            $('#product').html('<option value="">Select category first</option>');
            
        }
    });
    
   
});
</script>
   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>
