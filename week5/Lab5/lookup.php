<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title>Site Registration</title>
         <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        
            require './functions/dbconnect.php';
            require './functions/until.php';
            
            
                $db = dbconnect();

                $stmt = $db->prepare("SELECT * FROM sites ORDER BY site DESC");
                $sites = array();
                if ($stmt->execute() && $stmt->rowCount() > 0) {
                    $sites = $stmt->fetchAll(PDO::FETCH_ASSOC);
                }
                $site_id = '';
                if ( isPostRequest() ) {
                    
                    
                    $stmt = $db->prepare("SELECT * FROM sitelinks WHERE site_id = :site_id");
                    $site_id = filter_input(INPUT_POST, 'site_id');
                    $binds = array(
                    ":site_id" => $site_id
                    );

                    if ($stmt->execute($binds) && $stmt->rowCount() > 0) {
                        $results = $stmt->fetchAll(PDO::FETCH_ASSOC);
                    } else {
                        $error = 'No Results found';
                    }
                    
                    
                    
                }
                
        ?>
        
        <?php include "./header.php"; ?>
       
        <form style="padding-left: 30px;" method="post" action="#">
        <label>Look-up:</label><br>
        
            <select style="width: 400px; height: 26px;" name="site_id">
            <?php foreach ($sites as $row): ?>
                <option 
                    value="<?php echo $row['site_id']; ?>"
                    <?php if( intval($site_id) === $row['site_id']) : ?>
                        selected="selected"
                    <?php endif; ?>
                >
                    <?php echo $row['site']; ?>
                </option>
            <?php endforeach; ?>
            </select>

            <input style="width: 75px; height: 26px; margin-top: -3px;" class="btn btn-default btn-xs" type="submit" value="Results" />
        </form>
        <br><hr>
        
                <?php if( isset($results) ): ?>
        <h3 style="padding-left: 30px;"><?php echo count($results); ?> Results found:</h3>
            <table style="margin-left: 30px" border="1">        
                <tbody>
                <?php foreach ($results as $row): ?>
                    <tr>
                        <td style="padding: 2px"><a href="<?php echo $row['link']; ?>" target="popup"><?php echo $row['link']; ?></a></td> 
                    </tr>
                <?php endforeach; ?>
                </tbody>
            </table>

        <?php endif; ?><br>
        
    </body>
</html>
