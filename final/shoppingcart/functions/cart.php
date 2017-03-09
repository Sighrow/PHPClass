<?php
function dbconnect() {
    $config = array(
        'DB_DNS' => 'mysql:host=localhost;port=3306;dbname=PHPClassWinter2017',
        'DB_USER' => 'root',
        'DB_PASSWORD' => ''
    );

    try {
        /* Create a Database connection and 
         * save it into the variable */
        $db = new PDO($config['DB_DNS'], $config['DB_USER'], $config['DB_PASSWORD']);
        $db->setAttribute(PDO::ATTR_EMULATE_PREPARES, false);
    } catch (Exception $ex) {
        /* If the connection fails we will close the 
         * connection by setting the variable to null */
        $db = null;
        $message = $ex->getMessage();
        include './includes/error.php';
        exit();
    }

    return $db;
}

function isLoggedIn() {
    
    if ( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false 
            ) {
            return false;
        }
        return true;
}

function getItems() {
    return array(
        array(  'id' => '1',
                'category' => '1',
                'desc' => 'Dictionary',
                'price' => 24.95
            ),
        array(  'id' => '2',
                'category' => '2',        
                'desc' => 'parachute',
                'price' => 1000
            ),
        array(  'id' => '3',
                'category' => '3', 
                'desc' => 'Songs of the Goldfish (2CD set)',
                'price' => 19.99
            ),
        array(  'id' => '4',
                'category' => '1', 
                'desc' => 'JavaScript',
                'price' => 39.95
            ),
        array(  'id' => '5',
                'category' => '2', 
                'desc' => 'BaseBall',
                'price' => 9.95
            )
    );
}

function getCategories() {
    return array(
        array(  'category_id' => '1',
                'category' => 'books'
            ),
        array(  'category_id' => '2',
                'category' => 'Sports'
            ),
        array(  'category_id' => '3',
                'category' => 'music'
            )
    );
}

function getItemsByCategory($id) {
    $items = getItems();
    $cart = [];
    foreach ($items as $product) {
      if ( $product['category'] == $id ) {
        $cart[] = $product;        
      }
    }    
    return $cart;
}

function emptyCart() {
    unset($_SESSION['cart']);
}

function startCart() {
    if ( !isset($_SESSION['cart']) ) {
      $_SESSION['cart'] = array();
    }
}

function getCart() {    
    return $_SESSION['cart']; 
}

function cartCount() {
    return count(getCart());
}

function addToCart($id) {
    $items = getItems();

    foreach ($items as $product) {
      if ( $product['id'] == $id ) {
        $_SESSION['cart'][] = $product;
        break;
      }
    }    
      
}

function getCartTotal(){
    $items = getCart();
    $total = 0;
    foreach ($items as $product) {      
        $total += $product['price'];
    }   
    return $total;
}
