<?php
session_start();
$_SESSION["role"]=null;
?>
<html>
<head>

</head>
<body>
<!-- login area -->
<div class = "login">
    <!-- <form method="post" name="login" onsubmit="return validate_form()"> -->
    <form method="post" id="signin" class="signin" name="signin"  >
        <input type="text" id="username" name="username" >
        <input type="text" id="password" name="password" >
        <input type="submit" name="submit">
    </form>

</div>
</body>
</html>

<?php

$db_host = 'mysql:host=127.0.0.1';
$db_name = 'dbname=test01';
$db_user = 'root';
$db_pass = 'mon97day';

$username = $_POST['username'];
$password = $_POST['password'];

$pdo = new PDO($db_host.";".$db_name, $db_user, $db_pass);
if($username !=null && $password!=null){
    $sql = "SELECT * FROM Users WHERE userName ='".$username."';";

    echo $sql;
    $statement = $pdo->query($sql);
    $result = $statement->fetch(PDO::FETCH_ASSOC);
    // get the password, username, and memberId of the search result
    $real_password = $result['password'];
    $res_username = $result['userName'];
    $role = $result['role'];
    echo $real_password;
    echo $res_username;
    echo $role;
}




// check the existence of username and verify input password with correct password
    if ($result_password == $password) {

        // record the current username in session
        $_SESSION["username"] = $result['username'];

        $sql = "SELECT role FROM Users WHERE userName ='".$username."';";
        echo $sql;
        $statement = $pdo->query($sql);
        $result = $statement->fetch(PDO::FETCH_ASSOC);
        // record the current role in session.
        $_SESSION["role"] = $result['role'];
        echo "<script> location.href=\"index_admin.php\";</script>";
    } else {
        echo "Illegal username or password, please try again";

}
?>