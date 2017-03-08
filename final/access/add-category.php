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
        $results = '';

        if (isPostRequest()) 
        {
        
        $category = filter_input(INPUT_POST, 'category');

        
        $confirm = createCategoryData($category);
        
        if ($confirm === true)
            {
                $results = 'Category added!';
            }
        else
            {
                $results = 'Category not added.';
            }
        }
        ?>
    
        <h2 style='padding-left: 29px'><?php echo $results; ?></h2>

        <form style='padding-left: 30px' method="post" action="#">
            <b>Enter new category:</b>
            <br><br>
            Category:<br><input type="text" value="" name="category" />
            <input type="submit" value="Add" />
        </form>
    </body>
</html>
