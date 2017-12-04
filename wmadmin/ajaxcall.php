<?php
include_once('db.php');
  
if(isset($_POST["id"]) )
{
    
    $query = "SELECT * FROM bannerproduct WHERE ad_id = ".$_POST['id']." ";
    
    $ar=ExecuteQueryResule($query);
    
    if(count($ar)>0)
	{
       echo '<option value="">Select Product</option>';
       foreach($ar as $ak)
       { 
                                        
            echo '<option value="'.$ak['id'].'">'.$ak['product_name'].'</option>';
        }
    }
	else
	{
        echo '<option value="">product not available</option>';
    }
}



?>