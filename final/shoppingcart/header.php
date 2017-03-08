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
        
        <div style="float: left;"><img src="../access/images/cartbanner.png" alt="Cart"></img></div><div style="margin-top: -20px; width: 100%; height:100px; background-color: #362e5f; color: white;"><h1 style="padding-top: 30px; padding-left: 30px;">Shopping Cart</h1></div>
        
        <div style="padding: 15px; border-bottom: 3px solid #362e5f; background-color: #ededed; float: left; width: 100%;">
            <a class="btn btn-default btn-sm" href="../access/admin.php">Admin Panel</a>
            <a class="btn btn-default btn-sm" href="index.php">Shopping Cart</a>
            
            <?php  

            $logout = filter_input(INPUT_GET, 'logout');

            if ( $logout == 1 ) {
               $_SESSION['loggedin'] = false;
            }

            if ( isset($_SESSION['loggedin']) &&
                    $_SESSION['loggedin'] === true ) {
                
               echo '<div style="text-align: right; float: right;">'
                  . 'Hello, <b>'?><?php echo $_SESSION['username'];?><?php echo '!</b>'
                  . '<a class="btn btn-default btn-sm" style="margin-left: 10px;" href="?logout=1">Logout</a>'
                  . '</div>';
            } ?>

        </div>
    </body>
</html>
