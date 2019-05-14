<?php

require_once('bdd.php');
if (isset($_POST['evtID'])){
	$evtID = $_POST['evtID'];
    
	$sql = "DELETE FROM `booking` WHERE ID=$evtID";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
        print_r($bdd->errorInfo());
        die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
        print_r($query->errorInfo());
        die ('Erreur execute');
	}else{
		die ('OK');
	}

}
else if (isset($_POST['deleteBlock'])){
	$evtID = $_POST['deleteBlock'];
    
	$sql = "DELETE FROM `booking` WHERE ID=$evtID";

	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
        print_r($bdd->errorInfo());
        die ('Erreur prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
        print_r($query->errorInfo());
        die ('Erreur execute');
	}
    echo "<script> location.href=\"index.php\";</script>";

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
