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
        include './functions/dbconnect.php';
        include './functions/until.php';
        include './functions/users.php';
        
        if (isPostRequest() ){
            $email = filter_input(INPUT_POST, 'email');
            $password = filter_input(INPUT_POST, 'pass');
            
            $userExist = userExist ($email);
            $errors = [];
            
            if ($userExist){
                $errors[] = 'Email already exists.';
            }
            
              //To-do: Validation.
            
            if (count($errors) === 0 ){
                $result = signUp($email, $password);
            
            
                if ($result === true){
                    header('Location: login.php');
                }
                else{
                    //To-do: Show Error Message.
                }
            }
        }
        
        ?>
        
        
        <h1> Sign Up </h1>
        
        <?php include './templates/error-messages.html.php'; ?>
        <?php include './templates/users-form.html.php'; ?>
        
    </body>
</html>
