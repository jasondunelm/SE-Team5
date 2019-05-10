<?php
include "PDO.php";

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$token=$_POST['token'];

$sql="UPDATE users SET firstName='$firstName', lastName='$lastName', token='$token' WHERE id=1;";
$pdo->exec($sql);

echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
?>