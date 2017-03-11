        <form style="padding-left: 15px;" method="POST" action="#">
            <?php if (strpos($_SERVER['REQUEST_URI'], 'signup.php') != false) {?>
            Username:<br><input type="text" name="username" value="" />
            <br><br>
            <?php }?>
            Email:<br><input type="text" name="email" value="" />
            <br><br>
            Password:<br><input type="password" name="pass" value="" />
            <br><br>
            <input class="btn btn-default btn-sm" style="width: 77px;" type="submit" value="Submit" />
            <input class="btn btn-default btn-sm" style="width: 77px; margin-left: 1px;" type="reset" value="Reset"/><br><hr>
        </form>