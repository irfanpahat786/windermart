<?php
include_once('header.php');
?>
<div class="container" style="height: 480px;">
<div class="row" style="    margin-top: 100px;">
<?php
$status=$_POST["status"];
$firstname=$_POST["firstname"];
$amount=$_POST["amount"];
$txnid=$_POST["txnid"];

$posted_hash=$_POST["hash"];
$key=$_POST["key"];
$productinfo=$_POST["productinfo"];
$email=$_POST["email"];
$salt="O1brmJlYIl";

If (isset($_POST["additionalCharges"])) {
       $additionalCharges=$_POST["additionalCharges"];
        $retHashSeq = $additionalCharges.'|'.$salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;
        
                  }
	else {	  

        $retHashSeq = $salt.'|'.$status.'|||||||||||'.$email.'|'.$firstname.'|'.$productinfo.'|'.$amount.'|'.$txnid.'|'.$key;

         }
		 $hash = hash("sha512", $retHashSeq);
  
       if ($hash != $posted_hash) {
	       echo "Invalid Transaction. Please try again";
		   }
	   else {

         echo "<h4>Your order status is ". $status .".</h4>";
         echo "<h5>Your transaction id for this transaction is ".$txnid.". You may try making the payment by clicking the link below.</h5>";
          
		 } 
?>
<!--Please enter your website homepagge URL -->
<p><a href=http://windermart.com/user/PayUMoney_form.php> Try Again</a></p>
</div>
</div>
<?php include_once('footer.php');?>