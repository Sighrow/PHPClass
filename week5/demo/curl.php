<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        /*
         * http://php.net/manual/en/curl.examples.php
         * http://php.net/manual/en/curl.examples-basic.php
         */

        $output = getPageContent('example.com');
        
        function getPageContent($url)
        {
        
        // create curl resource 
        $curl = curl_init(); 

        // set url 
        curl_setopt($curl, CURLOPT_URL, $url); 

        //return the transfer as a string 
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, 1); 

        // $output contains the output string 
        $output = curl_exec($curl); 
        
        // close curl resource to free up system resources 
        curl_close($curl);  
            
            return $output;
        }
        
        
        
        ?>
        
        <textarea><?php echo  $output; ?></textarea>
    </body>
</html>
