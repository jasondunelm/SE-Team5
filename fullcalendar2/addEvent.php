
<?php

require_once('bdd.php');

if(isset($_POST['facility'])&&$_POST['facility']=="4"){
    $_POST["startTime"]="00:00";
    $_POST["endTime"]="24:00";
}
//var_dump($_POST);
if (isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['facility']) && isset($_POST['totalmoney'])){
    
	//$title = $_POST['title'];
    $userID = $_POST['user'];
    
	$startStr = $_POST['startDate'].' '.$_POST['startTime'].":00";
	$endStr = $_POST['startDate'].' '.$_POST['endTime'].":00";
    $end = new DateTime($endStr);
    $endStr = $end->format('Y-m-d H:i:s');
    
	$facility = $_POST['facility'];
    $bookcost = $_POST['totalmoney'];

	$sql = "INSERT INTO booking(UserID, FacilityID, StartTime, EndTime, BookCost) values ($userID, $facility, '$startStr', '$endStr', $bookcost)";
	//$req = $bdd->prepare($sql);
	//$req->execute();
	
	//echo $sql;
	
	$query = $bdd->prepare( $sql );
	if ($query == false) {
	 print_r($bdd->errorInfo());
	 die ('Error prepare');
	}
	$sth = $query->execute();
	if ($sth == false) {
	 print_r($query->errorInfo());
	 die ('Error execute');
	}

}
header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>

