<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart</title>
    </head>
    <body>
        
        <?php
        session_start();  
        include_once './header.php';
        include './functions/cart.php';
            
        if (!isLoggedIn()) {
            die(header('location: http://localhost/PHPClass/final/users/login.php'));
        }                
            /* php processing variables */
            $action = filter_input(INPUT_POST, 'action');
            $cartID = filter_input(INPUT_POST, 'id');
            $catID = filter_input(INPUT_POST, 'categoryselected');
            
            if ($catID === ""){
                $catID = NULL;
            }
            
            if ( $action === 'Buy' ) {
                addToCart($cartID);
            }
            
            if ( $action === 'Clear Cart' ) {
                emptyCart();
            }               
            
            
            /* View variables */
            startCart();
            $items = getItems();            
            $cartCount = cartCount();
            $allCategories = getCategories();
            
            
            if ( !is_null($catID) ) {
                $items = getItemsByCategory($catID);
            }
            
        ?>
        
        <div style="padding: 10px; background-color: #F9F9F9; float: left; width: 100%; border-bottom: 1px solid #DDDDDD; margin-bottom: 20px;">
            <div style="float: left; margin-left: -25px;"><?php include './templates/categories.html.php'; ?></div>
            <div style="float: right;"><?php include './templates/clear-cart.html.php'; ?></div>
            <div style="float: right;"><?php include './templates/cart-count.html.php'; ?></div>
            
        </div>
        
        <?php 
           include './templates/catalog.html.php';
        ?>
        
        <p style="margin-top: -50px; float: right; margin-right: 15px;"><a style="width: 78px;" class="btn btn-default btn-sm" href="checkout.php">Check Out</a></p>
        <div style="background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 25px solid #362e5f; width: 100%; height: 20px; margin-bottom: 1px; float: left;"></div>
    </body>
</html>
