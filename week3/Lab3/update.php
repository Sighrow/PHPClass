<!DOCTYPE html>
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
            
            $db = getDatabase();
            
            $result = '';
            if (isPostRequest()) {
                $id = filter_input(INPUT_POST, 'id');
                $corp = filter_input(INPUT_POST, 'corp');
                $email = filter_input(INPUT_POST, 'email');
                $zipcode = filter_input(INPUT_POST, 'zipcode');
                $owner = filter_input(INPUT_POST, 'owner');
                $phone = filter_input(INPUT_POST, 'phone');
                
                $updated = updateCorpsRow($id, $corp, $email, $zipcode, $owner, $phone);
                if ($updated){
                    $result = 'Record updated';
                } else {
                    $result = 'Record not updated';
                }
            } else {
                $id = filter_input(INPUT_GET, 'id');
                
                if ( !isset($id) ) {
                    exit('Record not found');
                }
                
                
                $row = viewOneFromCorps($id);
                $corp = $row['corp'];
                $email = $row['email'];
                $zipcode = $row['zipcode'];
                $owner = $row['owner'];
                $phone = $row['phone'];
            }
        
        ?>
        <h1 style='padding-left: 30px'>Corporation Database</h1>
        <h2 style='font-size: 15px' style='padding-left: 30px'><a style='padding-left: 30px' href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view-all.php">Previous</a><hr></h2>
        
        <h2 style='padding-left: 29px'><?php echo $result; ?></h2>
                   
        <form style='padding-left: 30px' method="post" action="#">
            <b>Update Corporation Information:</b>
            <br><br>
            Corporation Name:<br><input type="text" value="<?php echo $corp ?>" name="corp" />
            <br><br>
            E-mail:<br><input type="text" value="<?php echo $email ?>" name="email" />
            <br><br>
            Zip Code:<br><input type="text" value="<?php echo $zipcode ?>" name="zipcode" />
            <br><br>
            Owner:<br><input type="text" value="<?php echo $owner ?>" name="owner" />
            <br><br>
            Phone:<br><input type="text" value="<?php echo $phone ?>" name="phone" />
            <br><br>
            <input type="hidden" value="<?php echo $id; ?>" name="id" /> 
            <input type="submit" value="Update" />
        </form>
        
    </body>
</html>
