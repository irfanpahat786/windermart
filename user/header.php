<?php
 include_once'db.php';
 ?>
 <!DOCTYPE html>
<html>

<style>
#myBtn {
  display: none;
  position: fixed;
  bottom: 20px;
  right: 30px;
  z-index: 99;
  border: none;
  outline: none;
  background-color: red;
  color: white;
  cursor: pointer;
  padding: 15px;
  border-radius: 10px;
}

/*#myBtn:hover {
  background-color: #555;
}*/
</style>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, minimum-scale=1, maximum-scale=1">

    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&amp;subset=latin,latin-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">    
    <link href="../assets/fonts/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="../assets/libraries/owl-carousel/owl.carousel.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/leaflet.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/slick.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/leaflet.markercluster.css" rel="stylesheet" type="text/css">
    <link href="../assets/css/leaflet.markercluster.default.css" rel="stylesheet" type="text/css">        
    <link href="../assets/css/materialist.css" rel="stylesheet" type="text/css" id="css-primary">       
    <link href="../assets/css/main.css" rel="stylesheet" type="text/css" id="css-primary">
	
    <title>windermart</title>
</head>

<body>

<header>
		<div class="container">
		  <div class="row">
			<div class="col-lg-12 col-md-12"><?php 
                             $l="select * from logo";
                             $lr=ExecuteQueryResule($l);
                           
                            
                             ?>
			<div><a href="../index.php" class="nav-link"><img src="../uploads/logo/<?php echo $lr[0]['image']; ?>" style="height:36px;"></a><a href="#" class="nav-link" style="margin-left:20%;">Welcome To Windermart User  Dashboard</a> </div>
			</div>


		  </div>
		 </div>
	</header>

	

