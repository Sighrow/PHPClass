<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();
        
        include_once './header.php';
        include_once './functions.php';
        
        if ( !isLoggedIn() ) {
            die(header('location: http://localhost/PHPClass/final/users/login.php'));
            
        }
        
        
        ?>
        
        <h1>Admin Page</h1>
    </body>
</html>
