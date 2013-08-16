<?php
    $user = "root"; 
    $pass = "";
    
    // Create connection
    $con = mysql_connect("localhost", $user, $pass);

    // Check connection
    if($con){
        mysql_select_db("test");
    }
    else{
        die("error connecting DB ");
    }
    
?>
