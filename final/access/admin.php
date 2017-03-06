<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>
        <?php
        // put your code here
        session_start();

        include_once './header.php';
        include_once './functions.php';

        if (!isLoggedIn()) {
            die(header('location: http://localhost/PHPClass/final/users/login.php'));
        }


        $resultsCategories = viewCategories();
        $resultsProducts = viewProducts();
        ?>

        <h1>Admin Page</h1>

        <table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>ID</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsCategories as $row): ?>
                <tr>
                    <td style='padding-left: 30px'><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['category_id']; ?>">Read</a></td> 
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['category_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>




        <table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>Image</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsProducts as $row): ?>
                <tr>
                    <td style='padding-left: 30px'><?php echo $row['image']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['product_id']; ?>">Read</a></td> 
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>

    </body>
</html>
