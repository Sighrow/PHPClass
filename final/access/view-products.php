<?php $resultsProducts = viewProducts();?>

<hr>
<div style="width: 100%; float: left; margin-top: 15px;"><div style="float: left;"><p style='padding-left: 15px'>Showing: <b><?php echo count ($resultsProducts);?> results</b></p></div><div style="float: right; margin-right: 15px;"><a class="btn btn-default btn-sm" style="width: 78px; height: 28px; margin-top: -1px;" href="add-product.php">Add</a></div></div>

<table style="margin-bottom: 13px;" class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 15px'>Image</th>
                    <th></th>
                    <th>Category ID</th>
                    <th>Product ID</th>
                    <th>Name</th>
                    <th>Price</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsProducts as $row): ?>
                <tr>
                    <td style='padding-left: 15px; width: 100px; height: 100px;'><img style="width: 100px; height: 100px;" src="./uploads/<?php echo $row['image']; ?>"></img></td>
                    <td></td>
                    <td><?php echo $row['category_id'];?></td>
                    <td><?php echo $row['product_id']; ?></td>
                    <td><?php echo $row['product']; ?></td>
                    <td><?php echo $row['price']; ?></td>
                    
                    <td><a class="btn btn-default" href="update-product.php?product_id=<?php echo $row['product_id']; ?>">Update</a></td>            
                    <td><a class="btn btn-default" href="delete-product.php?product_id=<?php echo $row['product_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>
