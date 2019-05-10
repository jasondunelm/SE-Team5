<?php
include "PDO.php";

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];
$token=$_POST['token'];

$sql="UPDATE users SET firstName='$firstName', lastName='$lastName', token='$token' WHERE id=1;";
if($pdo->exec($sql)){
    echo "<script>alert(\"Update successfully\")</script>";
    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}
else{
    echo "<script>alert(\"Update failed\")</script>";
    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}


?>