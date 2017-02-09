<!DOCTYPE html>
<!--
To change this license header, choose License Headers in Project Properties.
To change this template file, choose Tools | Templates
and open the template in the editor.
-->
<html>
    <head>
        <meta charset="UTF-8">
        <title></title>
          <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">
    </head>
    <body>
        <?php
        
        include "./functions/dbconnect.php";
        include "./functions/until.php";
        
        $site = filter_input(INPUT_POST, 'site');
        $errors = array();
        $message = "";
        
        if (isPostRequest())
        {
            if ( filter_var($site, FILTER_VALIDATE_URL) === false  )
            {
                $errors[] = "Invalid web address.";
            }
            if ( count($errors) === 0)
            {
                $html = getPageContent($site);
                
                if (!empty($html))
                {
                    $siteLinks = getLinkMatches($html);
                    
                    $results = registerSite($site, $siteLinks);
                    
                    if ($results === true)
                    {
                        $message = " <img src='./images/successicon.png' alt='success' /> Site registered successfully!";
                    }
                    else
                    {
                        $errors[] = "Site not registered.";
                    }
                }
            }
        }
        ?>
        
        <?php include "./header.php"; ?>
        <?php include "./templates/error-messages.php"; ?>
     
        <form action="#" method="post">
        <label style="padding-left: 29px">Enter Web Address:</label><br>
        <input name="site" type="text" placeholder="http://"
               style="width: 400px; margin-left: 30px;" value="http://"/><?php echo $message; ?><br><br>
        <input class="btn btn-default btn-xs" style="width: 198px; margin-left: 30px" type="submit" value="Register" />
        <input class="btn btn-default btn-xs" style="width: 198px;" type="reset" value="Reset"/><hr>
    </form>   
        
    </body>
</html>
