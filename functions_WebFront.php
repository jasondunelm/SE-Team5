<?php
session_start();
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;
error_reporting(0);
// to connect with mySQL database via mysqli_connect
try {
    $link = new mysqli("db4free.net", "dus_root", "password", "se_team5");

} catch (mysqli_sql_exception $e) {
    echo $e->getMessage();
}

// to logout and clear session records
if ($_GET["logout"] == 1 AND $_SESSION['id']) {

    session_destroy();

    $message = "You have been logged out. Have a good day!";

}

// display an Error message if any
function displayError()
{
    global $error;
    global $message;

    if ($error) {

        echo '<div class="alert alert-danger">' . addslashes($error) . '</div>';

    }

    if ($message) {

        echo '<div class="alert alert-success">' . addslashes($message) . '</div>';

    }
}

// to generate a random token
function generateNewString($len = 10) {
    $token = "qwertzuiopasdfghjklyxcvbnmQWERTZUIOPASDFGHJKLYXCVBNM0123456789!$/()*";
    $token = str_shuffle($token);
    $token = substr($token, 0, $len);

    return $token;
}

// to redirect to register page
function redirectToRegisterPage() {
    header('Location: register.php');
    exit();
}

// to redirect to Log-in Page
function redirectToLoginPage() {
    header('Location: login.php');
    exit();
}

// to register a new user
if ($_POST['submit'] == "Register") {

    $name = $link->real_escape_string($_POST['name']);
    $email = $link->real_escape_string($_POST['email']);
    $password = $link->real_escape_string($_POST['password']);
    $cPassword = $link->real_escape_string($_POST['cPassword']);

    if (!$_POST['email']) {
        $error .= "<br />Please enter your email.";
    } else if (!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL)) {
        $error .= "<br />Please enter a valid email address.";
    }

    if (!$_POST['password']) {
        $error .= "<br />Please enter your password.";
    } else {
        if (strlen($_POST['password']) < 8) $error .= "<br />Please enter a password at least 8 characters.";
        if (!preg_match('`[A-Z]`', $_POST['password'])) $error .= "<br />Please include at least one capital letter in your password.";
    }

    if (!$_POST['cPassword']) {
        $error .= "<br />Please enter your password again.";
    } else if ($password != $cPassword) {
        $error .= "<br />Please check your input of confirmation password.";
    }

    if (!addslashes($_POST['firstName'])) {
        $error .= "<br />Please enter your First Name.";
    }

    if (!addslashes($_POST['lastName'])) {
        $error .= "<br />Please enter your Last Name.";
    }

    if ($error) {
        $error = "There were error(s) in your Sign Up details:" . $error;
    } else {

        $query = "SELECT * FROM Users WHERE userName='" . mysqli_real_escape_string($link, $_POST['email']) . "'";

        $result = mysqli_query($link, $query);

        $results = mysqli_num_rows($result);

        if ($results) {
            $error = "That email address is already registered, Do you want to log in ?";
        } else {
            $token = generateNewString();

            if (strpos($email, 'dur')!==false) {

                $query = "INSERT INTO Users (userName, password, firstName, lastName, role, emailConfirmed, token)
 VALUES('" . mysqli_real_escape_string($link, $_POST['email']) . "','" . md5(md5($_POST['email']) . $_POST['password']) . "','" . ($_POST['firstName']) . "','" . ($_POST['lastName']) . "','member', '0', '$token')";
            } else{
                $query = "INSERT INTO Users (userName, password, firstName, lastName, role, emailConfirmed, token)
 VALUES('" . mysqli_real_escape_string($link, $_POST['email']) . "','" . md5(md5($_POST['email']) . $_POST['password']) . "','" . ($_POST['firstName']) . "','" . ($_POST['lastName']) . "','user', '0', '$token')";
            }
                mysqli_query($link, $query);
            // Load Composer's autoloader
            require 'PHPMailer/vendor/autoload.php';

            // Instantiation and passing `true` enables exceptions
            $mail = new PHPMailer();

            try{
                //Server settings
                $mail->SMTPDebug = 0;                                       // Enable verbose debug output
                $mail->isSMTP();                                            // Set mailer to use SMTP
                $mail->Host       = 'smtp.gmail.com';  // Specify main and backup SMTP servers
                $mail->SMTPAuth   = true;                                   // Enable SMTP authentication
                $mail->Username   = 'dus.team5';                     // SMTP username
                $mail->Password   = 'Dunelm12#$';                               // SMTP password
                $mail->SMTPSecure = 'tls';                                  // Enable TLS encryption, `ssl` also accepted
                $mail->Port       = 587;                                    // TCP port to connect to

                //Recipients
                $mail->setFrom('teamdurham.sports@dur.ac.uk', 'DUS');
                $mail->addAddress($email, $name);
                $mail->Subject = "Please verify email!";
                $mail->isHTML(true);
                $mail->Body = "
                    Please click on the link below:<br><br>
                    
                    <a href='http://localhost:63342/SE-Team5/email_Confirm.php?email=$email&token=$token'>Click Here</a>
                ";
                $mail->send();
                $message = "You have been registered! Please verify your email!";
            } catch (Exception $e){
                $message = "Something wrong happened! Mailer Error: {$mail->ErrorInfo}";
            }

            $_SESSION['id'] = mysqli_insert_id($link);

        }
    }
}

// to login the booking system
if ($_POST['submit'] == "Log In") {

    $query = "SELECT * FROM Users WHERE userName='" . mysqli_real_escape_string($link, $_POST['loginEmail']) . "' AND password='" . md5(md5($_POST['loginEmail']) . $_POST['loginPassword']) . "' LIMIT 1";
    $result = mysqli_query($link, $query);

    if (mysqli_num_rows($result) == 1) { //found user
        // check if userType is admin or user
        $row = mysqli_fetch_assoc($result);

        if ($row['role'] == 'admin') {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location:index_admin.php");
        } else {
            $_SESSION['id'] = $row['id'];
            $_SESSION['role'] = $row['role'];
            header("Location:index_admin.php");
        }

    } else {
        $error = "We could not find a user with that email and password. Please try again later.";
    }
}

// to redirect to forgotten password page
function redirectToForgotPasswordPage() {
    header('Location: forgotPassword.php');
    exit();
}

// to enter forgotten password page
if ($_POST['submit'] == "Forgotten Password?"){
    redirectToForgotPasswordPage();
}