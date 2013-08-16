
<?php
$var = 12;
$cipher = MCRYPT_BLOWFISH;
$key = "my_key";
$mode = MCRYPT_MODE_CBC;
// Blowfish/CBC uses an 8-byte IV
$iv = substr( md5(mt_rand(),true), 0, 8 );


$crypt_text = mcrypt_encrypt($cipher , $key, $var, $mode, $iv);

var_dump($crypt_text);

$decrypt_text = mcrypt_decrypt($cipher , $key, $crypt_text, $mode, $iv);

                var_dump(utf8_decode($decrypt_text));
?>
