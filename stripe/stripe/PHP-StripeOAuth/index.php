<?php 
include("oauth2-php/lib/OAuth2Client.php");
include('StripeOAuth.class.php');
// redirect to proper application OAuth url
    $oauth = new StripeOAuth('ca_1P3ZzouG8VlbEbCO7zg2QOY7SFPthpCm', 'sk_test_tVCtggJwPBjPVekaM7mqk15n');
    $url = $oauth->getAuthorizeUri();
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Connect Stipe account to made payment</title>
</head>

<body>
<br />
<br  />
<br />
<br  />
<br />
<a href="<?php echo $url;?>"><img src="../images/light@2x.png" /></a>
</body>
</html>