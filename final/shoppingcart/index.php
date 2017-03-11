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
            $catID = filter_input(INPUT_GET, 'cat');
            
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
        
        <div style="padding: 10px; background-color: #F9F9F9; float: left; width: 100%; border-bottom: 1px solid #DDDDDD;">
            <div style="float: left;"><?php include './templates/categories.html.php'; ?></div>
            <div style="float: next;"><?php include './templates/cart-count.html.php'; ?></div>
            <div style="float: right;"><?php include './templates/clear-cart.html.php'; ?></div>
        </div>
        
        <?php
            
            
            
            
            
            include './templates/catalog.html.php';
        ?>
        
        <p><a href="checkout.php">CheckOut</a></p>
    </body>
</html>
