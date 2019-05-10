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
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
