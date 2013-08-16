<?php
require_once 'includes/config.php';
require_once 'includes/db_config.php';
$id = NULL;
require 'includes/check_church.php';

$container = $_SERVER['HTTP_USER_AGENT'];
$useragents = array(
    'iPhone',
    'Blazer',
    'Palm',
    'Handspring',
    'Nokia',
    'Kyocera',
    'Samsung',
    'Motorola',
    'Smartphone',
    'Windows CE',
    'Blackberry',
    'WAP',
    'SonyEricsson',
    'PlayStation Portable',
    'LG',
    'MMP',
    'OPWV',
    'Symbian',
    'EPOC',
);
$ismobile = 0;
foreach ($useragents as $useragents) {
    if (strstr($container, $useragents)) {
        $ismobile = 1;
    }
}

if (isset($_GET['type']) && $_GET['type'] == 'edit' && $_SESSION['islogin'] == TRUE) {
    
    $queryGetCurrentUserInfo = "SELECT * FROM donate_churches_users".DEVNAME." WHERE `userId` = '$_SESSION[UserID]'";
    $getCurrentUserInfor = executeQuery($queryGetCurrentUserInfo);
}
if (!isset($_SESSION['token']) || !isset($_SESSION['pkey']) || !isset($_SESSION['key'])) {
    $query_get_this_church = "SELECT `churchPkey` , `churchkey` ,`churchName` , `churchUri` , `churchToken` ,`churchIsConfigured`
                                                              FROM donate_churches".DEVNAME."  WHERE `churchId` = '$id' LIMIT 1 ";

    $result_get_this_church = executeQuery($query_get_this_church);
    if ($result_get_this_church) {
        $accessToken = $result_get_this_church[0]['churchToken'];
        $churchPkey = $result_get_this_church[0]['churchPkey'];
        $churchkey = $result_get_this_church[0]['churchkey'];

        $_SESSION['token'] = $accessToken;
        $_SESSION['pkey'] = $churchPkey;
        $_SESSION['key'] = $churchkey;
    }
}

