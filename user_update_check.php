<?php
include "PDO.php";

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$password=$_POST['password'];
$confirmPassword=$_POST['confirmPassword'];
$userName=$_POST['userName'];

if($password==$confirmPassword&&$password=="111111"){
    $sql="UPDATE users SET firstName='$firstName', lastName='$lastName' WHERE userName='$userName';";
    $pdo->exec($sql);
    echo "<script>
alert(\"Update first name and last name successfully!\")
location.href=\"user_update.php\";
</script>";
}
else if (strlen($_POST['password']) < 8){
    echo "<script>
alert(\"Please enter a password at least 8 characters!\")
location.href=\"user_update.php\";
</script>";
}

else if (!preg_match('`[A-Z]`', $_POST['password'])){
    echo "<script>
alert(\"Please include at least one capital letter in your password!\")
location.href=\"user_update.php\";
</script>";
}

else if($password!=$confirmPassword){
    echo "<script>
alert(\"Please check your input of confirmation password!\")
location.href=\"user_update.php\";
</script>";
}

else{
    $p=md5(md5($userName) . $password);
    $sql="UPDATE users SET firstName='$firstName', lastName='$lastName',password='$p' WHERE userName=\"$userName\";";
    $pdo->exec($sql);
    echo "<script>
alert(\"Update first name, last name and password successfully!\")
location.href=\"user_update.php\";
</script>";
}


?>