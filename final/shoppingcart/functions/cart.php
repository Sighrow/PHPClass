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
    
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function getCategories() {
    
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function getItemsByCategory($id) {
    $items = getItems();
    $cart = [];
    foreach ($items as $product) {
      if ( $product['category_id'] == $id ) {
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
      if ( $product['product_id'] == $id ) {
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