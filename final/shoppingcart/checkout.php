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
            $total = getCartTotal(); ?>
                      
        <div style="padding: 10px; background-color: #F9F9F9; float: left; width: 100%; height: 52px; border-bottom: 1px solid #DDDDDD; margin-bottom: 20px;">
        <div style="float: right">
        <?php 
        include './templates/clear-cart.html.php';?></div></div>
        <?php include './templates/cart-items.html.php';?>
        
        <p style="float: right;"><a style="margin-top: -50px; float: right; margin-right: 15px;"><a style="width: 78px;" class="btn btn-default btn-sm" href="index.php">Continue</a></p>
    </body>
</html>
