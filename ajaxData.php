<?php
include_once('db.php');
  
if(isset($_POST["state"]) )
{
    
    $query = "SELECT * FROM cities WHERE StateID = ".$_POST['state']." ";
    
    $ar=ExecuteQueryResule($query);
    
    if(count($ar)>0)
	{
       echo '<option value="">Select City</option>';
       foreach($ar as $ak)
       { 
                                        
            echo '<option value="'.$ak['city_id'].'">'.$ak['city_name'].'</option>';
        }
    }
	else
	{
        echo '<option value="">City not available</option>';
    }
}


?>