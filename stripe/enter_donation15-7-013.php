<?php
require_once 'includes/config.php';
require_once 'includes/db_config.php';
require 'includes/check_church.php';
if (!$_SESSION['islogin']) {
    header("location:" . BASE_Follow_URL);
}
include("stripe/PHP-StripeOAuth/oauth2-php/lib/OAuth2Client.php");
require_once('stripe/PHP-StripeOAuth/StripeOAuth.class.php');
//ini_set('display_errors',1);
//error_reporting(E_ALL);
require_once 'includes/mailchimp-api-class/examples/inc/MCAPI.class.php';

require_once 'includes/mailchimp-api-class/examples/inc/config.inc.php';
require_once 'includes/mailchimp-api-class/mailchimp-mandrill/src/Mandrill.php';


$code = NULL;
$error = NULL;
$success = NULL;
$accessToken = NULL;
$errorMsg = '';
$successMsg = '';


$Get_user_info = "SELECT `userExpiration`,`userEmail`,`transaction_fee` ,`userCardnumberLast4Digits`,`userSecurityCode`,`userStripeId` FROM donate_churches_users" . DEVNAME . " LEFT JOIN donate_churches" . DEVNAME . " ON donate_churches_users" . DEVNAME . ".churchid=donate_churches" . DEVNAME . ".churchId  WHERE `userId` = '$_SESSION[UserID]' LIMIT 1 ";
$User_info = executeQuery($Get_user_info);


if (!isset($_SESSION['token']) || !isset($_SESSION['pkey']) || !isset($_SESSION['key'])) {
    $query_get_this_church = "SELECT `churchPkey` ,`transaction_fee` , `churchkey` ,`churchName` , `churchUri` , `churchToken` ,`churchIsConfigured`
                                                              FROM donate_churches" . DEVNAME . "  WHERE `churchId` = '$id' LIMIT 1 ";

    $result_get_this_church = executeQuery($query_get_this_church);

    $accessToken = $result_get_this_church[0]['churchToken'];
    $churchPkey = $result_get_this_church[0]['churchPkey'];
    $churchkey = $result_get_this_church[0]['churchkey'];
    $transaction_fee = $result_get_this_church[0]['transaction_fee'];
    $_SESSION['token'] = $accessToken;
    $_SESSION['pkey'] = $churchPkey;
    $_SESSION['key'] = $churchkey;
}

