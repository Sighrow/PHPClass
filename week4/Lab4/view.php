<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Corporation Database</title>
         <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        
           include_once './functions/dbconnect.php';
           include_once './functions/dbData.php';
            
           $results = getAllCorpsData();
           
           $action = filter_input(INPUT_GET, 'action');
           $order = filter_input(INPUT_GET, 'order');
           $columnOrder = filter_input(INPUT_GET, 'columnOrder');
           $search = filter_input(INPUT_GET, 'search');
           $columnSearch = filter_input(INPUT_GET, 'columnSearch');
          
            if ( $action === 'Submit1' ) 
            {
                $results = orderCorps($columnOrder, $order);
            }
            if ( $action === 'Submit2' )
            {
                $results = searchCorps($columnSearch, $search);
            }
            
        ?>
        
        <div><?php include './includes/header.php'; ?></div>
        <div>
        <div style="float: left"><?php include './includes/form1.php'; ?></div>
        <div><?php include './includes/form2.php'; ?></div>
        </div>
        <div><?php include './includes/show-corps-results.html.php'; ?></div>
        
    </body>
</html>
