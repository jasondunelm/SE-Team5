<?php

// Connexion à la base de données
require_once('bdd.php');
//echo $_POST['title'];
if (isset($_POST['title']) && isset($_POST['startDate']) && isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['color'])){
	
	$title = $_POST['title'];    
	$start = $_POST['startDate'].' '.$_POST['startTime'].":00";
	$end = $_POST['startDate'].' '.$_POST['endTime'].":00";
	$color = $_POST['color'];

	$sql = "INSERT INTO events(title, start, end, color) values ('$title', '$start', '$end', '$color')";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	echo $sql;
	
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

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>