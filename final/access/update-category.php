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
            
            $errorimage = "<img src='./images/erroricon.png' alt='Error' />";
            $db = dbconnect();
            $result = "";
            $errors = [];
            $category_id = filter_input(INPUT_GET, 'category_id');
            
            $row = viewOneFromCategories($category_id);
            $category1 = $row['category'];
            
            if (isPostRequest()) {
                $category_id = filter_input(INPUT_POST, 'category_id');
                $category = filter_input(INPUT_POST, 'category');
                
            if ($category === "")
            {
                $errors[] = "Category cannot be blank.";
            }
            
            if ($category === $category1){
                
                $errors[] = 'Data has not changed.';
            }

            if (count ($errors) === 0){
                 $updated = updateCategoriesRow($category_id, $category);
                if ($updated){
                    header('location: ./admin.php?action=Categories#');
                } else {
                    $errors[] = 'This category already exists.';
                }
            } 
            }
                
               else {
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
            <input class="btn btn-default btn-sm" type="submit" value="Update" /> <a class="btn btn-default btn-sm" href="./admin.php?action=Categories#">Cancel</a> <b><?php if (count ($errors) > 0 ){echo $errorimage; echo '&nbsp'; echo $errors[0];}?></b>
        </form>
            
        </div>
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid #362e5f; width: 100%; float: left;"></div>
    </body>
</html>
