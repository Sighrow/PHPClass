<?php $resultsCategories = viewCategories(); 

if(is_array($resultsCategories) && is_array($resultsCategories) && count($resultsCategories) > 0){ ?>
<hr>
<div style="width: 100%; float: left; margin-top: 15px;"><div style="float: left;"><p style='padding-left: 15px'>Showing: <b><?php echo count ($resultsCategories);?> results</b></p></div><div style="float: right; margin-right: 15px;"><?php include './add-category.php'; ?></div></div> <?php }
?>
    
    

<table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 15px'>ID</th>
                    <th>Category</th>
                    <th></th>
                    <th></th>
                </tr>
            </thead>

            <?php foreach ($resultsCategories as $row): ?>
                <tr>
                    <td style='padding-left: 15px'><?php echo $row['category_id']; ?></td>
                    <td><?php echo $row['category']; ?></td>
                    <td><a class="btn btn-default" href="update-category.php?category_id=<?php echo $row['category_id']; ?>">Update</a></td>            
                    <td><a class="btn btn-default" href="delete-category.php?category_id=<?php echo $row['category_id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>