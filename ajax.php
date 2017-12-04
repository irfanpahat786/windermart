<?php
include_once('db.php');
?>
<?php 

$db  = GetConnection();

if (isset($_POST['area'])) {

	$city_id =  (int) $_POST['city_id'];
	$area =  $_POST['area'];
	

	if ($city_id=='') {
		# code...
		$query = "SELECT * FROM area WHERE name LIKE '%$area%' ";
	
	} else {
		
		$query = "SELECT * FROM area WHERE name LIKE '%$area%' AND city_id =  ".$city_id;
	}



	$areas = mysql_query($query,$db);
	
	

	if (mysql_num_rows($areas)) {
	 		
		while ($area = mysql_fetch_assoc($areas)) { ?>
		
		<li onclick="selectUser('<?php echo $area["name"]; ?>')">
			<?php echo ucwords($area["name"]); ?>
		</li>
		<?php 	
	 		
		}
	

	} 
	 		

	 	

}


if (isset($_POST['get_states']) && $_POST['get_states']=='states') {
	
	$country_id = addslashes(trim($_POST['country']));

	$output = '';
	if ($country_id=='') {

		$output .= '<option value="">Select States</option>';
		
	} else {

		$query = "SELECT * FROM states WHERE country_id = {$country_id}  ORDER BY name ASC";
		$result = mysql_query($query,$db);


		if ($result) {
			
			if (mysql_num_rows($result)) {

				while ($state = mysql_fetch_assoc($result)):

					$output .= '<option value="'.$state['id'].'">'.$state['name'].'</option>';
	
				endwhile;			
			} 

		}

	}

	echo $output;
	

}

if (isset($_POST['get_cities']) && $_POST['get_cities']=='cities') {
	
	$state_id = addslashes(trim($_POST['state']));

	$output = '';
	if ($state_id=='') {

		$output .= '<option value="">Select cities</option>';
		
	} else {

		$query = "SELECT * FROM cities WHERE state_id = {$state_id}  ORDER BY name ASC";
		$result = mysql_query($query,$db);


		if ($result) {
			
			if (mysql_num_rows($result)) {

				while ($city = mysql_fetch_assoc($result)):

					$output .= '<option value="'.$city['id'].'">'.$city['name'].'</option>';
	
				endwhile;			
			} 

		}

	}

	echo $output;
	

}

?>