if (isset($_GET['msg']) && $_GET['msg'] == '1') {
    $successMsg = 'Donated Successfully';
} elseif (isset($_GET['msg']) && $_GET['msg'] == '2') {
    $errorMsg = 'Some thing went wrong while processing payment';
}
if ($_SERVER["REQUEST_METHOD"] == "POST") {

    if ($_POST['amount'] == '') {
        $errorMsg .= 'Invalid Donate Amount<br/>';
    } else {
        $amount = $_POST['amount'];
        $amount = str_replace(',', '', $amount);
        if (is_numeric($amount)) {
            $_POST['amount'] = $amount;
        } else {
            $errorMsg .= 'Invalid Donate Amount<br/>';
        }
    }
    //echo $_POST['amount'];exit;
    if (!isset($User_info[0]['userStripeId']) || empty($User_info[0]['userStripeId'])) {
        $errorMsg .= 'User have not registered on stripe<br/>';
    }
    if ($errorMsg == '') {
        require 'stripe/stripe-php-1.7.15/lib/Stripe.php';
        $transaction_fee = $User_info[0]['transaction_fee'];
//        $newtoken = $_POST['stripeToken'];
        try {
//            if (!isset($_POST['stripeToken']))
//                throw new Exception("The Stripe Token was not generated correctly");

            Stripe::setApiKey(SECRET_KEY);
            $amount = (($_POST['amount']) * (100) * ($transaction_fee / 100));
            $amount = number_format($amount, 0, '.', '');
            //          echo '>>'.$amount;exit;
            $charge = Stripe_Charge::create(array(
                        'customer' => $User_info[0]['userStripeId'],
                        'amount' => ($_POST['amount']) * (100),
                        'currency' => 'usd',
                       // "application_fee" => $amount
                            ), $_SESSION['token']);

//            $charge = Stripe_Charge::create(array(
//                        "amount" => (($_POST['amount'] * 100)),
//                        "currency" => "usd",
//                        "card" => $newtoken,
//                        "application_fee" => (($_POST['amount'] * 100) * 0.01)
//                            ), $_SESSION['token']
//            );
        } catch (Exception $e) {
            header("location:" . BASE_Follow_URL . "/donation?msg=2&info=" . $e->getMessage());
            exit;
        }
        if (isset($charge['id']) && !empty($charge['id'])) {
            $InsetArray = array(
                'transUserid' => $_SESSION['UserID'],
                'transAmmount' => (($_POST['amount'] * 100)),
                'transCreatedAt' => time(),
                'trnaschurchId' => $id,
                'transStripeID' => $charge['id'],
                'transApplicationFee' => 0//(($_POST['amount'] * 100) * ($transaction_fee / 100)),
            );

            $insertif = insertData('donate_churches_transaction' . DEVNAME, $InsetArray);
            if ($insertif) {
                $date = date('Y-m-d H:i:s');
                $time = new DateTime($date, new DateTimeZone('EDT')); //America/New_York//America/Los_Angeles
                $time->setTimezone(new DateTimeZone('PST'));
                $times = $time->format('H:i a');
                sendEmailSuscribedOnMailChimp($User_info, $_POST['amount'], $charge['id'],$times);
                header("location:" . BASE_Follow_URL . "/donation?msg=1");
            } else {
                header("location:" . BASE_Follow_URL . "/donation?msg=2");
            }
        } else {
            header("location:" . BASE_Follow_URL . "/donation?msg=2");
        }
    }
}
include 'web/includes/header.php';

