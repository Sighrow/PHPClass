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
        include './dbconnect.php';
        include './functions.php';
        include './crud.php';
        $results = '';

        if (isPostRequest()) 
        {
        
        $firstname = filter_input(INPUT_POST, 'firstname');
        $lastname = filter_input(INPUT_POST, 'lastname');
        $dob = filter_input(INPUT_POST, 'dob');
        $height = filter_input(INPUT_POST, 'height');
        
        $confirm = createActorsData($firstname, $lastname, $dob, $height);
        
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
        
        <h1>Actor Database</h1>
        <h2 style='font-size: 15px'><a href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view.php">View Data</a></h2>
        
        <h1><?php echo $results; ?></h1>

        <form method="post" action="#">
            <b>Enter Actor's Information...</b>
            <br><br>
            First Name: <input type="text" value="" name="firstname" />
            <br><br>
            Last Name: <input type="text" value="" name="lastname" />
            <br><br>
            Date of Birth: <input type="date" value="" name="dob" />
            <br><br>
            Height: <input type="text" value="" name="height" />
            <br><br>
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
