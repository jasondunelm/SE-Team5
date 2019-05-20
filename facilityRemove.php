<?php
include "config_wyj.php";

$id = $_POST['id'];
if($id) {

    // Check record exists
    //$pdo = new PDO($db_host . ";" . $db_name, $db_user, $db_pass);

    $sql = "select * from Facility where id= " . $id . ";";


    $statement = $pdo->query($sql);
    $table = $statement->fetchAll(PDO::FETCH_ASSOC);

    $image = $table[0]['facilityPic'];

    if (count($table) > 0) {
        // Delete record
        $sql = "DELETE FROM Facility WHERE id= " . $id . ";";
        //$str = 'images/'.$image;

        //unlink($str);

        $statement = $pdo->query($sql);
        echo 1;
        exit;
    }
}
echo 0;
exit;

