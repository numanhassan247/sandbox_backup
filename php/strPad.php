<?php


$n = "1";
$n2 = "100";
$n3 = "10000";
$n4 = "9999999";

echo str_pad($n,4,"0",STR_PAD_LEFT);
echo "<br>";
echo str_pad($n2,4,"0",STR_PAD_LEFT);
echo "<br>";
echo str_pad($n3,4,"0",STR_PAD_LEFT);
echo "<br>";
echo str_pad($n4,4,"0",STR_PAD_LEFT);

echo "<hr>";
$n = "1";
$n2 = "100";
$n3 = "10000";
$n4 = "9999999";
echo str_pad($n,4,".",STR_PAD_RIGHT);
echo "<br>";
echo str_pad($n2,4,".",STR_PAD_RIGHT);
echo "<br>";
echo str_pad($n3,4,".",STR_PAD_RIGHT);
echo "<br>";
echo str_pad($n4,4,".",STR_PAD_RIGHT);

?>
