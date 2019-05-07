<?php
include("functions_WebFront.php");

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

            <h2 class="font-weight-bold">Login</h2>

            <form method="post">
                <input class="form-control" name="loginEmail" type="email" placeholder="Your Email..."
                       value="<?php echo addslashes($_POST['loginEmail']); ?>"><br>
                <input class="form-control" name="loginPassword" type="password" placeholder="Password..."
                       value="<?php echo addslashes($_POST['loginPassword']); ?>"><br>
                <input class="btn btn-primary" type="submit" name="submit" value="Log In">
                <br><br>
                <input class="btn btn-secondary" type="submit" name="submit" value="Forgotten Password?">
            </form>

        </div>
    </div>
</div>
</body>
</html>