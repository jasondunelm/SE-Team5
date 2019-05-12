<?php
include "PDO.php";

$rol=$_POST['role'];
$id=$_POST['id'];

$sql="UPDATE users SET role ='$rol' WHERE id=$id;";
if($pdo->exec($sql)){
    echo "<script>alert(\"Update successfully\")</script>";
    echo "<script>location.href='editUserType.php';</script>";
}
else{
    echo "<script>alert(\"Update failed\")</script>";
    echo "<script>location.href='editUserType.php';</script>";
}


?>



