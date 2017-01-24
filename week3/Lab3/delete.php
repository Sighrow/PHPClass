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

        
            $id = filter_input(INPUT_GET, 'id'); 
            $isDeleted = deleteFromCorps($id);

        
        ?>
        
        <h1 style='padding-left: 30px'>Corporation Database</h1>
        <h2 style='font-size: 15px' style='padding-left: 30px'><a style='padding-left: 30px' href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view-all.php">Previous</a><hr></h2>
        
        <h2 style='padding-left: 30px'> Record <?php echo $id; ?>
         <?php if ( !$isDeleted ): ?> 
          Not
        <?php endif; ?>
        Deleted</h2>
        
        
        
    </body>
</html>
