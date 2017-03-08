<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        
        session_start();

        include_once './header.php';
        include_once './functions.php';
        
        $action = filter_input(INPUT_GET, 'action');

        if (!isLoggedIn()) {
            die(header('location: http://localhost/PHPClass/final/users/login.php'));
        }

        ?>
        

        <div style="padding: 10px; background-color: #F9F9F9; float: left; width: 100%; border-bottom: 1px solid #DDDDDD;">
        <form action="#" method="get">
            <input style="width: 100px; margin-left: 5px;" class="btn btn-default btn-xs" type="submit" name="action" value="Categories">
            <input style="width: 100px;" class="btn btn-default btn-xs" type="submit" name="action" value="Products">
        </form>
        </div>
        
        <?php
        
         if( $action === 'Categories' ) 
            {
                include './view-categories.php';
            }
         if( $action === 'Products' )
            {
                include './view-products.php';
            }
         if( !$action )
         {
             ?><div style="float: left; width: 100%;"><h2 style="padding: 13px;">Please select which data to edit. </h2><hr></div><?php
         }
            
        ?>


    </body>
</html>
