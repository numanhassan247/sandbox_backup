<?php

    $chars = "abcdefghijkmnopqrstuvwxyz023456789"; 
    
    $length = 10; // length of code
    $code = "";
    for($i=0;$i<$length;$i++){
        
        $rand_num = rand(0,33);
        $tmp = substr($chars, $rand_num, 1);
        $code = $code . $tmp;
        
    } 
    
    echo $code;

    
?>
