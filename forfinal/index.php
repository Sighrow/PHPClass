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
                
                echo $email;
                echo $fullname;
                
            }
        }
        ?>
        
        <?php include './templates/error-messages.php'; ?>
        
        <form method="POST" action="#">
            
            Email:<input type="text" name="email" value="" /><br>
            Name:<input type="text" name="fullname" value="" /><br>    
            <br>
            <input class="btn-default" type="submit" value="Submit" />
        </form>
        
    </body>
</html>
