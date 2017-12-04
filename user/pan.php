<?php 
include_once('db.php');
include_once('check.php');
if(isset($_POST['add']))
{
	//print_r($_POST);
	//die();
    //$cat_id= (int)$_POST['cat_id']; 
	
		$name = $_FILES['docs']['name'];
		$tmp_name =  $_FILES['docs']['tmp_name'];
		$location = "../uploads/usersimage/";
		$new_name = time()."-".rand(1000, 9999)."-".$name;

		if (move_uploaded_file($tmp_name, 'uploads/usersimage/'.$new_name)){
					//echo "uploaded";
		}
		else{
			sleep(rand(1,5));
			$new_name = time()."-".rand(1000, 9999)."-".$name;
			if (move_uploaded_file($tmp_name, 'uploads/usersimage/'.$new_name)){
					//echo "uploaded";
			}
			else{
					echo"failed, better luck next time";
			}
		}
	$name=htmlentities(addslashes(trim($_POST['name'])));
	$last_name=htmlentities(addslashes(trim($_POST['last_name'])));
	$father_name=htmlentities(addslashes(trim($_POST['father_name'])));
	$adhar_no=htmlentities(addslashes(trim($_POST['pan_no'])));
	$email=htmlentities(addslashes(trim($_POST['email'])));
	
	
	

	

	$month=htmlentities(addslashes(trim($_POST['month'])));

	$day=htmlentities(addslashes(trim($_POST['day'])));

	$year=htmlentities(addslashes(trim($_POST['year'])));

	//$date_value="$month/$dt/$year";

	//echo "mm/dd/yyyy format :$date_value<br>";

	$date_value="$day-$month-$year";

	echo "YYYY-mm-dd format :$date_value<br>";
	

	
	$q1="insert into document SET u_id='".$_SESSION['id']."', name='$name',last_name='$last_name',father_name='$father_name',pan_no='$pan_no', email='$email',docs='$new_name',dob='$date_value'";
	$in=ExecuteQuery($q1);
	//print_r($in);
	header('location:document.php');
}
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
