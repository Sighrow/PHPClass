<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
           <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        // put your code here
        ?>
        
        <div style="float: left;"><img src="images/cartbanner.png" alt="Cart"></img></div><div style="margin-top: -20px; width: 100%; height:100px; background-color: #362e5f; color: white;"><h1 style="padding-top: 30px; padding-left: 30px;">Shopping Cart</h1></div>
        
        <div style="padding: 15px; border-bottom: 3px solid #362e5f; background-color: #ededed;">
           
            <?php if ( strpos($_SERVER['REQUEST_URI'], 'login.php') != false){?>
            <a class="btn btn-default btn-sm" href="signup.php">Sign up</a>
            <?php } ?>
            
            <?php if ( strpos($_SERVER['REQUEST_URI'], 'signup.php') != false){?>
            <a class="btn btn-default btn-sm" href="login.php">Log in</a>
            <?php } ?>
            
        </div>
    </body>
</html>