$errorMsg = '';
$successMsg = '';
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    
    $cartn = str_replace( '-', '', $_POST['cardNumber'] );
    $cartn = str_replace( '*', '', $cartn );
   $_POST['cardNumber'] = str_replace( ' ', '', $cartn );
    
    if ($_POST['firstName'] == '') {
        $errorMsg .= 'Invalid First Name<br/>';
    }
    if ($_POST['lastName'] == '') {
        $errorMsg .= 'Invalid Last Name<br/>';
    }
    if ($_POST['emailAddress'] == '' || !php_validator($_POST['emailAddress'], 'email')) {
        $errorMsg .= 'Invalid Email Address<br/>';
    }

    if ($_POST['password'] == '') {
        $errorMsg .= 'Invalid Password<br/>';
    }
    
    //if ($_GET['type'] != 'edit') {
    //if ($_POST['password'] != $_POST['confirmPassword']) {
     //   $errorMsg .= 'Password Dont match<br/>';
    //}
    //if ($_POST['confirmPassword'] == '') {
        //$errorMsg .= 'Invalid Confirm Password<br/>';
    //}
    //}
    
    if ($_POST['cardNumber'] == '' || !php_validator($_POST['cardNumber'], 'credircard')) {
        $errorMsg .= 'Invalid Card Number<br/>';
    }
	
    if ($_POST['yearexpire'] == '') {
        $errorMsg .= 'Invalid Expire Year <br/>';
    }
    if ($_POST['monthexpire'] == '') {
        $errorMsg .= 'Invalid Expire Month <br/>';
    }

    if (time() >= strtotime($_POST['monthexpire'] . '-' . $_POST['yearexpire'])) {
        $errorMsg .= 'Expire date cannot be less then current Date <br/>';
    }
    if ($_POST['Security_Code'] == '') {
        $errorMsg .= 'Invalid Security Code<br/>';
    }
    if (strlen($_POST['Security_Code']) > 4) {
        $errorMsg .= 'Security Code Cannot be more then 4 Digits<br/>';
    }
    if ($_POST['Zip_Code'] == '' || !php_validator($_POST['cardNumber'], 'zip')) {
        $errorMsg .= 'Invalid Zip Code<br/>';
    }
   

    if ($errorMsg == '') {
       $querycheckidUserExists = "SELECT * FROM donate_churches_users".DEVNAME." WHERE `userId` = '$_SESSION[UserID]' AND `churchid` = '$id' ";
        $checkidUserExists = executeQuery($querycheckidUserExists);
        if (!$checkidUserExists || $_SESSION['islogin'] == TRUE) {
            include("stripe/PHP-StripeOAuth/oauth2-php/lib/OAuth2Client.php");
            require_once('stripe/PHP-StripeOAuth/StripeOAuth.class.php');
            require 'stripe/stripe-php-1.7.15/lib/Stripe.php';
            if (isset($_SESSION['islogin']) && $_SESSION['islogin'] == TRUE) {
                try {
					//echo  $_POST['cardNumber'].">>".$checkidUserExists[0]['userCardnumberLast4Digits'];exit;
                    Stripe::setApiKey(SECRET_KEY);
                    $newCustomer = Stripe_Customer::retrieve($checkidUserExists[0]['userStripeId'], $_SESSION['token']);
                    if ($_POST['cardNumber'] != $checkidUserExists[0]['userCardnumberLast4Digits']) {
                        if ($newCustomer["id"]) {
                            $newCustomer->description = "Customer for " . $checkidUserExists[0]['userEmail'];
                           $newCustomer->card = $_POST['stripeToken']; // obtained with Stripe.js
                            $newCustomer->save();
							
                        }
                    }

                    $Data_array = array(
                        'firstName' => $_POST['firstName'],
                        'lastName' => $_POST['lastName'],
                        'userEmail' => $_POST['emailAddress'],
                        'userPassword' => base64_encode($_POST['password']),
                        'userCardnumberLast4Digits' => substr($_POST['cardNumber'], -4, 4), //substr($_POST['cardNumber'], -4, 4),
                        'userSecurityCode' => $_POST['Security_Code'],
                        'userZipCode' => $_POST['Zip_Code'],
                        'userExpiration' => strtotime($_POST['monthexpire'] . '-' . $_POST['yearexpire']),
                    );

                    $where = "`userId` = '$_SESSION[UserID]'";
                    $Updated = updateData('donate_churches_users'.DEVNAME, $Data_array, $where);

                    $successMsg = 'Updated Successfully';
                    $_SESSION['firstName'] = $_POST['firstName'];
                    $_SESSION['lastName'] = $_POST['lastName'];
                    $_SESSION['userEmail'] = $_POST['emailAddress'];
//echo "helo g";exit;
                    header("location:" . BASE_Follow_URL . "/accounts?type=edit&updated=1");
                } catch (Exception $e) {
                    $errorMsg .= 'A problem occured  while Updating User <br/>' . $e->getMessage();
                }
            } else {

                if (isset($_POST['stripeToken'])) {
                   // ini_set('display_error',1);
                    //error_reporting(E_ALL);
                    try {

                        Stripe::setApiKey(SECRET_KEY);
                        $newCustomer = Stripe_Customer::create(array(
                                    "description" => "Donate's Customer signed up " . $_POST['emailAddress'],
                                    "card" => $_POST['stripeToken'],
                                    "email" => $_POST['emailAddress'],
                                   
                                        ), $_SESSION['token']);

                        $Data_array = array(
                            'firstName' => $_POST['firstName'],
                            'lastName' => $_POST['lastName'],
                            'userEmail' => $_POST['emailAddress'],
                            'userPassword' => base64_encode($_POST['password']),
                            'userCardnumberLast4Digits' => substr($_POST['cardNumber'], -4, 4), //substr($_POST['cardNumber'], -4, 4),
                            'userSecurityCode' => $_POST['Security_Code'],
                            'userZipCode' => $_POST['Zip_Code'],
                            'userExpiration' => strtotime($_POST['monthexpire'] . '-' . $_POST['yearexpire']),
                            'userCreatedAt' => time(),
                            'userStripeId' => $newCustomer['id'],
                            'churchid' => $id,
                        );

                        $insertedUserID = insertData('donate_churches_users'.DEVNAME, $Data_array);
                        //print_r($Data_array);
                        if ($insertedUserID) {
                            $_SESSION['UserID'] = $insertedUserID;
                            $_SESSION['firstName'] = $_POST['firstName'];
                            $_SESSION['lastName'] = $_POST['lastName'];
                            $_SESSION['islogin'] = TRUE;
                            $_SESSION['userEmail'] = $_POST['emailAddress'];
                            $_SESSION['churchid'] = $id;
                        }
                    } catch (Exception $e) {
                        $errorMsg .= 'A problem occured  while registering User <br/>' . $e->getMessage();
                    }
                }
//                header("location:enter_donation.php?id=$id&uri=$_SESSION[churchUri]");
                if($errorMsg==''){
                header("location:" . BASE_Follow_URL . "/donation");
                }
            }
        } else {
            $errorMsg .= 'Email allready Taken, please try different Email<br/>';
        }
    }
}
include 'web/includes/header.php';
?>

