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
        
        $id = filter_input(INPUT_GET, 'id');
        $row = viewOneFromCorps($id);
      
        ?>

         <table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>ID</th>
                    <th>Corporation</th>
                    <th>Date</th>
                    <th>E-mail</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
      
        <h1 style='padding-left: 30px'>Corporation Database</h1>
        <h2 style='font-size: 15px' style='padding-left: 30px'><a style='padding-left: 30px' href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view-all.php">Previous</a><hr></h2>
        
                <tr>
                    <td style='padding-left: 30px'><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo date("F j, Y, g:i a",strtotime($row['incorp_dt'])); ?></td>                        
                    <td><?php echo $row['email']; ?></td>                        
                    <td><?php echo $row['zipcode']; ?></td>                        
                    <td><?php echo $row['owner']; ?></td>                        
                    <td><?php echo $row['phone']; ?></td>
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr>
        </table>
    </body>
</html>
