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
        /*
         * include the data base connect file
         * and helper functions as if we are adding
         * the code on the page
         */
        include './dbconnect.php';
        include './functions.php';
        include './crud.php';

        $results = viewAllFromActors();

        /*
         * get and hold a database connection 
         * into the $db variable
         */


        /*
         * create a variable to hold the database
         * SQL statement
         */


        /*
         * We execute the statement and make sure we
         * got some results back.
         */
        ?>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th>ID</th>
                    <th>First Name</th>
                    <th>Last Name</th>
                    <th>Date of Birth</th>
                    <th>Height</th>
                </tr>
            </thead>
            <tbody>
                <?php
                /*
                 * Use a for each loop to go through the
                 * associative array. $results is a multi 
                 * dimensional array. Arrays with arrays.
                 * 
                 * So we loop through each result to get back
                 * an array with values
                 * 
                 * feel free to 
                 * <?php echo print_r($results); ?>
                 * to see how the array is structured
                 */
                ?>
                
            <h1>Actor Database</h1>
            <h2 style='font-size: 15px'><a href="add.php">Enter Data</a>&nbsp;&nbsp;<a href="view.php">View Data</a></h2>

                <?php foreach ($results as $row): ?>
                    <tr>
                        <td><?php echo $row['id']; ?></td>
                        <td><?php echo $row['firstname']; ?></td>
                        <td><?php echo $row['lastname']; ?></td>
                        <td><?php echo $row['dob']; ?></td>
                        <td><?php echo $row['height']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>

    </body>
</html>
