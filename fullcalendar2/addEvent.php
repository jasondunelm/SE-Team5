
<?php

require_once('bdd.php');

if(isset($_POST['facility'])&&$_POST['facility']=="4"){
    $_POST["startTime"]="00:00";
    $_POST["endTime"]="24:00";
}
if(isset($_POST['facility'])&&isset($_POST['startDate'])&&isset($_POST['endDate'])&&isset($_POST['whichDay'])&&isset($_POST['startTime'])&&isset($_POST['endTime'])){
    $userID = $_POST['user'];
    $startdateStr = $_POST["startDate"];
    $enddateStr = $_POST["endDate"];
    $whichDay = $_POST["whichDay"];
    $starttime = $_POST['startTime'];
    $endtime = $_POST['endTime'];
    $chosenfacility = $_POST['facility'];
    
    
    $startday = date('w', strtotime($startdateStr));
    $plus_days = ((int)$whichDay+7-(int)$startday)%7;
    $startdateStr= date('Y-m-d', strtotime($startdateStr. " + $plus_days days"));
    
    $endday = date('w', strtotime($enddateStr));
    $minus_days = (7+(int)$endday-(int)$whichDay)%7;
    $enddateStr= date('Y-m-d', strtotime($enddateStr. " - $minus_days days"));
    
    
    $nextStr= date('Y-m-d', strtotime($startdateStr. ' + 7 days'));
    $allbookingdays=array($startdateStr, $nextStr);
    $i=0;
    while($nextStr<$enddateStr&&$i<=53){
        $nextStr = date('Y-m-d', strtotime($nextStr. ' + 7 days'));
        array_push($allbookingdays,$nextStr);
        $i++;
    }
    
    $allbookingtimes = array();
    foreach($allbookingdays as $day){
        $startStr = $day." ".$starttime.":00";
        $endStr = $day." ".$endtime.":00";
        $end = new DateTime($endStr);
        $endStr = $end->format('Y-m-d H:i:s');
        array_push($allbookingtimes, array("Start"=>$startStr, "End"=>$endStr));
    }
    //var_dump($allbookingtimes);
    foreach($allbookingtimes as $row){
        $sql = "INSERT INTO booking(UserID, FacilityID, StartTime, EndTime, block) values ($userID, $chosenfacility, '".$row["Start"]."', '".$row["End"]."', 1)";
        
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
}
//block
elseif (isset($_POST['startDate']) && isset($_POST['endDate']) && isset($_POST['facility'])){
    
	//$title = $_POST['title'];
    $userID = $_POST['user'];
    
	$startStr = $_POST['startDate'].' 00:00:00';
	$endStr = $_POST['endDate']." 24:00:00";
    $end = new DateTime($endStr);
    $endStr = $end->format('Y-m-d H:i:s');
    
	$facility = $_POST['facility'];

	$sql = "INSERT INTO booking(UserID, FacilityID, StartTime, EndTime, block) values ($userID, $facility, '$startStr', '$endStr', 1)";
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
//booking;
elseif (isset($_POST['startTime']) && isset($_POST['endTime']) && isset($_POST['facility']) && isset($_POST['totalmoney'])){
    
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
include "register.php";
echo "<script> location.href=\"index.php\";
    \n alert('".$_POST["msg"]."');</script>";
//header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>

