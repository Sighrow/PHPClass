<?php $resultsProducts = viewProducts();

if(is_array($resultsProducts) && is_array($resultsProducts) && count($resultsProducts) > 0){ ?>
<hr>
<div style="width: 100%; float: left; margin-top: 15px;"><p style='padding-left: 15px'>Showing: <b><?php echo count ($resultsProducts);?> results</b></p><div></div> <?php }
?>

<table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 15px'>Image</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsProducts as $row): ?>
                <tr>
                    <td style='padding-left: 15px'><?php echo $row['image']; ?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['product_id']; ?>">Read</a></td> 
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['product_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>