<script type="text/javascript" >
		function setYearOfexpireMobile(elem) {
			$('#yearexpire').val($(elem).val());
		}
		
		function setMonthOfexpireMobile(elem) {
			$('#monthexpire').val($(elem).val());
		}
            
    function setMonthOfexpire(obj){
        $('#monthexpire').val($(obj).html());   
        $('#monthOfexpire').html($(obj).html());   
    }
            
    function setYearOfexpire(obj){
        $('#yearexpire').val($(obj).html());
        $('#yearOfexpire').html($(obj).html());
    }
        
    function submitForm(){
        var $errorMsg = '';
        $(".loader_accounts").show();        
        if ($("#firstName").val() == '') {
            $errorMsg = $errorMsg + 'Invalid First Name<br/>';     
        }
        if ($("#lastName").val() == '') {
            $errorMsg = $errorMsg +  'Invalid Last Name<br/>';
        }
       // if ($("#emailAddress").val() == '' || !validateEmail($("#emailAddress").val())) {
          //  $errorMsg = $errorMsg +  'Invalid Email Address<br/>';
       //   }
        if ($("#password").val() == '') {
            $errorMsg = $errorMsg + 'Invalid Password<br/>';
        }
        <?php //if (isset($_GET['type']) && $_GET['type'] != 'edit') { ?>
        
        //if ($("#password").val() != $("#confirmPassword").val()) {
            //$errorMsg = $errorMsg +  'Password Dont match<br/>';
       // }
       // if ($("#confirmPassword").val() == '') {
            //$errorMsg = $errorMsg +  'Invalid Confirm Password<br/>';
       // }
        <?php //} ?>
        
<?php if (isset($_GET['type']) && $_GET['type'] != 'edit') { ?>
        var cartn = $('#cardNumber').val().replace(' ', '');
             cartn = cartn.replace('-', '');
             //cartn = cartn.replace('*', '');
              cartn=cartn.replace(/\*/g,'');
              //alert(cartn);
            if (cartn == '' || !checkCC(cartn)  ) {
                $errorMsg = $errorMsg + 'Invalid Card Number<br/>';
            }
		
<?php } ?>
		
		<?php if (!isset($_GET['type'])) { ?>
        var cartn = $('#cardNumber').val().replace(' ', '');
             cartn = cartn.replace('-', '');
             //cartn = cartn.replace('*', '');
              cartn=cartn.replace(/\*/g,'');
              //alert(cartn);
            if (cartn.length<16 || cartn.length>16  ) {
                $errorMsg = $errorMsg + 'Invalid Card Number<br/>';
            }
		
<?php } ?>	
		
        if ($("#yearexpire").val() == '') {
            $errorMsg= $errorMsg + 'Invalid Expire Year <br/>';
        }
        if ($("#monthexpire").val() == '') {
            $errorMsg = $errorMsg +  'Invalid Expire Month <br/>';
        }
        if ($("#Security_Code").val() == '') {
            $errorMsg = $errorMsg + 'Invalid Security Code<br/>';
        }
        if ($("#Zip_Code").val() == '' || !isInteger($("#Zip_Code").val())) {
            $errorMsg  = $errorMsg + 'Invalid Zip Code<br/>';
        }
                
        if($errorMsg == ''){
            $("#frmAccounts").submit();
        }else{
            $("#JSvalidation").show('slow');
            $(".successArea").hide('slow');
            $("#JSvalidation").html($errorMsg.toString());
            $('.enter_btn').html(' <a onclick="submitForm();" href="javascript:void(0);">Save Account Settings</a>');
            $(".loader_accounts").hide();
            return false;
        }
    }
            
            
    // ############################-++############## Stripe Funcations ##################################
    // this identifies your website in the createToken call below
    Stripe.setPublishableKey("<?php echo $_SESSION['pkey']; ?>");
        
    function stripeResponseHandler(status, response) {
        if (response.error && response.error.message.toString() !='This card number looks invalid') {
            //alert('helo g');
            $("#JSvalidation").hide('slow');
            $("#JSvalidation").html('Please change you account settings <br/>'+response.error.message.toString());
            $("#JSvalidation").show('slow');
            $('.enter_btn').html(' <a onclick="submitForm();" href="javascript:void(0);">Save Account Settings</a>');
            $(".loader_accounts").hide();   
        } else {
            var form$ = $("#frmAccounts");
            // token contains id, last4, and card type
            var token = response['id'];
                    //alert(response['id']);
            // insert the token into the form so it gets submitted to the server
			//alert(token);
			//return false;
            form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
            
            // and submit
            form$.get(0).submit();
                
        }
    }
        
    $(document).ready(function() {

        $("#frmAccounts").submit(function(event) {
            
            console.log($('#firstName').val() + ' ' + $('#lastName').val());
            $(".loader_accounts").show();
            var cartn = $('#cardNumber').val().replace(' ', '');
             cartn = cartn.replace('-', '');
             cartn=cartn.replace(/\*/g,'');
             //cartn = cartn+424242424242;
             //alert(getMonthNumber(($('#monthexpire').val()).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();})));
			//alert($('#yearexpire').val());
			//alert(cartn);
			//alert($('#Security_Code').val());
			//alert(getMonthNumber(($('#monthexpire').val()).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();})));
			//alert($('#yearexpire').val());
			//alert($('#firstName').val() + ' ' + $('#lastName').val());
			//alert(cartn);
			//return false; 
            Stripe.createToken({
                
                number: cartn,
                cvc: $('#Security_Code').val(),
                exp_month: getMonthNumber(($('#monthexpire').val()).replace(/\w\S*/g, function(txt){return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase();})),
                exp_year: $('#yearexpire').val(),
                name: $('#firstName').val() + ' ' + $('#lastName').val()
            }, stripeResponseHandler);
            
            return false; // submit from callback
        });
    });
