
<?php

require_once('bdd.php');
//echo $_POST['title'];
var_dump($_POST);
if (isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['facility']) && isset($_POST['totalmoney'])){
    
	//$title = $_POST['title'];
    $userID = $_POST['user'];
	$start = $_POST['startDate'].' '.$_POST['startTime'].":00";
	$end = $_POST['startDate'].' '.$_POST['endTime'].":00";
	$facility = $_POST['facility'];
    $bookcost = $_POST['totalmoney'];

	$sql = "INSERT INTO booking(UserID, FacilityID, StartTime, EndTime, BookCost) values ($userID, $facility, '$start', '$end', $bookcost)";
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

