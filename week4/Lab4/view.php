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
        
        include './dbconnect.php';
        include './functions.php';
        
        $results = viewAllFromCorps();
      
           $column = 'datatwo';
           $action = filter_input(INPUT_POST, 'action');
           $dataone = filter_input(INPUT_POST, 'dataone');
           $datatwo = filter_input(INPUT_POST, 'datatwo');
          
            if ( $action === 'Submit1' ) 
            {
 
            }
            if ( $action === 'Submit2' )
            {
                $results = searchTest($column, $dataone);
            }
        
        ?>
  
        <?php include './includes/header.php'; ?>
        <?php include './includes/form1.php'; ?>
        <?php include './includes/form2.php'; ?>
        <?php include './includes/show-data.php'; ?>
        
    </body>
</html>
