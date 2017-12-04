<?php 
include_once 'db.php';
if(isset($_POST['s1']))
{
$id= (int)$_GET['id']; 
$fn=$_FILES['file']['name'];
$tmn=$_FILES['file']['tmp_name'];
move_uploaded_file($tmn, "images/".$fn);
$head=htmlentities(trim($_POST['head']));
$content=$_POST['content'];
$menu=htmlentities(trim($_POST['menu']));
$q1="update footer set image='$fn', head='$head', content='$content', menu='$menu'  where id=$id";
ExecuteQuery($q1); 
}


?> 
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="Creative - Bootstrap 3 Responsive Admin Template">
    <meta name="author" content="GeeksLabs">
    <meta name="keyword" content="Creative, Dashboard, Admin, Template, Theme, Bootstrap, Responsive, Retina, Minimal">
    <link rel="shortcut icon" href="img/favicon.png">

    <title>Profile | </title>

    <!-- Bootstrap CSS -->    
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <!-- bootstrap theme -->
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <!--external css-->
    <!-- font icon -->
    <link href="css/elegant-icons-style.css" rel="stylesheet" />
    <link href="css/font-awesome.min.css" rel="stylesheet" />
    <!-- Custom styles -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/style-responsive.css" rel="stylesheet" />

    <!-- HTML5 shim and Respond.js IE8 support of HTML5 -->
    <!--[if lt IE 9]>
      <script src="js/html5shiv.js"></script>
      <script src="js/respond.min.js"></script>
      <script src="js/lte-ie7.js"></script>
    <![endif]-->
  </head>

  <body>
  <!-- container section start -->
  <section id="container" class="">
      <!--header start-->
       <?php  include_once('include/header.php');?>
      <!--header end-->

      <!--sidebar start-->
       <?php  include_once('include/sidebar.php');?>
      <!--sidebar end-->
      
      <!--main content start-->
      <section id="main-content">
          <section class="wrapper">
      <div class="row">
        <div class="col-lg-12">
          <h3 class="page-header"><i class="fa fa-user-md"></i> Profile</h3>
          <ol class="breadcrumb">
            <li><i class="fa fa-home"></i><a href="index.html">Home</a></li>
            <li><i class="icon_documents_alt"></i>Pages</li>
            <li><i class="fa fa-user-md"></i>Profile</li>
          </ol>
        </div>
      </div> 
      <?php
             $id=(int)$_GET['id'];     
       $q="select * from footer where id=$id";
       $ar=ExecuteQueryResule($q);
       foreach($ar as $k)
       { 
       ?> 
              <div class="row">
                 <div class="col-lg-12">
                    <section class="panel">
                          <div class="panel-body">
                              <div class="tab-content"> 
                                    <section class="panel">                                          
                                          <div class="panel-body bio-graph-info">
                                              <h1> Profile Info</h1> 
                        <form class="form-horizontal" role="form" method="post" enctype= "multipart/form-data">  
                           <div class="form-group">
                                                      <label class="col-lg-2 control-label"></label>
                                                      <div class="col-lg-7">
                           footer image <img src="images/<?php  echo $k['image'];?>" height="200px" height="200px">
                                                        <input type="file" name="file">  <br><br>
                                                       footer heading <input type="text" name="head" value="<?php echo $k['head']; ?>" size="80%">  <br><br>
                                                       footer content <textarea name="content" value="ckeditor" id="ckeditor"> <?php echo $k['content']; ?></textarea> <bR><br>
                                                        footer menu<input type="text" name="menu" value="<?php echo $k['menu']; ?>" size="80%">
                                                         
                                                      </div>
                                                  </div>
                          <div class="form-group">
                                                      <label class="col-lg-2 control-label"></label>
                                                      <div class="col-lg-6">
                             <button type="submit" class="btn btn-primary" name="s1">Update</button> 
                                                      </div>
                                                  </div>
                          </form>
                                              
                                  
                                  
                                          </div>
                                      </section> 
                              </div>
                          </div>
                      </section>
                 </div>
              </div>
                <?php
       }
       ?>
              <!-- page end-->
          </section>
      </section>
      <!--main content end-->
  </section>
  <!-- container section end -->
    <!-- javascripts -->
    <script src="js/jquery.js"></script>
    <script src="js/bootstrap.min.js"></script>
    <!-- nice scroll -->
    <script src="js/jquery.scrollTo.min.js"></script>
    <script src="js/jquery.nicescroll.js" type="text/javascript"></script>
    <!-- jquery knob -->
    <script src="assets/jquery-knob/js/jquery.knob.js"></script>
    <script src="ckeditor/ckeditor/ckeditor.js"></script>
    <!--custome script for all page-->
    <script src="js/scripts.js"></script>
    <script>
                // Replace the <textarea id="editor1"> with a CKEditor
                // instance, using default configuration.
                CKEDITOR.replace( 'ckeditor' );
            </script>

  <script>

      //knob
      $(".knob").knob();

  </script>


  </body>
</html>
