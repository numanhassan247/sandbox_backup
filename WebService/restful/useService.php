<?php
session_start();

    $api_key = "123asd123";

    $url = "http://localhost/sandbox/WebService/restful/getMovies.xml";  
      
    $post_data = array (  
        "auth" => "true",
        "api_key" => $api_key,  
    );  
    $strCookie = 'PHPSESSID=' . $_COOKIE['PHPSESSID'] . '; path=/';
 
    session_write_close(); 
    
    $ch = curl_init();  

    curl_setopt($ch, CURLOPT_URL, $url);  
      
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);  
    // we are doing a POST request  
    curl_setopt($ch, CURLOPT_POST, 1);  
    // adding the post variables to the request  
    curl_setopt($ch, CURLOPT_POSTFIELDS, $post_data);  
    
    curl_setopt( $ch, CURLOPT_COOKIE, $strCookie ); 
    
    $response = curl_exec($ch);  
      
    curl_close($ch);  
      
    echo $response;  



?>
