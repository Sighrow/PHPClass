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
            
            session_start();

            include_once './header.php';
            include './functions.php';
            
            $db = dbconnect();
            
            $result = '';
            if (isPostRequest()) {
                $product_id = filter_input(INPUT_POST, 'product_id');
                $product = filter_input(INPUT_POST, 'product');
                $price = filter_input(INPUT_POST, 'price');
                
                $updated = updateProductsRow($product_id, $product, $price);
                if ($updated){
                    $result = 'Product updated.';
                    header('location: ./admin.php?action=Products#');
                } else {
                    $result = 'Product not updated!';
                }
            } else {
                $product_id = filter_input(INPUT_GET, 'product_id');
                
                if ( !isset($product_id) ) {
                    exit('Product not found');
                }
                
                
                $row = viewOneFromProducts($product_id);
                $product = $row['product'];
            }
        
        ?>
   
        <div style='margin-top: 20px; float: left;'>    
        <form style='padding-left: 30px' method="post" action="#">
            <b>Update Product:</b>
            <br><br>
            <input type="text" value="<?php echo $product ?>" name="product" />
            <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" /> 
            <input class="btn btn-default btn-sm" type="submit" value="Update" /> <a class="btn btn-default btn-sm" href="./admin.php?action=Products#">Cancel</a> <b><?php echo $result ?></b>
        </form>
            
        </div>
        
    </body>
</html>