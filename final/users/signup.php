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
        
        if (isPostRequest() ){
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            
            $userExist = userExist ($email);
            $errors = [];
            
            if ( filter_var($email, FILTER_VALIDATE_EMAIL) === false ) {
                $isValid = false;
                $errors[] = "Email invalid.";
            }
            
            if ( !isset($isValid)){
                $isValid = true;
            }
            
            if ($email === "" || $password === ""){
                $errors[] = 'Please fill out all fields.';
            }
            
            if (strlen($password) < 5){
                $errors[] = 'Password must be longer than 5 characters.';
            }
            
            if ($userExist){
                $errors[] = 'Email already exists.';
            }
           
            
            if (count($errors) === 0 && $isValid === true ){
                $result = signUp($email, $password);
            
            
                if ($result === true){
                    header('Location: login.php');
                }
                else{
                    $errors[] = 'Invalid.';
                }
            }
        }
        
        ?>
        
        <?php include './header.php';?>
        
        <h1 style="padding-left: 15px;"> Sign Up </h1><hr>
        
        <?php include './templates/error-messages.html.php'; ?>
        <?php include './templates/users-form.html.php'; ?>
       
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid #362e5f; width: 100%; float: left;"></div>
    </body>
</html>