function sendEmailSuscribedOnMailChimp($pageInfo, $amount, $chargid,$times) {
    //global $app_id, $callbackurl, $appurl;
//$app_id = '155019064552635';



$emailBodyHTML = '
<table width="100%" bgcolor="#e7eaef">
<tr><td>   
	<table width="508" style="margin-top:30px; border:0" align="center" cellpadding="0" cellspacing="0">
    	<tr>
        	<td style="color:#a6a6a6; text-align:center;">Trouble viewing this email?</td>
        </tr>
        <tr>
        	<td>
            	<table style="background:#FFF url(https://www.mychurch.org/xml/donate_mobile_dev/web/images/Header_BG.png) no-repeat 0 0; margin-top:30px;  margin-bottom: 30px; padding:38px 0 0; text-align:center; border-radius:7px;" width="508" align="center" border="0" cellpadding="0" cellspacing="0">
                	<tr>
                    	<td align="center">
                        	<img src="https://www.mychurch.org/xml/donate_mobile_dev/web/images/Icon.png" width="114" height="114" />
                        </td>
                    </tr>
                    <tr>
                    	<td align="center" style="color:#FFF;">
                        	<p>
                            <span style="font-size:14px; font-weight:bold; line-height:40px;">The River Church Community</span>
                            <br />
                            670 Lincoln Ave, Suite 200
                            <br />
                            San Jose, CA 95126
                            <br />
                            tel: (408) 252-5500
                           </p>
                        </td>
                    </tr>
                    <tr>
        				<td>
                        	<table style="margin:35px auto; color:#a5a5a5;" width="303" align="center" border="0" cellpadding="0" cellspacing="0">
                            	
                                <tr>
                                	<td style="text-align:left;">' . date('M d, Y') . ' at ' . $times . '</td>
                                    <td style="text-align:right;">Receipt #d17z</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                	<td colspan="2" style="border-bottom:1px solid #E7EAEF;"></td>
                                </tr>
                                 <tr><td>&nbsp;</td></tr>
                                <tr>
                                	<td style="text-align:left; color:#152a45"> Your Donation</td>
                                    <td style="text-align:right; color:#152a45">$' . $amount . '</td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                	<td colspan="2" style="border-bottom:1px solid #E7EAEF;"></td>
                                </tr>
                                <tr><td>&nbsp;</td></tr>
                                <tr>
                                	<td style="text-align:left;"> Payment method</td>
                                    <td style="text-align:right;">
                                    	<img src="https://www.mychurch.org/xml/donate_mobile_dev/web/images/pay.gif" /> 
                                       ****' . $pageInfo[0]['userCardnumberLast4Digits'] . '
                                    </td>
                                </tr>
 
                        	</table>
                        </td>
        			</tr>
                </table>
            </td>
        </tr>
        <tr>
        	<td style="color:#a6a6a6; text-align:center;">Powerd by <span style="color:#152a45">myChurch</span></td>
        </tr>
	</table>
           </td></tr>
</table>
 
';




    /*$emailBodyHTML = 'The River Church Community<br>
670 Lincoln Ave, Suite 200<br>
San Jose, CA 95126<br>
tel: (408) 252-5500<br><br>


Date and Time ' . date('M d, Y') . ' at ' . $times . ' <br>
Your Donation $' . $amount . '
Payment Method **' . $pageInfo[0]['userCardnumberLast4Digits'] . ' <br>
Transaction id **' . substr($chargid, -5) . '   
';*/



    $headers = 'MIME-Version: 1.0' . "\r\n";
    $headers .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";
    $headers .= 'From: <app@fbdonate.org>' . "\r\n";
// Additional headers
//    ##################################################

    $headers .= 'Bcc: church@mychurch.org' . "\r\n";
    $apikeymandrill = 'MmuBjsRVFAQ6XMDT155qrA';
    $Mandrill = new Mandrill($apikeymandrill);


    $params = array(
//    "html" => "<p>\r\n\tHi Adam,</p>\r\n<p>\r\n\tThanks for <a href=\"http://mandrill.com\">registering</a>.</p>\r\n<p>etc etc</p>",
        "html" => $emailBodyHTML,
        "text" => null,
        "from_email" => "church@mychurch.org",
        "from_name" => "The River Church Community",
        "bcc_address" => "",
        "subject" => "Thank you for your donation!",
//    "to" => array(array("email" => $email)),
        "to" => array(array("email" => $pageInfo[0]['userEmail'])),
        "track_opens" => true,
        "track_clicks" => true,
        "auto_text" => true
    );

    return $Mandrill->messages->send($params, true);
    //mail('arif.mehmood@purelogics.net', 'Facebook Donate App Confirmation', $emailBodyHTML, $headers);
}
?>

<script type="text/javascript">
          
            
    function submitForm(){
        $(".loader_accounts").show();
        var $errorMsg = '';    
        // if ($("#amount").val() == '' || !isInteger($("#amount").val())  ) {
        // $errorMsg = $errorMsg + 'Invalid Donation Amount<br/>';
        //}
        if($errorMsg == ''){ 
            return true;
            //$("#frmAccounts").submit();
        }else{
            $("#JSvalidation").html($errorMsg.toString());
            $("#JSvalidation").css('border', '1px solid red');
            $("#JSvalidation").show('slow');
            $(".successArea").hide("slow");
            $(".loader_accounts").hide();
            return false;
        }
    }
    if(window.screen.height == 568)
    {
        document.getElementById('innerContainer').style.height= 568;
    }
<?php if (isset($successMsg) && $successMsg != '') { ?>
        function showSuccess(){
            $(".popup_con").show();                
        }
<?php } ?>
    // ########################################## Stripe Funcations ##################################
    // this identifies your website in the createToken call below
    //    Stripe.setPublishableKey("<?php // echo $_SESSION['pkey'];                                ?>");
        
    //            function stripeResponseHandler(status, response) {
    //            
    //                if (response.error) {
    //                    $("#validations").hide('slow');
    //                    $("#JSvalidation").hide('slow');
    //                    $("#JSvalidation").html('Please change you account settings <br/>'+response.error.message.toString());
    //                    $("#JSvalidation").show('slow');
    //                    $('.enter_btn').html(' <a href="javascript:void(0);" onclick="submitForm();" >Donate now</a>');
    //                
    //                } else {
    //                    var form$ = $("#frmAccounts");
    //                    // token contains id, last4, and card type
    //                    var token = response['id'];
    //                    
    //                    // insert the token into the form so it gets submitted to the server
    //                    form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
    //                    // and submit
    //                    form$.get(0).submit();
    //                
    //                }
    //            }
        
    /* $(document).ready(function() {
     $("#frmAccounts").submit(function(event) {
         // disable the submit button to prevent repeated clicks
         //                    $('.submit-button').attr("disabled", "disabled");
                
         // createToken returns immediately - the supplied callback submits the form if there are no errors
         Stripe.createToken({
             number: $('.card-number').val(),
             cvc: $('.card-cvc').val(),
             exp_month: $('.card-expiry-month').val(),
             exp_year: $('.card-expiry-year').val()
         }, stripeResponseHandler);
         return false; // submit from callback
     });*/
    //        });
