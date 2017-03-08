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
            
            if ( $action === 'Empty cart' ) {
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
            
            include './templates/categories.html.php';
            include './templates/cart-count.html.php';
            include './templates/clear-cart.html.php';
            include './templates/catalog.html.php';
        ?>
        
        <p><a href="checkout.php">CheckOut</a></p>
    </body>
</html>
