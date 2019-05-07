<?php
function redirect() {
    header('Location: register.php');
    exit();
}

if (!isset($_GET['email']) || !isset($_GET['token'])) {
    redirect();
} else {
    $con = new mysqli("127.0.0.1", "root", "password", "se_team5");

    $email = $con->real_escape_string($_GET['email']);
    $token = $con->real_escape_string($_GET['token']);

    $sql = $con->query("SELECT id FROM Users WHERE userName='$email' AND token='$token' AND emailConfirmed=0");

    if ($sql->num_rows > 0) {
        $con->query("UPDATE Users SET emailConfirmed=1, token='' WHERE userName='$email'");
        echo 'Your email has been verified! You can log in now!';
    } else
        redirect();
}
?>