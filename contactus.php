<?php 
include_once'header.php';
?>
<?php
if(isset($_POST['query'])) {
 
    $email_to = "info@windermart.com";
	
 
    function died($error) {
        // your error code can go here
        $error_message= "We are very sorry, but there were error(s) found with the form you submitted. ";
        $error_message= "These errors appear below.<br /><br />";
        $error_message= $error."<br /><br />";
        $error_message= "Please go back and fix these errors.<br /><br />";
        
    }
    if(!isset($_POST['query']) ) {
        died('We are sorry, but there appears to be a problem with the form you submitted.');       
    }
 
    $name = $_POST['name'];
	$phone = $_POST['phone'];
	$email_from = $_POST['email'];
	$textsms = $_POST['textsms']; // required
    
    $error_message = "";
    $email_exp = '/^[A-Za-z0-9._%-]+@[A-Za-z0-9.-]+\.[A-Za-z]{2,4}$/';
 
  if(!preg_match($email_exp,$email_from)) {
    $error_message .= 'The Email Address you entered does not appear to be valid.<br />';
  }
 
    $string_exp = "/^[A-Za-z .'-]+$/";
 
  
 
  if(strlen($error_message) > 0) {
    died($error_message);
  }
 
    $email_message = "Form details below of Contact Us Form.\n\n";
 
     
    function clean_string($string) {
      $bad = array("content-type","bcc:","to:","cc:","href");
      return str_replace($bad,"",$string);
    }
 
    $email_message .= '"Name: ".$name."\n";"Phone: ".$phone."\n";"Email: ".clean_string($email_from)."\n";"Textsms: ".$textsms."\n"';
    
$headers = 'From: Windermart <do_not_reply@windermart.com>'."\r\n".
'Reply-To: '.'<do_not_reply@windermart.com>'."\r\n" .
'X-Mailer: PHP/' . phpversion();
@mail($email_to, $email_subject, $email_message, $headers);

 $success='';
$success="Thank you for contacting us. We will be in touch with you very soon."; 
}
?>
<div class="container">
<div class="row">
<p style="text-align:center; font-size:50px; color:#0033CC; margin-top:30px;">Welcome To My Contact Us Panel</p>
</div>
<div class="row" style="border:1px solid #666666; background-color: cadetblue;
    margin: 20px 20px 20px 20px;">
<div class="col-xs-8 col-md-8" style="border:1px solid #666666;">
<div class="col-xs-8 col-md-8" style="margin-top:20px; font-size:20px; color:#000000;text-align: center;">GET IN TOUCH</div>
<div class="col-xs-8 col-md-8" style="margin-top:20px 20px 20px 20px;">
<form class="control-form" method="post">
<div class="input-control" style="
    margin-bottom: 20px;">
<label class="label label-default">Name</label>
<input type="text" name="name" value=""  style="    height: 40px;
    margin-left: 50px;
    width: 50%;
    border-radius: 5px;" />
</div>
<div class="input-control" style="
    margin-bottom: 20px;">
<label class="label label-default">Phone*</label>
<input type="number" name="phone" required value="" style="    height: 40px;
    margin-left: 44px;
    width: 50%;
    border-radius: 5px;" />
</div>
<div class="input-control" style="
    margin-bottom: 20px;">
<label class="label label-default">Email*</label>
<input type="email" name="email" value="" required style="    height: 40px;
    margin-left: 47px;
    width: 50%;
    border-radius: 5px;"/>
</div>
<div class="input-control" style="
    margin-bottom: 20px;">
<label class="label label-default">Text Message</label>
<textarea name="textsms" cols="50" rows="5" style=" 
    margin-left: 84px;   
    border-radius: 5px;"></textarea>

</div>
<div class="input-control" style="
    margin-bottom: 20px;">
<label class="label label-default"></label>
<input type="submit" name="query" style="    height: 40px;
    margin-left: 85px;
    width: 50%;
    border-radius: 5px;" >

</div>
</form>
</div>
</div>
<div class="col-xs-4 col-sm-4">
<div class="col-xs-12 col-md-12" style="text-align: center;margin-top:20px; font-size:20px; color:#000000;">


<h3>Windermart India</h3>
<p>C-12/549 Yamuna Vihar</p>
<p>Delhi-110053 </p>
<p>Near BSES Complaint Office</p>
<!--<p>New Delhi Pincode-110094</p>-->
</div>

</div>
<div class="col-xs-4 col-sm-4">
<div class="col-xs-4 col-md-4" style="text-align:right;color: #000000;">Email:</div>
<div class="col-xs-8 col-md-8" style="color: #000000;">info@windermart.com</div>
</div>
</div>
</div>


<?php include_once('footer.php');?>















