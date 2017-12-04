
<?php
//ob_start();
//session_start();
//include_once("login_check_hd.php"); 
include_once("../PhpIncludes/connection_info.php");
include_once("../PhpIncludes/database_connection.php");
$connectionObject = new databaseConnection($mysqlServer,$mysqlUser,$mysqlPassword,$databaseSelect);
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
    
<header>
<div class="container">
  <div class="row">
    <div class="col-lg-12 col-md-12">
	<div style="text-align:center";>	  Welcome To Windamart Dashboard </div>
	</div>
      
   
    </div></div>
</header>
   	
 <body>
<br>
<table width="95%" border="1" align="center" cellpadding="0" cellspacing="0" bordercolor="#03617C" bgcolor="#FFFFFF">
  <tr>
    <td valign="top"><table width="100%" border="0" align="center" cellpadding="0" cellspacing="0">
      <tr>
        <th width="56%" height="25" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col">&nbsp;&nbsp;Website Management</th>
        <th width="44%" align="left" valign="middle" bgcolor="#03617C" class="style2" scope="col"><strong>
          <?php if ($_REQUEST['q']=='ext') echo 'Record Exists!!!'; ?>
          <?php if ($_REQUEST['q']=='add') echo 'Record Added!!!'; ?>
          <?php if ($_REQUEST['q']=='edt') echo 'Record Updated!!!'; ?>
          <?php if ($_REQUEST['q']=='del') echo 'Record Deleted!!!'; ?>
          <?php if ($_REQUEST['q']=='err') echo 'Problem in Record!!!'; ?>
        </strong></th>
      </tr>
	 
       
          <?php 
			    $categoryQuery = "select * from category ";				
				$categoryQueryResult = $connectionObject->executeQuery($categoryQuery);
				if(!$categoryQueryResult)
				{ // if query failed to execute then print error msg
					$errorMsg = mysql_errno()." : failed to display service category";
					echo $errorMsg;
					//header("location: {$_SERVER['PHP_SELF']}?error=$errorMsg");
					exit();
                }    			
				$categoryRow = mysql_fetch_assoc($categoryQueryResult)
			 ?>
            <tr>
				<!--<td width="22%" align="center" valign="top" class="style77"><span class="style777">
			  <?php 
			   if ($categoryRow['imgName']!='')
			   {
			  ?>
			  <img src="../productImage/small/<?php echo $categoryRow['imgName']; ?>" border="1" class="style8" width="100" height="97"/>
			  <?php
			  }
			  ?>
			  </span></td>-->
		  </table>
	 <form class="form-horizontal">
      <div class="col-lg-5 col-md-5">
	  <h3>Please provide your details</h3>
	  <div>
  <div class="form-group">
    <label for="inputName" class="col-sm-3 control-label"> categoryid :</label>
    <div class="col-sm-9">
	  <input  class="form-control" <?php echo $categoryRow['categoryid']?>>
    </div>
  </div>
  
  
  <div class="form-group">
    <label for="Company Name" class="col-sm-3 control-label">heading :</label>
    <div class="col-sm-9">
	
	  <input  class="form-control" <?php echo $categoryRow['heading']?>>
    </div>
  </div>
  
  <div class="form-group">
    <label for="Email" class="col-sm-3 control-label">numbering	 :</label>
	<div class="col-sm-9">
	  <input  class="form-control" <?php echo $categoryRow['numbering']?>>

     </div>
    </div>
	<div class="col-sm-1">
	  <a href="web_category_edit.php?categoryid=<?php echo $categoryRow['categoryid']?>">Edit</a>|&nbsp;
            	</div>

	<div class="col-sm-1">

<a class="btn btn-danger btn-sm show-tooltip" title="Delete" href="web_category_delete.php?categoryid=<?php echo stripslashes($categoryRow['categoryid']);?>" onClick="return deleteAlert(this);">Delete</a></div></td>

	</div>
	 
          </div>
		  </form>
		 
		 
                <script language="javascript">
		  	function deleteAlert(record)
			{
				if(confirm("Are you really want to delete this Category?"))
				return true;
				else
				return false;
			}
		  </script> 
	</div>
	</div>
		</div>

    	</form>

   <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>


 </body>
</html>
