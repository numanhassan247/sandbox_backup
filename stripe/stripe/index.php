<?php
require 'includes/db_config.php';
require 'includes/config.php';
include 'templates/header.php';
$client_id = '';
$chruchid = isset($_GET['id'])? : '';
$result_get_this_church = array();
$_SESSION['UserID'] = '1';
if ($chruchid) {
    $query_get_this_church = "SELECT  `churchName` , `churchUri` , `churchToken` ,`churchIsConfigured`
        FROM `donate_churches`  WHERE `churchId` = '$chruchid' LIMIT 1 ";
    $result_get_this_church = executeQuery($query_get_this_church);
    $_SESSION['churchId'] = $chruchid;
    $_SESSION['churchName'] = $result_get_this_church[0]['churchName'];
    $_SESSION['churchToken'] = $result_get_this_church[0]['churchToken'];
}
?>

<?php
if ($result_get_this_church) {
    if ($result_get_this_church[0]['churchIsConfigured'] == '0') {
        ?>
        <br /><br />
        <br /><br />
        <a href="https://connect.stripe.com/oauth/authorize?response_type=code&client_id=<?php echo CLIENT_ID; ?>&scope=read_write"><img src="images/light@2x.png" /></a>
    <?php } else { ?>
        <script>
            window.location = "<?php echo BASE_URL ?>PHP-StripeOAuth/stripe.php?id=<?php echo $chruchid; ?>";
        </script>
        <?php
    }
} else {
    ?>
    This church Dose not exists<br/>
    <?php
    echo isset($_GET['error']) ? 'Error : ' . $_GET['error'] : '';
}
include 'templates/footer.php';
?>

