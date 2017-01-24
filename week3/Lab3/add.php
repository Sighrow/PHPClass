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
        $results = '';

        if (isPostRequest()) 
        {
        
        $corp = filter_input(INPUT_POST, 'corp');
        $incorp_dt = filter_input(INPUT_POST, 'incorp_dt');
        $email = filter_input(INPUT_POST, 'email');
        $zipcode = filter_input(INPUT_POST, 'zipcode');
        $owner = filter_input(INPUT_POST, 'owner');
        $phone = filter_input(INPUT_POST, 'phone');
        
        $confirm = createCorpsData($corp, $incorp_dt, $email, $zipcode, $owner, $phone);
        
        if ($confirm === true)
            {
                $results = 'Data Added!';
            }
        else
            {
                $results = 'Data Not Added.';
            }
        }
        ?>
        
        <h1 style='padding-left: 30px'>Corporation Database</h1>
        <h2 style='font-size: 15px' style='padding-left: 30px'><a style='padding-left: 30px' href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view-all.php">View Data</a><hr></h2>
        
        <h2 style='padding-left: 29px'><?php echo $results; ?></h2>

        <form style='padding-left: 30px' method="post" action="#">
            <b>Enter Corporation Information:</b>
            <br><br>
            Corporation Name:<br><input type="text" value="" name="corp" />
            <br><br>
            E-mail:<br><input type="text" value="" name="email" />
            <br><br>
            Zip Code:<br><input type="text" value="" name="zipcode" />
            <br><br>
            Owner:<br><input type="text" value="" name="owner" />
            <br><br>
            Phone:<br><input type="text" value="" name="phone" />
            <br><br>
            <input type="submit" value="Submit" />
        </form>
    </body>
</html>
