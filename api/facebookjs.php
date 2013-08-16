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
  <head></head>
  <body>

  FB.ui(
  {
   method: 'feed',
   name: 'The Facebook SDK for Javascript',
   caption: 'Bringing Facebook to the desktop and mobile web',
   description: (
      'A small JavaScript library that allows you to harness ' +
      'the power of Facebook, bringing the user\'s identity, ' +
      'social graph and distribution power to your site.'
   ),
   link: 'https://developers.facebook.com/docs/reference/javascript/',
   picture: 'http://www.fbrell.com/public/f8.jpg'
  },
  function(response) {
    if (response && response.post_id) {
      alert('Post was published.');
    } else {
      alert('Post was not published.');
    }
  }
);	

  </body> 
</html>  