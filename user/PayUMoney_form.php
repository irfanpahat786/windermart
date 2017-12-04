<?php
include_once('header.php');
include_once('check.php');
$amount= $_SESSION['price']; 
// Merchant key here as provided by Payu

$sql="select * from users where id='".$_SESSION['userid']."'";
$sqlr=ExecuteQueryResule($sql);
foreach($sqlr as $row)
{
	$name=$row['name'];
	$email=$row['email'];
	$mobile=$row['mobile'];
	//$name=$row['name'];
}
// Merchant Salt as provided by Payu
$MERCHANT_KEY = "iEPqBhXX";
$SALT = "O1brmJlYIl";

// End point - change to https://secure.payu.in for LIVE mode
$PAYU_BASE_URL = "https://secure.payu.in";

$action = '';

$posted = array();
if(!empty($_POST)) {
    //print_r($_POST);
	
  foreach($_POST as $key => $value) {    
    $posted[$key] = $value; 
	
	
  }
}

$formError = 0;

if(empty($posted['txnid'])) {
  // Generate random transaction id
  $txnid = substr(hash('sha256', mt_rand() . microtime()), 0, 20);
} else {
  $txnid = $posted['txnid'];
}
$hash = '';
// Hash Sequence
$hashSequence = "key|txnid|amount|productinfo|firstname|email|udf1|udf2|udf3|udf4|udf5|udf6|udf7|udf8|udf9|udf10";
if(empty($posted['hash']) && sizeof($posted) > 0) {
  if(
          empty($posted['key'])
          || empty($posted['txnid'])
          || empty($posted['amount'])
          || empty($posted['firstname'])
          || empty($posted['email'])
          || empty($posted['phone'])
          || empty($posted['productinfo'])
          || empty($posted['surl'])
          || empty($posted['furl'])
		  || empty($posted['service_provider'])
  ) {
    $formError = 1;
  } else {
    //$posted['productinfo'] = json_encode(json_decode('[{"name":"tutionfee","description":"","value":"500","isRequired":"false"},{"name":"developmentfee","description":"monthly tution fee","value":"1500","isRequired":"false"}]'));
	$hashVarsSeq = explode('|', $hashSequence);
    $hash_string = '';	
	foreach($hashVarsSeq as $hash_var) {
      $hash_string .= isset($posted[$hash_var]) ? $posted[$hash_var] : '';
      $hash_string .= '|';
    }

    $hash_string .= $SALT;


    $hash = strtolower(hash('sha512', $hash_string));
	
    $action = $PAYU_BASE_URL . '/_payment';
	
  }
  
} elseif(!empty($posted['hash'])) {

	
  $hash = $posted['hash'];
  
  $action = $PAYU_BASE_URL . '/_payment';
}
//$amount=10;
?>
<html>
  <head>
  <script>
    var hash = '<?php echo $hash ?>';
    function submitPayuForm() {
      if(hash == '') {
        return;
      }
      var payuForm = document.forms.payuForm;
      payuForm.submit();
    }
  </script>
  </head>
  
	
  <body onLoad="submitPayuForm()">
  
  <div class="container" style="background-color:white;height: 550px;">
	<div class="row">
    <h2></h2>
    <br/>
    <?php if($formError) { ?>
	
      <span style="color:red">Please fill all mandatory fields.</span>
      <br/>
      <br/>
    <?php } ?>
	
    <form action="<?php echo $action; ?>" method="post" name="payuForm">
      <input type="hidden" name="key" value="<?php echo $MERCHANT_KEY ?>" />
      <input type="hidden" name="hash" value="<?php echo $hash ?>"/>
      <input type="hidden" name="txnid" value="<?php echo $txnid ?>" />
      <table align="center" cellpadding="10" cellspacing="10">
        <tr>
         
		  <td colspan="2"><h4></h4></td>
        </tr>
        <tr>
          <td></td>
          <td><input type="hidden" name="amount" id="amount" value="<?php echo trim($amount);?>" /></td>
         </tr>
		 <tr>
          <td></td><td> <input type="hidden" name="firstname" id="firstname" value="<?php echo $name; ?>" /></td>
        </tr>
        <tr>
         
          <td></td><td> <input type="hidden" name="email" id="email" value="<?php echo $email; ?>" /></td>
         </tr>
		 <tr>
          <td></td><td> <input type="hidden" name="phone" value="<?php echo $mobile; ?>" /></td>
        </tr>
        <tr>
          
          <td></td><td> <input type="hidden"  name="productinfo" value="<?php echo $amount;?>" /></td>
        </tr>
        <tr>
         
          <td colspan="3"><input type="hidden" name="surl" value="http://windermart.com/user/success.php" size="64" /></td>
        </tr>
        <tr>
         
          <td colspan="3"><input type="hidden" name="furl" value="http://windermart.com/user/failure.php" size="64" /></td>
        </tr>

        <tr>
          <td colspan="3"><input type="hidden" name="service_provider" value="payu_paisa" size="64" /></td>
        </tr>

        
        <tr>
          
          <td><input type="hidden" name="lastname" id="lastname" value="<?php echo (empty($posted['lastname'])) ? '' : $posted['lastname']; ?>" /></td>
         
          <td><input type="hidden" name="curl" value="http://windermart.com/user/failure.php" /></td>
        </tr>
        <tr>
         
          <td><input type="hidden" name="address1" value="<?php echo (empty($posted['address1'])) ? '' : $posted['address1']; ?>" /></td>
        
          <td><input type="hidden" name="address2" value="<?php echo (empty($posted['address2'])) ? '' : $posted['address2']; ?>" /></td>
        </tr>
        <tr>
          
          <td><input type="hidden" name="city" value="<?php echo (empty($posted['city'])) ? '' : $posted['city']; ?>" /></td>
          
          <td><input type="hidden" name="state" value="<?php echo (empty($posted['state'])) ? '' : $posted['state']; ?>" /></td>
        </tr>
        <tr>
        
          <td><input type="hidden" name="country" value="<?php echo (empty($posted['country'])) ? '' : $posted['country']; ?>" /></td>
          
          <td><input type="hidden" name="zipcode" value="<?php echo (empty($posted['zipcode'])) ? '' : $posted['zipcode']; ?>" /></td>
        </tr>
        <tr>
         
          <td><input type="hidden" name="udf1" value="<?php echo (empty($posted['udf1'])) ? '' : $posted['udf1']; ?>" /></td>
         
          <td><input type="hidden" name="udf2" value="<?php echo (empty($posted['udf2'])) ? '' : $posted['udf2']; ?>" /></td>
        </tr>
        <tr>
          
          <td><input type="hidden" name="udf3" value="<?php echo (empty($posted['udf3'])) ? '' : $posted['udf3']; ?>" /></td>
       
          <td><input type="hidden" name="udf4" value="<?php echo (empty($posted['udf4'])) ? '' : $posted['udf4']; ?>" /></td>
        </tr>
        <tr>
         
          <td><input type="hidden" name="udf5" value="<?php echo (empty($posted['udf5'])) ? '' : $posted['udf5']; ?>" /></td>
         
          <td><input type="hidden" name="pg" value="<?php echo (empty($posted['pg'])) ? '' : $posted['pg']; ?>" /></td>
        </tr>
        <tr>
		<td></td>
          <?php if(!$hash) { ?>
		  
            <td colspan="4"><button type="submit" name="submit" style="background-color:green; color:white; height: 50px; width: 400px;margin-top:180px;"  />Go to PayUMoney Payment</button></td>
          <?php } ?>
        </tr>
      </table>
    </form>
	</div>
	</div>
	<?php include_once('footer.php');?>
	</body>
	
  
</html>
