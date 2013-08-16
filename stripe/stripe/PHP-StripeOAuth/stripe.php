<?php
require '../includes/config.php';
require '../includes/db_config.php';
include("oauth2-php/lib/OAuth2Client.php");
require_once('StripeOAuth.class.php');


$code = NULL;
$error = NULL;
$success = NULL;
$accessToken = NULL;

if (isset($_GET['code'])) {
    $code = $_GET['code'];

    $oauth = new StripeOAuth(CLIENT_ID, SECRET_KEY);
    $_SESSION['token'] = $oauth->getAccessToken($code);
    $_SESSION['pkey'] = $oauth->getPublishableKey($code);
    $_SESSION['key'] = $oauth->getRefreshToken($code);


    $accessToken = $_SESSION['token'];

    $UpdateData = array(
        'churchIsConfigured' => '1',
        'churchToken' => $accessToken,
        'churchkey' => $_SESSION['key'],
        'churchPkey' => $_SESSION['pkey'],
    );
    $where = "`churchId` = '$_SESSION[churchId]' ";
    updateData('donate_churches', $UpdateData, $where);
} else
if (isset($_GET['id'])) {

    $chruchid = $_GET['id'];
    $query_get_this_church = "SELECT `churchPkey` , `churchkey` ,`churchName` , `churchUri` , `churchToken` ,`churchIsConfigured`
                                                              FROM `donate_churches`  WHERE `churchId` = '$chruchid' LIMIT 1 ";
    $result_get_this_church = executeQuery($query_get_this_church);
    $accessToken = $result_get_this_church[0]['churchToken'];
    $churchPkey = $result_get_this_church[0]['churchPkey'];
    $churchkey = $result_get_this_church[0]['churchkey'];
    $_SESSION['token'] = $accessToken;
    $_SESSION['pkey'] = $churchPkey;
    $_SESSION['key'] = $churchkey;
    $_SESSION['churchId'] = $_GET['id'];
} else
if (!isset($_POST['amount'])) {

    header("location:" . BASE_Follow_URL . "?error=codeNotFound");
    exit;
}

require '../stripe-php-1.7.15/lib/Stripe.php';

if ($_POST) {
    try {
        dumper($_POST);
        $newtoken = $_POST['stripeToken'];

        if (!isset($_POST['stripeToken']))
            throw new Exception("The Stripe Token was not generated correctly");
        Stripe::setApiKey($_SESSION['key']);
        $charge = Stripe_Charge::create(array(
                    "amount" => $_POST['amount'],
                    "currency" => "usd",
                    "card" => $newtoken,
                    "application_fee" => ($_POST['amount'] * 0.01)
                        ), $_SESSION['token']
        );
        dumper($charge);
        $InsertData = array(
            'transUserid' => $_SESSION['UserID'],
            'transAmmount' => $_POST['amount'],
            'transCreatedAt' => time(),
            'trnaschurchId' => $_SESSION['churchId'],
            'transStripeID' => isset($charge['id']) ? $charge['id'] : NULL,
            'transApplicationFee' => ($_POST['amount'] * 0.01),
        );

        insertData('donate_churches_transaction', $InsertData);
        $success = 'Your payment was successful. <a href="' . BASE_Follow_URL . '">Go back</a>';
    } catch (Exception $e) {
        $error = $e->getMessage();
    }
}
if (!isset($_GET['error'])) {
    ?>

    <!DOCTYPE html>
    <html lang="en">
        <head>
            <meta http-equiv="Content-type" content="text/html; charset=utf-8" />
            <title>Now charge with Stripe</title>
            <script type="text/javascript" src="https://js.stripe.com/v1/"></script>
            <!-- jQuery is used only for this example; it isn't required to use Stripe-->
            <script type = "text/javascript" src = "https://ajax.googleapis.com/ajax/libs/jquery/1.6.2/jquery.min.js"></script>
            <script type = "text/javascript">
                // this identifies your website in the createToken call below
                Stripe.setPublishableKey('<?php echo $_SESSION['pkey']; ?>');

                function stripeResponseHandler(status, response) {

                    if (response.error) {
                        // re-enable the submit button
                        $('.submit-button').removeAttr("disabled");
                        // show the errors on the form
                        $(".payment-errors").html(response.error.message);
                    } else {
                        var form$ = $("#payment-form");
                        // token contains id, last4, and card type
                        var token = response['id'];
                        console.log(response);
                        // insert the token into the form so it gets submitted to the server
                        form$.append("<input type='hidden' name='stripeToken' value='" + token + "' />");
                        // and submit
                        form$.get(0).submit();

                    }
                }

                $(document).ready(function() {
                    $("#payment-form").submit(function(event) {
                        // disable the submit button to prevent repeated clicks
                        $('.submit-button').attr("disabled", "disabled");

                        // createToken returns immediately - the supplied callback submits the form if there are no errors
                        Stripe.createToken({
                            number: $('.card-number').val(),
                            cvc: $('.card-cvc').val(),
                            exp_month: $('.card-expiry-month').val(),
                            exp_year: $('.card-expiry-year').val()
                        }, stripeResponseHandler);
                        return false; // submit from callback
                    });
                });
            </script>
        </head>
        <body>
            <h1>Now charge with Stripe</h1>
            <!--to display errors returned by createToken-->
            <span class = "payment-errors"><?= $error ?></span>
            <span class="payment-success"><?= $success ?></span>
            <form action="stripe.php" method="POST" id="payment-form">
                <div class="form-row">
                    <label>Card Number</label>
                    <input type="text" size="20" autocomplete="off" class="card-number" />
                </div>
                <div class="form-row">
                    <label>Amount</label>
                    <input type="text" size="20" autocomplete="off" name="amount" id="amount" />&nbsp;&nbsp;<small>Amount is in cents</small>
                </div>
                <div class="form-row">
                    <label>CVC</label>
                    <input type="text" size="4" autocomplete="off" class="card-cvc" />
                </div>
                <div class="form-row">
                    <label>Expiration (MM/YYYY)</label>
                    <input type="text" size="2" class="card-expiry-month"/>
                    <span> / </span>
                    <input type="text" size="4" class="card-expiry-year"/>
                </div>
                <input type="hidden" name="token" id="token" value="<?php echo $accessToken; ?>" />
                <button type="submit" class="submit-button">Submit Payment</button>
            </form>
        </body>
    </html>
    <?php
} elseif (isset($_GET['error'])) {
    echo $_GET['error_description'] . ". <a href='index.php'>Go back</a>";
}
?>

