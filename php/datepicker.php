<!doctype html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <title>jQuery UI Datepicker - Default functionality</title>
        <link rel="stylesheet" href="http://code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css" />
        <script src="http://code.jquery.com/jquery-1.9.1.js"></script>
        <script src="http://code.jquery.com/ui/1.10.3/jquery-ui.js"></script>
        
        <script>
            $(function() {
                $("#datepicker").datepicker();
            });
        </script>
    </head>
    <body>
        <form method="post" action="">
            <p>Date: <input type="text" name="date" id="datepicker" /></p>
            <input type="submit" name="submit" value="submit">
        </form>
        <form method="post" action="">
            <p>Date: <input type="text" name="datetime" /></p>
            <input type="submit" name="submit2" value="submit2">
        </form>
        <?php 
        if(isset($_POST['submit'])){
            echo $date =  $_POST["date"];
            echo "<br>"; 
            $datetime = strtotime($date);  echo "<br>";
            
            
            date("F j, Y, g:i a",$datetime);
            
            echo "<br>"; 
            echo "<br>"; 
            echo date("F j, Y, g:i a",strtotime("+1 day",$datetime));
            
        }
        if(isset($_POST["submit2"])){
            $datetime = $_POST["datetime"];
            date("F j, Y, g:i a",$datetime);
            
            echo "<br>"; 
            echo strtotime("+1 day",$datetime);
            echo "<br>"; 
            echo date("F j, Y, g:i a",strtotime("+1 day",$datetime));
        }
?>
        
        
        
        
        
    </body>
</html>
