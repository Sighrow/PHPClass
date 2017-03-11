<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Shopping Cart Checkout</title>
    </head>
    <body>
        <?php
            session_start();
            include './functions/cart.php';
            include './header.php';
            
            /* php processing variables */
            $action = filter_input(INPUT_POST, 'action');                      
            
            if ( $action === 'Clear Cart' ) {
                emptyCart();
            }
            
            /* View variables */
            startCart();
            $cart = getCart();
            $total = getCartTotal();
                                    
            include './templates/cart-items.html.php';
            include './templates/clear-cart.html.php';
        ?>
        
        <p><a class="btn btn-default btn-sm" href="index.php">Continue Shopping</a></p>
    </body>
</html>
