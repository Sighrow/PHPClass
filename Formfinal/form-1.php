<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <title>Mailing List</title> 
        <!-- Latest compiled and minified CSS -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

        <!-- Optional theme -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap-theme.min.css" integrity="sha384-rHyoN1iRsVXV4nD0JutlnGaslCJuC7uwjduW9SVrLvRYooPp2bWYgmgJQIXwl/Sp" crossorigin="anonymous">

        <!-- Latest compiled and minified JavaScript -->
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa" crossorigin="anonymous"></script>

    </head>
    <body>

        <?php
        include './dbconnect.php';
        include './functions.php';

        if (isPostRequest()) {

            $email = filter_input(INPUT_POST, "email");
            $phone = filter_input(INPUT_POST, "phone");
            $heard_from = filter_input(INPUT_POST, "heard_from");
            $contact_via = filter_input(INPUT_POST, "contact_via");
            $comments = filter_input(INPUT_POST, "comments");

            $userExist = userExist($email);
            $errors = [];
            $successes = [];

            if (filter_var($email, FILTER_VALIDATE_EMAIL) === false) {
                $isValid = false;
                $errors[] = "Entered e-mail address is invalid.";
            }

            if (!isset($isValid)) {
                $isValid = true;
            }

            if ($email === "" || $phone === "" || $heard_from === "") {
                $errors[] = 'You did not complete all required fields.';
            }

            if ($userExist) {
                $errors[] = 'This e-mail already exists.';
            }


            if (count($errors) === 0 && $isValid === true) {
                $results = createAccountData($email, $phone, $heard_from, $contact_via, $comments);
                $successes[] = $email;
                $successes[] = $phone;
            }
        }
        ?>    


        <div style="float: left; width: 100%; height: 75px; background-color: black; margin-bottom: 15px;">
            <div style="float: left; height: 50px; padding-left: 15px;">
                <h2 style="color: white; height: 50px;">Account Sign-Up</h2>
            </div>
            <div style="float: right; padding-right: 15px; margin-top: 25px;">
                <div style="float: left; border-left: 3px solid white; padding-left: 5px; padding-right: 5px;">
                    <a style="color: white;" href="form-1.php">Add Data</a>
                </div>
                <div style="float: left; border-left: 3px solid white; padding-left: 5px; padding-right: 5px;">
                    <a style="color: white;" href="view-all.php">View Data</a>
                </div>
            </div>
        </div>

        <div style="float: left; margin-left: 15px;">
            <form action="#" method="post">

                <div class="panel panel-default" style="padding: 5px;">
                    <fieldset>
                        <legend style="margin-bottom: 15px;">Account Information</legend>
                        <label>E-Mail:</label>
                        <br>
                        <input style="width: 250px;" type="text" name="email" value="" class="textbox"/>
                        <br /><br>

                        <label>Phone Number:</label>
                        <br>
                        <input style="width: 250px;" type="text" name="phone" value="" class="textbox"/>
                    </fieldset><br>
                </div>

                <div class="panel panel-default" style="padding: 5px; margin-top: -10px;">
                    <fieldset>
                        <legend style="margin-bottom: 15px;">Settings</legend>

                        <p><b>How did you hear about us?</b></p>
                        <input type="radio" name="heard_from" value="Search Engine" />
                        Search engine<br />
                        <input type="radio" name="heard_from" value="Friend" />
                        Word of mouth<br />
                        <input type=radio name="heard_from" value="Other" />
                        Other<br /><br>

                        <p><b>Contact via:</b></p>
                        <select name="contact_via">
                            <option value="email">Email</option>
                            <option value="text">Text Message</option>
                            <option value="phone">Phone</option>
                        </select>

                        <br><br>
                        <p><b>Comments:</b> (optional)</p>
                        <textarea name="comments" rows="4" cols="50"></textarea>
                    </fieldset>
                </div>

                <input class="btn btn-default" style="margin-bottom: 5px;" type="submit" value="Submit" />

            </form>
            <br />
        </div>

        <div style="float: left; padding-left: 15px;">
            <div class="list-group-item list-group-item-danger" style="padding: 5px;">
                <fieldset>
                    <legend style="margin-bottom: 15px; color: #A94444;">Data not added.</legend>
                    <label>Error:</label>
<?php include 'error-messages.html.php'; ?>
                </fieldset><br>
            </div>    
        </div>

        <div style="float: left; padding-left: 15px;">
            <div class="list-group-item list-group-item-success" style="padding: 5px;">
                <fieldset>
                    <legend style="margin-bottom: 15px; color: #3C763D;">Data added successfully!</legend>
                    <label>Added:</label>
<?php include 'success-messages.html.php'; ?>
                </fieldset><br>
            </div>    
        </div>



        <div style="position:fixed;bottom:0;height:auto;margin-top:60px;background-color: #ededed; border-top: 5px solid #DDDDDD; border-bottom: 8px solid black; width: 100%; float: left;"></div>
    </body>
</html>
