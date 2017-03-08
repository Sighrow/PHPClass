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
        include './header.php';
        include './functions.php';
        $results = '';

        $product = filter_input(INPUT_POST, 'product');
        $price = filter_input(INPUT_POST, 'price');
        
        
        
         include './uploading/upload-function.php';
            
            if (count($_FILES)){
                
                try{ 
                    $fileName = uploadImage('image');       
                    
                } catch (RuntimeException $e) {
                    $fileName = filter_input(INPUT_POST, 'oldimage');//upload only
                }
                echo '<p>Image ' . $fileName . ' Uploaded</p>';
            }
        
        if (isPostRequest()) 
        {
        
        $image = $fileName;
        
        $confirm = createProductData($product, $price, $image);
        
        if ($confirm === true)
            {
                $results = 'Data Added!';
                header('location: ./admin.php?action=Products#');
            }
        else
            {
                $results = 'Data Not Added.';
            }
        }
        ?>
        
        <h2 style='padding-left: 29px'><?php echo $results; ?></h2>

        <div style='margin-top: 20px; float: left;'>    
        <form enctype="multipart/form-data" style='padding-left: 30px' method="post" action="#">
            <b>New Product:</b>
            <br><br>
            Product Name:<br><input type="text" value="" name="product" />
            <br><br>
            Price:<br><input type="text" value="" name="price" />
            <br><br>
            <?php include './uploading/upload-form.php' ?>
            <input class="btn btn-default btn-sm" type="submit" value="Create" /> <a class="btn btn-default btn-sm" href="./admin.php?action=Products#">Cancel</a> <b><?php echo $results ?></b>
        </form>
        </div>
    </body>
</html>
