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
            if (isPostRequest()) {
                $category_id = filter_input(INPUT_POST, 'category_id');
                $category = filter_input(INPUT_POST, 'category');
                
                $updated = updateCategoriesRow($category_id, $category);
                if ($updated){
                    $result = 'Category updated.';
                    header('location: ./admin.php?action=Categories#');
                } else {
                    $result = 'Category not updated!';
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
   
        <div style='margin-top: 20px; float: left;'>    
        <form style='padding-left: 30px' method="post" action="#">
            <b>Update Category:</b>
            <br><br>
            <input type="text" value="<?php echo $category ?>" name="category" />
            <input type="hidden" value="<?php echo $category_id; ?>" name="category_id" /> 
            <input class="btn btn-default btn-sm" type="submit" value="Update" /> <a class="btn btn-default btn-sm" href="./admin.php?action=Categories#">Cancel</a> <b><?php echo $result ?></b>
        </form>
            
        </div>
        
    </body>
</html>
