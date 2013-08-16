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
        <h2>Projects </h2>
        <ul>
        <?php
            $dirs = array_filter(glob('*'), 'is_dir');
                
            
            foreach($dirs as $dir)
            {
                if($dir != "nbproject")
                { ?>
                    <li> <a href="./<?php echo $dir ?>"><?php echo $dir ?> </a></li>
                <?php 
                
                }
               
            }
        ?>
        </ul>
    </body>
</html>
