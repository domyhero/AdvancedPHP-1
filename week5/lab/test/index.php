<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        
        /* Run this file and go to
         * go to test/cars/5
         */
        
        $endpoint = filter_input(INPUT_GET, 'endpoint');
        
        echo $endpoint;
        ?>
    </body>
</html>
