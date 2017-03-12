<?php $resultsCategories = viewCategories(); ?>

<hr>
<div style="width: 100%; float: left; margin-top: 15px;"><div style="float: left;"><p style='padding-left: 15px'>Showing: <b><?php echo count ($resultsCategories);?> results</b></p></div><div style="float: right; margin-right: 15px;"><?php include './add-category.php'; ?></div></div>

<table style="margin-bottom: 13px;" class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 15px; width: 30%;'>Category ID</th>
                    <th>Name</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsCategories as $row): ?>
                <tr>
                    <td style='padding-left: 15px'><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td style='width: 10%;'><a class="btn btn-default" href="update-category.php?category_id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td style='width: 10%;'><a class="btn btn-default" href="delete-category.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>
