<?php if(is_array($results) && is_array($results) && count($results) > 0): ?>
<hr>
<p style='padding-left: 30px'>Showing <?php echo count ($results);?> results:</p>

<table class="table table-striped">
            <thead>
                <tr>
                    <th style='padding-left: 30px'>ID</th>
                    <th>Corporation</th>
                    <th>Date -- Time Added</th>
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
                    <td><?php echo date("d/m/Y -- g:i a",strtotime($row['incorp_dt'])); ?></td>
                    <td><?php echo $row['email']; ?></td>
                    <td><?php echo $row['zipcode']; ?></td>
                    <td><?php echo $row['owner']; ?></td>
                    <td><?php echo $row['phone']; ?></td>
                </tr> 
            <?php endforeach; ?>
        </table>
<?php else: ?>
<p style='padding-left: 30px'><br>No data to display.</p>
<?php endif; ?>