</script>

   <div id="wrap">

	<div id="main">  
<section class="content_bg">
    <div class="content_container">
        <h1 class="heading">Account Settings</h1>
        <form action="<?php echo BASE_Follow_URL ?>/accounts?type=<?php echo (isset($_GET['type']) && $_GET['type'] == 'edit') ? 'edit' : ''; ?>" method="POST" id="frmAccounts" name="frmAccounts" >
            <div  class="input_field input_field_ac input_field_label">
                <?php if (isset($errorMsg) && $errorMsg != '') { ?>
                    <span class="validations"> <?php echo $errorMsg; ?></span>
                <?php } ?>
                <?php if (isset($_GET['updated']) && $_GET['updated'] == '1') { ?>
                    <span class="successArea"> <?php echo 'Information Updated Successfully'; ?></span>
                <?php } ?>

                <span class="validations" id="JSvalidation" style="display: none;"> </span>
                <label>First Name</label>
                <input type="text" id="firstName" name="firstName" value="<?php echo isset($getCurrentUserInfor[0]['firstName']) ? $getCurrentUserInfor[0]['firstName'] : ''; ?>"/>
                <label>Last Name</label>
                <input type="text" placeholder="" id="lastName" name="lastName" value="<?php echo isset($getCurrentUserInfor[0]['lastName']) ? $getCurrentUserInfor[0]['lastName'] : ''; ?>"/>
                <label>Email Address</label>
                <input type="email" placeholder="" id="emailAddress" name="emailAddress" value="<?php echo isset($getCurrentUserInfor[0]['userEmail']) ? $getCurrentUserInfor[0]['userEmail'] : ''; ?>"/>
                <label>Password</label>
                <input type="password" placeholder="" id="password" name="password" value="<?php echo isset($getCurrentUserInfor[0]['userPassword']) ? base64_decode($getCurrentUserInfor[0]['userPassword']) : ''; ?>"/>
                
                <?php //if(!isset($getCurrentUserInfor[0]['userPassword'])){  ?>
               <!-- <label>Confirm Password</label>
                <input type="password" placeholder="" id="confirmPassword" name="confirmPassword" value="<?php echo isset($getCurrentUserInfor[0]['userPassword']) ? base64_decode($getCurrentUserInfor[0]['userPassword']) : ''; ?>"/>-->
                <?php //} ?>
                
                <label>Card Number</label>
                <input type="text" placeholder="" id="cardNumber" name="cardNumber"  value="<?php echo isset($getCurrentUserInfor[0]['userCardnumberLast4Digits']) ? $getCurrentUserInfor[0]['userCardnumberLast4Digits'] : ''; ?>"/>
                <input type="hidden" id="hiddenValuecard" name="hiddenValuecard"  value="<?php echo isset($getCurrentUserInfor[0]['userCardnumberLast4Digits']) ? $getCurrentUserInfor[0]['userCardnumberLast4Digits'] : ''; ?>"/>
                <?php if ($ismobile == 1) { ?>
                    <div class="exp_con">
                        <label>Exp:</label>
                        <?php
                        if ((isset($getCurrentUserInfor[0]['userExpiration']))) {
                            $userExpiration = $getCurrentUserInfor[0]['userExpiration'];
                            $month = date('F', $userExpiration);
                            $year = date('Y', $userExpiration);
                        }
                        ?>
                        <div class="date_year_dropdown">
                            <input type="hidden" id="yearexpire2" name="yearexpire2" value="<?php echo isset($year) ? $year : '2014'; ?>" />                  
                            <ul>
                            	<li class="select">
                                    <select name="monthexpire" id="monthexpire" class ="drop_down drop_down02" >
                                        <option <?php if($month=='January'){ ?> selected="selected" <?php } ?> id="January" value="January"  onclick="setMonthOfexpire(this)">January</option>
                                        <option <?php if($month=='February'){ ?> selected="selected" <?php } ?> id="February" value="February" onclick="setMonthOfexpire(this)">February</option>
                                        <option <?php if($month=='March'){ ?> selected="selected" <?php } ?> id="March" value="March" onclick="setMonthOfexpire(this)">March</option>
                                        <option <?php if($month=='April'){ ?> selected="selected" <?php } ?> id="April" value="April" onclick="setMonthOfexpire(this)">April</option>
                                        <option <?php if($month=='May'){ ?> selected="selected" <?php } ?> id="May" value="May" onclick="setMonthOfexpire(this)">May</option>
                                        <option <?php if($month=='June'){ ?> selected="selected" <?php } ?> id="June" value="June" onclick="setMonthOfexpire(this)" >June</option>
                                        <option <?php if($month=='July'){ ?> selected="selected" <?php } ?> id="July" value="July" onclick="setMonthOfexpire(this)">July</option>
                                        <option <?php if($month=='August'){ ?> selected="selected" <?php } ?> id="August" value="August" onclick="setMonthOfexpire(this)">August</option>
                                        <option <?php if($month=='September'){ ?> selected="selected" <?php } ?> id="September" value="September" onclick="setMonthOfexpire(this)">September</option>
                                        <option <?php if($month=='October'){ ?> selected="selected" <?php } ?> id="October" value="October" onclick="setMonthOfexpire(this)">October</option>
                                        <option <?php if($month=='November'){ ?> selected="selected" <?php } ?> id="November" value="November" onclick="setMonthOfexpire(this)">November</option>
                                        <option <?php if($month=='December'){ ?> selected="selected" <?php } ?> id="December" value="December" onclick="setMonthOfexpire(this)">December</option>
                                    </select>
                                    <span class="arrow"></span>
                                </li>
                                <li class="select">
                                    <select name="yearexpire" id="yearexpire" class ="drop_down" onchange="setYearOfexpireMobile(this)" >
                                        <?php
                                        for ($i = 2013; $i <= 2025; $i++) {
                                            ?>
                                        <option value="<?php echo $i ?>" <?php if(@$year==$i){ ?> selected="selected" <?php } ?> id="year<?php echo $i; ?>" onclick="setYearOfexpire(this)" ><?php echo $i ?></option>
                                        <?php }
                                        ?>
                                    </select>
                                    <span class="arrow"></span>
                                </li>
                                
                            </ul>
                        </div>
 
                            <input type="hidden" id="monthexpire2" name="monthexpire2" value="<?php echo isset($month) ? $month : 'January'; ?>" />   
                    </div>
                <?php }  else {?>
                                        
                   <div class="exp_con">
                    <label>Exp:</label>
                    <?php
                    if ((isset($getCurrentUserInfor[0]['userExpiration']))) {
                        $userExpiration = $getCurrentUserInfor[0]['userExpiration'];
                        $month = date('F', $userExpiration);
                        $year = date('Y', $userExpiration);
                    }
                    ?>
                     <div class="date_year_dropdown">

                        <input type="hidden" id="yearexpire2" name="yearexpire2" value="<?php echo isset($year) ? $year : '2014'; ?>" />                  
                            <ul >
                                <li class="select">
                                    <select name="monthexpire" id="monthexpire" class ="drop_down drop_down02">
<!--                                      <option id="January" onclick="setMonthOfexpire(this)">January</option>-->
                                         <option <?php if($month=='January'){ ?> selected="selected" <?php } ?> id="January" onclick="setMonthOfexpire(this)">January</option>
                                        <option <?php if($month=='February'){ ?> selected="selected" <?php } ?> id="February" onclick="setMonthOfexpire(this)" >February</option>
                                        <option <?php if($month=='March'){ ?> selected="selected" <?php } ?> id="March" onclick="setMonthOfexpire(this)" >March</option>
                                        <option <?php if($month=='April'){ ?> selected="selected" <?php } ?> id="April" onclick="setMonthOfexpire(this)" >April</option>
                                        <option <?php if($month=='May'){ ?> selected="selected" <?php } ?> id="May" onclick="setMonthOfexpire(this)" >May</option>
                                        <option <?php if($month=='June'){ ?> selected="selected" <?php } ?> id="June" onclick="setMonthOfexpire(this)" >June</option>
                                        <option <?php if($month=='July'){ ?> selected="selected" <?php } ?> id="July" onclick="setMonthOfexpire(this)" >July</option>
                                        <option <?php if($month=='August'){ ?> selected="selected" <?php } ?> id="August" onclick="setMonthOfexpire(this)" >August</option>
                                        <option <?php if($month=='September'){ ?> selected="selected" <?php } ?> id="September" onclick="setMonthOfexpire(this)" >September</option>
                                        <option <?php if($month=='October'){ ?> selected="selected" <?php } ?> id="October" onclick="setMonthOfexpire(this)" >October</option>
                                        <option <?php if($month=='November'){ ?> selected="selected" <?php } ?> id="November" onclick="setMonthOfexpire(this)" >November</option>
                                        <option <?php if($month=='December'){ ?> selected="selected" <?php } ?> id="December" onclick="setMonthOfexpire(this)" >December</option>
                                    </select>
                                  </select>
                                  <span class="arrow"></span>
                                </li>
                                <li class="select">
                                <select name="yearexpire" id="yearexpire" class ="drop_down">
                                <?php
                                for ($i = 2013; $i <= 2025; $i++) {
                                    ?>
                                    <option <?php if($year==$i){ ?> selected="selected" <?php } ?> id="year<?php echo $i; ?>" onclick="setYearOfexpire(this)" ><?php echo $i ?></option>
                                <?php }
                                ?>
                                </select>
                                <span class="arrow"></span>
                                </li>
                            </ul>
                        </div>

                        <input type="hidden" id="monthexpire2" name="monthexpire2" value="<?php echo isset($month) ? $month : 'January'; ?>" />   
                </div>
                <?php } ?>
                <div class="secondary_lbl">
                    <label class="sec_lbl">Security Code</label><label class="zip_lbl">Zip Code</label></div>
                <div class="clear"></div>
                <input type="text" class="secondary_inputs input_margin" required="required" placeholder="" id="Security_Code" name="Security_Code" value="<?php echo isset($getCurrentUserInfor[0]['userSecurityCode']) ? $getCurrentUserInfor[0]['userSecurityCode'] : ''; ?>"/>
                <input style="width: 45%" type="text" class="zip_inputs" required="required" placeholder="" id="Zip_Code" name="Zip_Code" value="<?php echo isset($getCurrentUserInfor[0]['userZipCode']) ? $getCurrentUserInfor[0]['userZipCode'] : ''; ?>"/>
            <div class="clear"></div>
            </div>
            <div class="enter_btn" style="padding:20px 0 30px 0; text-align:center">
                <img class="loader_accounts" style="margin-bottom: 20px;display: none;" src="<?php echo BASE_URL; ?>web/images/loader3.gif"/>
                <input type="submit" name="sub" class="blu_button" value="Save Account Settings" />
