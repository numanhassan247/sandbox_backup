<?php

session_start();
ini_set('display_errors', '1');
error_reporting(E_ALL);
$DEV = TRUE;
if ($DEV) {

//    define('CLIENT_ID', 'ca_1MrfmfQYawgTEmUsXCqn4kR80Vy3PsvG');
//    define('SECRET_KEY', 'sk_test_BX6UdkVfkzx3NRqpL7DN1oqQ');
//    define('PUBLISHABLE_KEY', 'pk_test_o9mKlqcTDG8V7nMbKbp0QJ5o');
//    define('BASE_URL', 'http://prayertab.iserver.purelogics.info/MyChurch/');

    define('CLIENT_ID', 'ca_1P3ZzouG8VlbEbCO7zg2QOY7SFPthpCm');
    define('SECRET_KEY', 'sk_test_tVCtggJwPBjPVekaM7mqk15n');
    define('PUBLISHABLE_KEY', 'pk_test_o9mKlqcTDG8V7nMbKbp0QJ5o');
    define('BASE_URL', 'http://prayertab.iserver.purelogics.info/MyChurch/');
} else {
//    define('CLIENT_ID', 'ca_1P3ZN5ZmoRYqSJgigxlyYEVfLNHOyKIH');
//    define('SECRET_KEY', 'sk_live_GRPktaIioyuGYg0kLIVAVdCI');
//    define('PUBLISHABLE_KEY', 'pk_live_DmMnGTbepSkhRVtbgseiVTtx ');
//    define('BASE_URL', 'http://prayertab.iserver.purelogics.info/MyChurch/');
}

if (!function_exists('getScriptAccessToken')) {

    function getScriptAccessToken() {
        if ($_SESSION['token']) {
            return $_SESSION['token'];
        }
        return FALSE;
    }

}
