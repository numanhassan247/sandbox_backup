<?php session_start();
//var_dump($_SESSION); die;
require_once('../../DBconnect.php');

try{
    
      //var_dump($_POST); 
      //var_dump($_GET);
    
    if( isset($_POST["auth"]) && isset($_POST["api_key"]) ){
        
        // echo "1"; die;
        $permission = authenticate_api($_POST["api_key"]);
        //var_dump($permission); die;
        
        // if permmision set properly
        if($_POST["auth"] == "false" || $_POST['auth'] == "true"){ 
            if (isset($_GET['method']) && isset($_GET['type'])) {
                $method = $_GET['method'];
                $type = $_GET['type'];
                $genre = (isset($_GET["gender"])) ? $_GET["gender"] : FALSE;

                if ($method == "getMovies") {
                    getMovies($type, $genre, $permission);
                }
            }
        }
        else {
            throw new Exception("Pemission not set properly");
        }
        
    }
    else if(!isset($_POST["auth"]) && !isset($_POST["api_key"])){
       //echo "3"; die;
        throw new Exception("App not initialize properly");
    }
    else{
       //echo "3"; die;
        throw new Exception("unknown");
    }
    //var_dump($_POST); die;
}
catch (Exception $e){
     
     $error = $e->getMessage();
     
 }



function getMovies($type,$genre = FALSE,$permission){
    $where = "";
    if($genre){
        $where = "WHERE genre = '$genre' ";
    }
    $query = "SELECT * FROM movies ".$where;
    $r = mysql_query($query) or die(mysql_error());
    $data = array();
    $i=0;
    while($row = mysql_fetch_assoc($r)){
        $data[$i]["title"] = $row["title"];
        $data[$i]["genre"] = $row["genre"];
        $i++;
    }
    
    //var_dump($data); die;
    api_response($type , $data ,$permission);
    
    
}

function api_response($type,$data,$permission){
    
    $http_response_code = array(
        200 => 'OK',
        400 => 'Bad Request',
        401 => 'Unauthorized',
        403 => 'Forbidden',
        404 => 'Not Found'
    );
    if($permission == 2){
        // Set HTTP Response
        echo "User not logged in <a href='api_permission.php'>Permission</a>"; die;
        
    }
    else if (isset($type)) {
        // Set HTTP Response
        header('HTTP/1.1 ' . 200 . ' ' . $http_response_code[200] );
        switch ($type) {
            
            case "xml":
                if ($permission == 1) {
                    // generate xml response 
                    // Set HTTP Response Content Type
                    
                    header('Content-Type: application/xml; charset=utf-8');

                    // Format data into an XML response (This is only good at handling string data, not arrays)
                    $response = '<?xml version="1.0" encoding="UTF-8"?>' . "\n" .
                            '<response>' . "\n";
                    if (count($data) > 0) {
                        foreach ($data as $movie) {
                            $response .= "\t" . '<movie>' .
                                    "\t\t" . '<title>' . $movie['title'] . '</title>' . "\n" .
                                    "\t\t" . '<genre>' . $movie['genre'] . '</genre>' . "\n" .
                                    '</movie>' . "\n";
                        }
                    } else {
                        $response .= "<movie>No movie Found</movie>";
                    }
                    $response .= '</response>';
                }
                break;
                
            case "json":
                if ($permission == 1) {
                    // generate json response 
                    // Set HTTP Response Content Type
                    header('Content-Type: application/json; charset=utf-8');

                    // Format data into a JSON response
                    $response = json_encode($data);
                }
                break;
        }
        
        //var_dump($response); die;
        echo $response;
    } 
    else {
        // Set HTTP Response
        header('HTTP/1.1 ' . 400 . ' ' . $http_response_code[400]);
    }
    
}

function authenticate_api($api_key){
    
    $key = mysql_real_escape_string($api_key);
    $q = " SELECT * FROM apps WHERE `key` = '$api_key' ";
    $r = mysql_query($q) or die(mysql_error());
    $app = mysql_fetch_assoc($r);
    $n = mysql_num_rows($r);
    if($n == 1){
        // app exist 
        $app_id = $app['id'];
        
        if (isset($_SESSION["id"])) { 
            
            $user_id = $_SESSION["id"];
        }
        else {  
            $user_id = 0;
            echo "User not logged in <a href='login.php'>Login</a>"; die;
            //echo '<script>window.loacation = "login.php"; </script>'; 
            
            //header("Location: http://localhost/sandbox/WebService/restful/login.php"); 
            
        }
        
        
        $q2 = "SELECT * FROM app_permission WHERE app_id = '$app_id' AND user_id = '$user_id' ";
        $r2 = mysql_query($q2) or die(mysql_error());
        $n2 = mysql_num_rows($r2); 
        if($n2 == 1){
            return 1;
        }
        else {
            return 2;
        }
    }else{
        // app don't exist 
        return 0;
    }
    
}

?>
