<?php

include_once('db.php');


?>
<?php
if(isset($_POST['enquiry'])) {
 
    $email_to = "info@windermart.com";
	
 
    function died($error) {
        // your error code can go here
        $error_message= "We are very sorry, but there were error(s) found with the form you submitted. ";
        $error_message= "These errors appear below.<br /><br />";
        $error_message= $error."<br /><br />";
        $error_message= "Please go back and fix these errors.<br /><br />";
        
    }
    if(!isset($_POST['enquiry']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $email_from = $_POST['mobile']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below of Products Enquiry.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= "Mobile No.: ".clean_string($email_from)."\n";
    
$headers = 'From: Windermart <do_not_reply@windermart.com>'."\r\n".
'Reply-To: '.'<do_not_reply@windermart.com>'."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);
?>
 
<!-- include your own success html here -->
 
 
<?php
 $success='';
$success="Thank you for contacting us. We will be in touch with you very soon."; 
}
?>

<?php 
if(isset($_POST['enquiry']))

{



	$username = "info@windermart.com";

	$hash = "762c100255c6ced10d43955500c45038289fb79c87121a018be6992d93bf6212";



	// Config variables. Consult http://api.textlocal.in/docs for more info.

	$test = "0";



	// Data for text message. This is the text message data.

	$sender = "TXTLCL"; // This is who the message appears to be from.

	$numbers = "919911866116"; // A single number or a comma-seperated list of numbers

	$message = $_POST['mobile'];

	$message =$message.' Enquiry For Product Please Call Back Soon';

	// 612 chars or less

	// A single number or a comma-seperated list of numbers

	$message = urlencode($message);

	$data = "username=".$username."&hash=".$hash."&message=".$message."&sender=".$sender."&numbers=".$numbers."&test=".$test;

	$ch = curl_init('http://api.textlocal.in/send/?');

	curl_setopt($ch, CURLOPT_POST, true);

	curl_setopt($ch, CURLOPT_POSTFIELDS, $data);

	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$result = curl_exec($ch); // This is the result from the API

	curl_close($ch);

	header('location:index.php');

}



?>


