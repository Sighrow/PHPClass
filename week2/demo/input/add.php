<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        include './dbconnect.php';
        include './functions.php';
        include './crud.php';
        $results = '';

        if (isPostRequest()) 
        {
        
        $dataone = filter_input(INPUT_POST, 'dataone');
        $datatwo = filter_input(INPUT_POST, 'datatwo');
        
        $confirm = createTestData($dataone, $datatwo);
        
        if ($confirm === true)
            {
                $results = 'Data Added.';
            }
        else
            {
                $results = 'Data Not Added.';
            }
        }
        ?>

        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">            
            Data one <input type="text" value="" name="dataone" />
            <br />
            Data two <input type="text" value="" name="datatwo" />
            <br />
            Date <input type="date" value="" name="date" />
            <br />

            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
