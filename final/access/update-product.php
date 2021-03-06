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
            
            include './uploading/upload-function.php';
            
            $ID = filter_input(INPUT_GET, 'product_id');
            $row = viewOneFromProducts($ID);
            $oldimage = $row['image'];
            $allCategories = getCategories();
            
            if (isPostRequest()) {
                
                $product_id = filter_input(INPUT_POST, 'product_id');
                $product = filter_input(INPUT_POST, 'product');
                $price = filter_input(INPUT_POST, 'price');
                $category_id = filter_input(INPUT_POST, 'categoryselected');
                
                if (count($_FILES)){
                
                try{ 
                    $fileName = uploadImage('image');       
                    
                } catch (RuntimeException $e) {
                    $fileName = filter_input(INPUT_POST, 'oldimage');//upload only
                }
            }
              
            $image = $fileName;
            
            if ($image == NULL){
                $image = $oldimage;
            }
                $updated = updateProductsRow($product_id, $category_id, $product, $price, $image);
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
                $price = $row['price'];
                $category_id = $row['category_id'];
            }
        
        ?>
   
        <div style='margin-top: 20px; float: left;'>    
        <form enctype="multipart/form-data" style='padding-left: 30px' method="post" action="#">
            <b>Update Product:</b><br><br>
            Category:<br><select style="width: 270px; height: 26px;" name="categoryselected">
                <?php foreach ($allCategories as $category): ?>
                    <option value="<?php echo $category['category_id']; ?>"
                    <?php if (intval($category_id) === $category['category_id']) : ?>
                                selected="selected" <?php endif; ?>>
                                <?php echo $category['category']; ?>
                    </option>
                <?php endforeach; ?>
            </select>
            <br><br>
            Name:<br><input type="text" value="<?php echo $product ?>" name="product" />
            <br><br>
            Price:<br><input type="text" value="<?php echo $price ?>" name="price" />
            <br><br>
            Image:<div style="margin-left: -11px;">
            <input class="btn btn-link btn-sm" name="image" type="file" />            
       
            </div><br><br>
            <input type="hidden" value="<?php echo $product_id; ?>" name="product_id" />
            <input class="btn btn-default btn-sm" type="submit" style="width: 73px;" value="Update" /> <a style="width: 73px;" class="btn btn-default btn-sm" href="./admin.php?action=Products#">Cancel</a> <b><?php echo $result ?></b>
        </form>
        </div>
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid #362e5f; width: 100%; float: left;"></div>
    </body>
</html>
            
