<?php session_start(); 

if (isset($_SESSION["id"])) { 
            
            $user_id = $_SESSION["id"];
        }
        else {  
            header("Location: http://localhost/sandbox/WebService/restful/login.php"); 
        }
?>

This app require Permission
<a href="api_permission.php?grant_per=1">Grant Permission</a>
<?php
if(isset($_GET['grant_per']) && $_GET['grant_per'] == 1){
    $q = "INSERT into app_permission ('user_id','app_id') VALUES ('1','1') ";
header('Location: http://localhost/sandbox/WebService/restful/getMovies.xml');
}
?>
