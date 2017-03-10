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
        
        $results = '';

        if (isPostRequest()) 
        {
        
        $category = filter_input(INPUT_POST, 'category');

        
        $confirm = createCategoryData($category);
        
        if ($confirm === true)
            {
                $results = 'Category added!';
                header('location: ./admin.php?action=Categories#');
            }
        else
            {
                $results = '<b>Category not added!</b>';
            }
        }
        ?>

        <form style='padding-left: 30px' method="post" action="#">
            <?php echo $results?> <input type="text" value="" name="category" />
            <input class="btn btn-default btn-sm" style="width: 78px; height: 28px; margin-top: -3px;" type="submit" value="Add" />
        </form>
    </body>
</html>
