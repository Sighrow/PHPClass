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

function isPostRequest() {
    return ( filter_input(INPUT_SERVER, 'REQUEST_METHOD') === 'POST' );
}

function isLoggedIn() {
    
    if ( !isset($_SESSION['loggedin']) || $_SESSION['loggedin'] === false 
            ) {
            return false;
        }
        return true;
}

function viewCategories()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories ORDER BY category_id");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function viewProducts()
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products");
    
      $results = array();
        if ($stmt->execute() && $stmt->rowCount() > 0) {
            $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function createCategoryData($category)
{
    $result = false;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO categories SET category = :category");
    
    $binds = array(
                ":category" => $category,
            );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $result = true;
            }
    
    return $result;
}

function deleteFromCategories($category_id)
{
    $isDeleted = false;
    
    $db = dbconnect();
    $stmt = $db->prepare("DELETE FROM categories WHERE category_id = :category_id");
    
    $binds = array(
        ":category_id" => $category_id
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
    $isDeleted = true;
    } 
    
    return $isDeleted;
}

function updateCategoriesRow($category_id, $category)
{
   $result = false;
   
   $db = dbconnect(); 
   
   $stmt = $db->prepare("UPDATE categories SET category = :category WHERE category_id = :category_id ");
                
                $binds = array(
                    ":category_id" => $category_id,
                    ":category" => $category
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = true;
                }
    return $result;
}

function viewOneFromCategories($category_id)
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM categories where category_id = :category_id");
    
    $binds = array(
            ":category_id" => $category_id
    );
    
      $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    return $results;
}

function createProductData($product, $price)
{
    $result = false;
    $image = 'image.png';
    $category_id = 1;
    
    $db = dbconnect();
    
    $stmt = $db->prepare("INSERT INTO products SET product = :product, price = :price, category_id = :category_id, image = :image");
    
    $binds = array(
                ":product" => $product,
                ":price" => $price,
                ":category_id" => $category_id,
                ":image" => $image
            );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) 
            {
                $result = true;
            }
    
    return $result;
}

function deleteFromProducts($product_id)
{
    $isDeleted = false;
    
    $db = dbconnect();
    $stmt = $db->prepare("DELETE FROM products WHERE product_id = :product_id");
    
    $binds = array(
        ":product_id" => $product_id
    );
    
    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
    $isDeleted = true;
    } 
    
    return $isDeleted;
}

function updateProductsRow($product_id, $product, $price)
{
   $result = false;
   $image = 'image.png';
   $category_id = 1;
    
   $db = dbconnect(); 
   
   $stmt = $db->prepare("UPDATE products SET product = :product, price = :price, category_id = :category_id, image = :image WHERE product_id = :product_id ");
                
                $binds = array(
                    ":product_id" => $product_id,
                    ":product" => $product,
                    ":price" => $price,
                    ":category_id" => $category_id,
                    ":image" => $image
                );
                
                if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                   $result = true;
                }
    return $result;
}

function viewOneFromProducts($product_id)
{
    $db = dbconnect();
    
    $stmt = $db->prepare("SELECT * FROM products where product_id = :product_id");
    
    $binds = array(
            ":product_id" => $product_id
    );
    
      $results = array();
        if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
            $results = $stmt->fetch(PDO::FETCH_ASSOC);
        }
        
    return $results;
}