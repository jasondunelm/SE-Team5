<?php
include "config_wyj.php";

$id = $_POST['id'];
if($id) {

    // Check record exists
    $pdo = new PDO($db_host . ";" . $db_name, $db_user, $db_pass);

    $sql = "select * from Facility where facilityName= '" . $id . "';";

    $statement = $pdo->query($sql);
    $table = $statement->fetchAll(PDO::FETCH_NUM);


    if (count($table) > 0) {
        // Delete record
        $sql = "DELETE FROM Facility WHERE facilityName= '" . $id . "';";
        $statement = $pdo->query($sql);
        echo 1;
        exit;
    }
}
echo 0;
exit;

