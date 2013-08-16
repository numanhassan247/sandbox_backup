<!DOCTYPE html>
<html>

<head>
    <title>welcome</title>

</head>

<body>

    <div id="fb-root"></div>
    <script>
        window.fbAsyncInit = function() {
            // init the FB JS SDK
            FB.init({
                appId      : '572023222816222', // App ID from the App Dashboard
                channelUrl : '//127.0.0.1:8000/welcome/channel.html', // Channel File for x-domain communication
                status     : true, // check the login status upon init?
                cookie     : true, // set sessions cookies to allow your server to access the session?
                xfbml      : true  // parse XFBML tags on this page?
            });

            FB.getLoginStatus(function(response) {
                if (response.status === 'connected') {
                    alert("connected");
                } else if (response.status === 'not_authorized') {
                    // not_authorized
                    alert("not_authorized");
                } else {
                    alert("not_logged_in");
                    login()
                }
            });

            // Additional initialization code such as adding Event Listeners goes here

        };

        function login() {
            FB.login(function(response) {
                if (response.authResponse) {
                    // connected
                    testAPI();
                } else {
                    // cancelled
                }
            });
        }
        function testAPI() {
            console.log('Welcome!  Fetching your information.... ');
            FB.api('/me', function(response) {
                console.log('Good to see you, ' + response.name + '.');
            });
        }

        // Load the SDK's source Asynchronously
        // Note that the debug version is being actively developed and might
        // contain some type checks that are overly strict.
        // Please report such bugs using the bugs tool.
        (function(d, s, id, debug){
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) {return;}
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/all" + (debug ? "/debug" : "") + ".js";
            fjs.parentNode.insertBefore(js, fjs);
        }(document, 'script', 'facebook-jssdk', /*debug*/ false));
    </script>
    <script src="//connect.facebook.net/en_US/all.js"></script>

    <h2>Welcome after facebook login !</h2>
</body>
</html>