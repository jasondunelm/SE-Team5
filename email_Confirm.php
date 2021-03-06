<?php
include('config_wyj.php');
include ('functions_WebFront.php');

if (!isset($_GET['email']) || !isset($_GET['token'])) {
    redirectToRegisterPage();
} else {
    $link = new mysqli($mysql_db_host, $mysql_db_user, $mysql_db_pass, $mysql_db_name);

    $email = $link->real_escape_string($_GET['email']);
    $token = $link->real_escape_string($_GET['token']);

    $sql = $link->query("SELECT id FROM Users WHERE userName='$email' AND token='$token' AND emailConfirmed=0");

    if ($sql->num_rows > 0) {
        $link->query("UPDATE Users SET emailConfirmed=1, token='' WHERE userName='$email'");
        $message = 'Your email has been verified! You can log in now!';
    } else
        redirectToRegisterPage();
}
?>

<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Register</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
</head>
<body>
<div class="container" style="margin-top: 10px;">
    <div class="row justify-content-center">
        <div class="col-md-6 col-md-offset-3" align="center">

            <img src="images/logo.png"><br><br>

            <?php displayError(); ?>

            <form method="post" action="login.php">
                <input class="btn btn-primary" type="submit" name="submit" value="Go to Log-in">
            </form>

        </div>
    </div>
</div>
</body>
</html>
