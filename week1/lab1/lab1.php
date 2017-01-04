<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
    </head>
    <body>


<?php /* Generate table, increment number of rows until = 10 */ ?>
        <table>
            <?php for ($tr = 1; $tr <= 10; $tr++): ?>
                <tr> 
<?php /* For loop, generates table with these specifications. */ ?>
                    <?php for ($td = 1; $td <= 10; $td++): ?>

<?php /* Generate random color value. */ ?>
                        <?php
                        $randColor = '#' . strtoupper(dechex(rand(0x000000, 0xFFFFFF)));
                        ?>
<?php /* Specify style of font and background colors. */ ?>                    
                        <td style="background-color:<?php echo $randColor; ?>"> <?php echo $randColor; ?>
                            <?php if (isset($randColor)): ?>
                                <span style="color:white;"><?php echo $randColor; ?></span>  
                            <?php endif; ?> </td>
<?php /* End for loop. */ ?>   
                    <?php endfor; ?>                
                </tr>
            <?php endfor; ?>
                
        </table>

    </body>
</html>