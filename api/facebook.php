<!--
App ID/API Key
572023222816222
App Secret
61cd8014a18d18e7e3da625de147ca86

Hosting URL: 
https://aqueous-dawn-6790.herokuapp.com/

-->
<?php
require("facebook_sdk/src/facebook.php");



 

  $config = array();
  $config['appId'] = '572023222816222';
  $config['secret'] = '61cd8014a18d18e7e3da625de147ca86';

  $facebook = new Facebook($config);

  $user_id = $facebook->getUser();

  // echo "<pre>"; print_r($facebook);  echo "</pre>";


?>
<!-- <html>
    <head>
      <title>My Facebook Login Page</title>
    </head>
    <body>

      <div id="fb-root"></div>
      <script>
        window.fbAsyncInit = function() {
          FB.init({
            appId      : '572023222816222', // App ID
            channelUrl : 'http://localhost:8080/api/', // Channel File
            status     : true, // check login status
            cookie     : true, // enable cookies to allow the server to access the session
            xfbml      : true  // parse XFBML
          });
          FB.ui({ 
            method: 'feed' 
          });
        };
        // Load the SDK Asynchronously
        (function(d){
           var js, id = 'facebook-jssdk', ref = d.getElementsByTagName('script')[0];
           if (d.getElementById(id)) {return;}
           js = d.createElement('script'); js.id = id; js.async = true;
           js.src = "//connect.facebook.net/en_US/all.js";
           ref.parentNode.insertBefore(js, ref);
         }(document));
      </script>

    </body>
 </html>-->
 
<html>
  <head>
      <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title>Facebook API</title>
  </head>
  <body>

  <?php
    if($user_id) {
		$msg = "Posting via API";
      // We have a user ID, so probably a logged in user.
      // If not, we'll get an exception, which we handle below.
      try {
        $ret_obj = $facebook->api('/me/feed', 'POST',
                                    array(
                                      'message' => $msg
                                 ));
        echo '<pre>Post ID: ' . $ret_obj['id'] . '</pre>';

        // Give the user a logout link 
        echo '<br /><a href="' . $facebook->getLogoutUrl() . '">logout</a>';
      } catch(FacebookApiException $e) {
        // If the user is logged out, you can have a 
        // user ID even though the access token is invalid.
        // In this case, we'll get an exception, so we'll
        // just ask the user to login again here.
        $login_url = $facebook->getLoginUrl( array(
                       'scope' => 'publish_stream'
                       )); 
        echo 'Please <a href="' . $login_url . '">login.</a>';
        error_log($e->getType());
        error_log($e->getMessage());
      }   
    } else {

      // No user, so print a link for the user to login
      // To post to a user's wall, we need publish_stream permission
      // We'll use the current URL as the redirect_uri, so we don't
      // need to specify it here.
      $login_url = $facebook->getLoginUrl( array( 'scope' => 'publish_stream' ) );
      echo 'Please <a href="' . $login_url . '">login.</a>';

    } 

  ?>      

  </body> 
</html>  