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
    
    include './header.php';
        
    ?>
  
    <form action="#" method="get">
        <label style="padding-left: 29px">Enter Web Address:</label><br>
        <input name="name" type="text" placeholder="http://"
               style="width: 400px; margin-left: 30px;" value="http://"/><br><br>
        <input class="btn btn-default btn-xs" style="width: 198px; margin-left: 30px" type="submit" value="Register" />
        <input class="btn btn-default btn-xs" style="width: 198px;" type="reset" value="Reset"/><hr>
    </form>   
    </body>
</html>
