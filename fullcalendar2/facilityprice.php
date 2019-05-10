<?php

// Connexion à la base de données
require_once('bdd.php');

if (isset($_POST['facilitychosen'])){
    $facilitychosen = $_POST['facilitychosen'];

	$sql = "SELECT `UnitPrice` FROM `facility` WHERE ID = $facilitychosen";
    
    $req = $bdd->prepare($sql);
    $req->execute();

    $price = $req->fetchAll();

	
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
		die ($price[0][0]);
	}

}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
