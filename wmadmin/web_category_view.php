
<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
if(isset($_GET['del']))
{
	//$id=$_REQUEST['sub_id'];
	$q1="delete from category where id='".$_GET['del']."'";
	$categoryQueryResult = $connectionObject->executeQuery($q1);
	if(!$categoryQueryResult)
	{ 
		$errorMsg = mysql_errno()." : failed to display service category";
		echo $errorMsg;
		
		exit();
	} 
    header("Location: web_category_view.php?q=del");
}
?>
<html>
<title>Control Panel : Winder Mart</title>
<link href="img/style.css" rel="stylesheet" type="text/css">
<body>
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

		<header style="background:rgba(80, 79, 79, 0.42);">
			<div class="container">
			  <div class="row">
				<div class="col-lg-12 col-md-12">
					<div style="text-align:center";>	  Welcome To Windamart Dashboard </div>
				</div>


				</div>
			</div>
		</header>

	
	<table width="95%" border="0" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
	  
		<tr>
			<td>
				 
					 <form name="form" method="post" action="create_category.php" enctype="multipart/form-data" class="form-horizontal">
						  <div class="col-lg-5 col-md-5">
							<h3>Please provide your Category details</h3>

						  <div class="form-group">
							<label for="inputName" class="col-sm-3 control-label"> Category Name :</label>
							<div class="col-sm-9">
							  <input  class="form-control" type="text" name="cat_name" placeholder="Type Your Category Name Here" style="height:40px; border-radius: 10px;" >
							</div>
						  </div>


						  <div class="form-group">
							<label for="Company Name" class="col-sm-3 control-label">Description :</label>
							<div class="col-sm-9">

							  <textarea name="description" cols="44" rows="15" placeholder="Type Your Category Description Here" style=" border-radius: 10px;"></textarea>
							</div>
						  </div>

						  <div class="form-group">
							<label for="Email" class="col-sm-3 control-label"></label>
							<div class="col-sm-9">
							  <input  type="submit" name="create"  value="Create" >

							 </div>
						  </div>




						  </div>
					 </form>
					 <script>
						CKEDITOR.replace( 'editor1' );
					</script>
					<form class="form-horizontal">
					 <div class="col-lg-7 col-md-7">
						<h3></h3>
						 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
							  <tr>
								
								<th width="100%" align="left" valign="middle"  class="style2" style="font-size: 16px;" scope="col">Category Details<strong>
								  <p style="color:green; "><?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
								  <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
								  <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
								  <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
									  <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?></p>
								</strong></th>
							  </tr>
							 <tr><td>&nbsp;</td></tr>
							 <tr>
								 <td>
									 <table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
										 <tr>
											 <td>Category Id</td>
											 <td>Category Name</td>
											 <td>Action</td>
										 </tr>
										 <?php 
											$categoryQuery = "select * from category ";				
											$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);
											if(!$categoryQueryResult)
											{ 
												$errorMsg = mysql_errno()." : failed to display service category";
												echo $errorMsg;
												
												exit();
											}    			
											while($categoryRow = mysql_fetch_assoc($categoryQueryResult)){
												
										 ?>
										 <tr>
											 <td><?php echo $categoryRow['id'] ;?></td>
											 <td><?php echo $categoryRow['cat_name'];?></td>
											 <td><a href="web_category_edit.php?id=<?php echo $categoryRow['id']?>">Edit</a>&nbsp;&nbsp;||&nbsp;&nbsp;<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="#" onClick=" del('<?php	echo stripslashes($categoryRow['id']);?>');" >Delete</a></td>
										 </tr>
										  <?php
										  }
										  ?>
									 </table>
								</td>
					  		</tr>
						 </table>
					  </div>


				 </form>
			</td>
		</tr>
	</table>

	<script>
      function del(id)
          { 
		if(confirm('Sure To Remove This Record ?'))
	        {
		         window.location.href='web_category_view.php?del='+id;
	        } 
          } 

      </script>
		

		

	   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
		<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
		<!-- Include all compiled plugins (below), or include individual files as needed -->
		<script src="js/bootstrap.min.js"></script>
	  </body>
	</html>


 </body>
</html>
