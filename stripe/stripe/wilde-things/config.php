<?php
  require_once('../stripe/lib/Stripe.php');
  $stripe = array(
    'secret_key'      => 'sk_test_BX6UdkVfkzx3NRqpL7DN1oqQ',
    'publishable_key' => 'pk_test_2qdK8keor6n1hq9TvdqYEqia'
    );
  Stripe::setApiKey($stripe['secret_key']);
?>