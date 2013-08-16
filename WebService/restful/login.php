<?php session_start(); ?>

<form action="#" method="post">
    <input type="text" name="user">
    <input type="password" name="pass">
    
    <input name="submit" type="submit" value="Submit">
</form>
<?php

if( isset($_POST['submit']) ){
    
    
    require_once('../../DBconnect.php');
    
    $user = $_POST['user']; 
    $pass = $_POST['pass']; 
    $q2 = "SELECT  * FROM user WHERE pass = '$pass' AND user = '$user'  ";
    $r2 = mysql_query($q2) or die(mysql_error());
    $n2 = mysql_num_rows($r2);
    $row = mysql_fetch_assoc($r2);
    var_dump($row);
    if($n2 == 1){
        $_SESSION['id'] = $row["id"];
        header('Location: http://localhost/sandbox/WebService/restful/useService.php');
    } 
    
    
}
?>
