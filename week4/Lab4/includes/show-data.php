<?php if(is_array($results) && is_array($results) && count($results) > 0): ?>
 <table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>ID</th>
                    <th>Corporation</th>
                    <th>Incorporated</th>
                    <th>E-mail</th>
                    <th>Zip Code</th>
                    <th>Owner</th>
                    <th>Phone</th>
                    <th></th>
                </tr>
            </thead>
            
            <?php foreach ($results as $row): ?>
                <tr>
                    <td style='padding-left: 30px'><?php echo $row['id']; ?></td>
                    <td><?php echo $row['corp']; ?></td>
                    <td><?php echo $row['incorp_dt']; ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                    <td><a class="btn btn-success" href="update.php?id=<?php echo $row['id']; ?>">Update</a></td>            
                    <td><a class="btn btn-warning" href="read.php?id=<?php echo $row['id']; ?>">Read</a></td> 
                    <td><a class="btn btn-danger" href="delete.php?id=<?php echo $row['id']; ?>">Delete</a></td>
                </tr> 
            <?php endforeach; ?>
        </table>
<?php else: ?>
<p>No data to display</p>
<?php endif; ?>