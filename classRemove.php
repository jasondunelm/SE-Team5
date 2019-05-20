<?php
include "config_wyj.php";

$id = $_POST['id'];
if($id) {

    // Check record exists

    $sql = "select * from Training where id= " . $id . ";";


    $statement = $pdo->query($sql);
    $table = $statement->fetchAll(PDO::FETCH_ASSOC);

    $image = $table[0]['classImage'];

    if (count($table) > 0) {
        // Delete record
        $sql = "DELETE FROM Training WHERE id= " . $id . ";";

        $str = 'images/'.$image;

        unlink($str);

        $statement = $pdo->query($sql);
        echo 1;
        exit;
    }
}
echo 0;
exit;

