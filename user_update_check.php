<?php
include "PDO.php";

$firstName=$_POST['firstName'];
$lastName=$_POST['lastName'];

$sql="UPDATE users SET firstName='$firstName', lastName='$lastName' WHERE id=1;";
if($pdo->exec($sql)){
    echo "<script>alert(\"Update successfully\")</script>";
    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}
else{
    echo "<script>alert(\"Update failed\")</script>";
    echo "<script>location.href='".$_SERVER["HTTP_REFERER"]."';</script>";
}


?>