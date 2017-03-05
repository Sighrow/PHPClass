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
    </head>
    <body>
        <?php
        session_start();
        
        include './functions/dbconnect.php';
        include './functions/until.php';
        include './functions/users.php';
        
        if (isPostRequest()){
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            
            $result = login($email, $password);
            $username = getUsername($email, $password);
            if ($result != 0){
                $_SESSION['userid'] = $result;
                $_SESSION['loggedin'] = true;
                $_SESSION['username'] = $username;
                header('location: ../access/admin.php');
            }
        }
        
        ?>
        
        <?php include './header.php';?>
        
        <h1 style="padding-left: 15px;"> Login </h1><hr>
       
        <?php include './templates/users-form.html.php'; ?>
       
        </div>
    </body>
</html>