</script>
<section class="content_bg">
    <div class="content_container" id="innerContainer">
        <h1 class="heading">Enter your donation</h1>
<?php
if (isset($errorMsg) && $errorMsg != '') {
    ?>
            <span class="validations"> <?php echo $errorMsg; ?>
            <?php if (isset($_GET['info']) && $_GET['info'] != '') { ?>
                    <?php echo '<br/>' . $_GET['info']; ?>
                <?php } ?>
            </span>
            <?php } ?>
        <?php if (isset($successMsg) && $successMsg != '') { ?>
            <span class="successArea"> <?php echo $successMsg; ?></span>
            <script type="text/javascript">
                $(function(){
                    showSuccess(); 
                });
            </script>
<?php } ?>


        <div class="popup_con" style="display: none;">
            <div class="success_box"><br>
                <h1>Success! </h1>
                <p>Thank you for your donation.</p>
                <div class="create_btn create_btn01"><a href="javascript:void(0)" onclick="$('.popup_con').hide();">Close</a></div>
                <div class="enter_btn enter_btn01"> <a href="<?php echo BASE_Follow_URL; ?>/logout?logout=logout">Logout</a></div>
                <div class="clear"></div>
            </div>
        </div>
        <span class="validations" id="JSvalidation" style="display: block;"> &nbsp; </span>
        <div class="clear"></div>


        <form method="POST" action="<?php echo BASE_Follow_URL ?>/donation" id="frmAccounts" name="frmAccounts" onsubmit="return submitForm();">
            <div class="input_field"><span class="currencyinput" style="height: 30px; position: relative;">
                    <strong style="left: 10px;position: absolute;top: -17px;color: #989898;font-family: 'museo700';font-size: 30px;font-weight: normal;">$</strong>
                    <input  type="text" id="amount" name="amount" style="padding:0 0 0 23px !important;"/></span>

<?php
$userExpiration = $User_info[0]['userExpiration'];
$month = date('m', $userExpiration);
$year = date('Y', $userExpiration);
?>
                <input type="hidden" class="card-number" id="card-number" name="card-number"  value="<?php echo $User_info[0]['userCardnumberLast4Digits']; ?>"  />
                <input type="hidden" class="card-expiry-year"  id="card-expiry-year" name="card-expiry-year"  value="<?php echo $year; ?>"   />
                <input type="hidden" class="card-expiry-month"  id="card-expiry-month" name="card-expiry-month"  value="<?php echo $month; ?>"   />
                <input type="hidden" class="card-cvc"  id="card-cvc" name="card-cvc" value="<?php echo $User_info[0]['userSecurityCode']; ?>"   />
            </div>
            <div class="form_acount">From Account: ****<?php echo substr($User_info[0]['userCardnumberLast4Digits'], -4, 4) ?></div>
            <div class="enter_btn">
                <span class="loader_accounts" style="margin-left: 61px;margin-bottom: 20px;display: none;">Processing payment <img src="<?php echo BASE_URL; ?>web/images/loader3.gif" /> ... </span>
                <input type="submit" name="sub" value="Donate now" class="blu_button" />
                <br /></br />
                <!--<a href="javascript:void(0);" onclick="submitForm();" >Donate now</a>-->
            </div>
        </form>
    </div>
<?php require 'web/includes/footer.php'; ?>