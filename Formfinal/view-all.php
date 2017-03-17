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

<!-- Latest compiled and minified JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>
    </head>
    <body>
        <?php
        
        include './dbconnect.php';
        include './functions.php';
        
        $results = viewAllFromAccount();
      
        ?>

     <div style="float: left; width: 100%; height: 75px; background-color: black; margin-bottom: 15px;">
         <div style="float: left; height: 50px; padding-left: 15px;">
             <h2 style="color: white; height: 50px;">Account Sign-Up</h2>
         </div>
         <div style="float: right; padding-right: 15px; margin-top: 25px;">
             <div style="float: left; border-left: 3px solid white; padding-left: 5px; padding-right: 5px;">
                 <a style="color: white;" href="form-1.php">Add Data</a>
             </div>
             <div style="float: left; border-left: 3px solid white; padding-left: 5px; padding-right: 5px;">
                 <a style="color: white;" href="view-all.php">View Data</a>
             </div>
         </div>
     </div>
        
         <table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>ID</th>
                    <th>E-mail:</th>
                    <th>Phone:</th>
                    <th>Recommended by:</th>
                    <th>Contact via:</th>
                    <th>Comments:</th>
                </tr>
            </thead>
           
            <?php foreach ($results as $row): ?>
                <tr>
                    <td style='padding-left: 30px'><?php echo $row['id']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><?php echo $row['heard']; ?></td>
                    <td><?php echo $row['contact']; ?></td>
                    <td><?php echo $row['comments']; ?></td>
                </tr> 
            <?php endforeach; ?>
        </table>
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid black; width: 100%; float: left;"></div>
    </body>
</html>
