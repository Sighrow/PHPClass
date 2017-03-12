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
        
        if (!$image)
        {
            $image='6fb0013ff4ba866ebbfe615579d27aa7dfbf8afa.png';
        }
        
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
            Name:<br><input type="text" value="" name="product" />
            <br><br>
            Price:<br><input type="text" value="" name="price" />
            <br><br>
            Image:<div style="margin-left: -11px;"><?php include './uploading/upload-form.php' ?></div><br><br>
            <input class="btn btn-default btn-sm" type="submit" style="width: 73px;" value="Create" /> <a style="width: 73px;" class="btn btn-default btn-sm" href="./admin.php?action=Products#">Cancel</a> <b><?php echo $results ?></b>
        </form>
        </div>
        
        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid #362e5f; width: 100%; float: left;"></div>
    </body>
</html>
