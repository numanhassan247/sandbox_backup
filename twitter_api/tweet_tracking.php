<!--
To change this template, choose Tools | Templates
and open the template in the editor.
-->
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>
        <pre>
            <?php
            // 1. initialize  
            $ch = curl_init();

            // 2. set the options, including the url  
            curl_setopt($ch, CURLOPT_URL, "https://userstream.twitter.com/1.1/user.json");
            curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
            
            curl_setopt($ch, CURLOPT_USERPWD, "NumanHassan2:numan2013"); 
            // 3. execute and fetch the resulting HTML output  
            $output = curl_exec($ch);

            // 4. free up the curl handle  
            if ($output === FALSE) {

                echo "cURL Error: " . curl_error($ch);
            }
            else {
                echo $output;
            }
            curl_close($ch);

            

            
            ?>
        </pre>
    </body>
</html>
