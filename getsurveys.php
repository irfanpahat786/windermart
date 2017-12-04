<?php
	// Account details
	$apiKey = urlencode('762c100255c6ced10d43955500c45038289fb79c87121a018be6992d93bf6212');
 
	// Prepare data for POST request
	$data = $apiKey;
 
	// Send the GET request with cURL
	$ch = curl_init('https://api.textlocal.in/get_surveys/?' . $data);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
	$response = curl_exec($ch);
	curl_close($ch);
	
	// Process your response here
	echo $response;
?>