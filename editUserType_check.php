<?php
include "PDO.php";

$role=$_POST['role'];
$id=$_POST['id'];
$sql="UPDATE Users SET role ='$role' WHERE id=$id;";
$pdo->exec(($sql));

?>



