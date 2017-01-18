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
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';
        
        $id = filter_input(INPUT_GET, 'id');
        $results = viewOneFromTest($id);
      
        ?>
        
      <table>
            <thead>
                <tr>
                    <th>ID</th>
                    <th>Data One</th>
                    <th>Data Two</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>
            
           
                <tr>
                    <td><?php echo $results['id']; ?></td>
                    <td><?php echo $results['dataone']; ?></td>
                    <td><?php echo $results['datatwo']; ?></td>
                    <td><a href="Update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a href="Delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>      
                </tr>
        </table>
    </body>
</html>
