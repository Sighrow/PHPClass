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
       
            include './functions.php';
            
            $db = dbconnect();
            
            $result = '';
            if (isPostRequest()) {
                $category_id = filter_input(INPUT_POST, 'category_id');
                $category = filter_input(INPUT_POST, 'category');
                
                $updated = updateCategoriesRow($category_id, $category);
                if ($updated){
                    $result = 'Category updated';
                } else {
                    $result = 'Category not updated';
                }
            } else {
                $category_id = filter_input(INPUT_GET, 'category_id');
                
                if ( !isset($category_id) ) {
                    exit('Category not found');
                }
                
                
                $row = viewOneFromCategories($category_id);
                $category = $row['category'];
            }
        
        ?>
        
        <h2 style='padding-left: 29px'><?php echo $result; ?></h2>
                   
        <form style='padding-left: 30px' method="post" action="#">
            <b>Update Category:</b>
            <br><br>
            Category:<br><input type="text" value="<?php echo $category ?>" name="category" />
            <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" /> 
            <input type="submit" value="Update" />
        </form>
        
    </body>
</html>
