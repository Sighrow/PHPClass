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
        include './functions.php';
        
        $email = filter_input(INPUT_POST, 'email');
        $fullname = filter_input(INPUT_POST, 'fullname');
        
        $errors = array();
        
        if (isPostRequest())
        {
            if ( empty($email) ) {
                $errors[] = 'E-mail is not valid';
            }

            if ( empty($fullname) ) {
                $errors[] = 'Name is not valid';
            }

            if ( count($errors) === 0) {

            }
        }
        ?>
        
         <?php include './templates/error-messages.php'; ?>
        
        <form method="POST" action="#">
            
            Email:<input type="text" name="email" value="" /><br>
            Name:<input type="text" name="fullname" value="" /><br>    
            <br>
            <input type="submit" value="submit" />
        </form>
        
    </body>
</html>