<!--                <a  href="javascript:void(0);" onclick="submitForm();">Save Account Settings</a>-->
            </div>
        </form>
    </div>

    <?php
    if (isset($_SESSION['islogin']) && $_SESSION['islogin'] == TRUE) {
        require 'web/includes/footer.php';
    } else {
        echo '<br/><br/><br/><br/>';
    }
    ?>

<script type="text/javascript">
    <?php if (isset($_GET['type']) && $_GET['type'] == 'edit') { ?>
    $('#cardNumber').keypress(function() {
    var txtVal = this.value;
    var len = $('#cardNumber').val().length;
    var realValue = "";
    if(len<=12){
    realValue += txtVal.replace(/./g,"*");  
}else{
    realValue += txtVal;  
}
    $('#cardNumber').val(realValue);
   
  });
  <?php } ?>  
    $(document).ready(function() {
        var twelchar = "";
        <?php if (isset($_GET['type']) && $_GET['type'] == 'edit') { ?>
        twelchar = "qwertgfdsazx";
        <?php } ?>
            
        var realValue = "";
        var len = $('#hiddenValuecard').val();
        realValue += twelchar.replace(/./g,"*");
        realValue +=len;
     $('#cardNumber').val(realValue);
  // Handler for .ready() called.
});
    

</script>    