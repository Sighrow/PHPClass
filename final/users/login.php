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
            $errors = [];
            $result = login($email, $password);
            $welcomeid = getWelcomeId($email, $password);

            if ($email === "" || $password === ""){
                $errors[] = 'Please fill out all fields.';
            }
            if ($result === 0){
                $errors[] = 'Invalid information.';
            }
            
            if ($result != 0 && count($errors) === 0){
                $_SESSION['userid'] = $result;
                $_SESSION['loggedin'] = true;
                $_SESSION['welcomeid'] = $welcomeid;
                header('location: ../access/admin.php');
            }
        }
        
        ?>
        
        <?php include './header.php';?>
        
        <h1 style="padding-left: 15px;"> Login </h1><hr>
        <?php include './templates/error-messages.html.php'; ?>
        <?php include './templates/users-form.html.php'; ?>
       
        </div>
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid #362e5f; width: 100%; float: left;"></div>
    </body>
</html>
