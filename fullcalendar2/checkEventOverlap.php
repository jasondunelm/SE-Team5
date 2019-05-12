<?php

require_once('bdd.php');


if (!empty($_POST["starttime"])&&!empty($_POST["endtime"])&&isset($_POST['chosenfacility'])){
    
    $startStr = $_POST["date"]." ".$_POST["starttime"].":00";
    $start = new DateTime($startStr);
    $endStr = $_POST["date"]." ".$_POST["endtime"].":00";
    $end = new DateTime($endStr);
    $chosenfacility = $_POST['chosenfacility'];
    //$start = new DateTime ("2019-05-25 02:30:00");
    //$end = new DateTime ("2019-05-25 03:30:00");
    //$chosenfacility = 2;
    
    $sql = "SELECT StartTime, EndTime FROM booking WHERE FacilityID = $chosenfacility AND block = 1";

    $req = $bdd->prepare($sql);
    $req->execute();

    $blockedtime = $req->fetchAll();
	
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
    
    $notblocked = true;
    foreach($blockedtime as $row){
        $blockStart = new DateTime ($row["StartTime"]);
        $blockEnd = new DateTime ($row["EndTime"]);
        
        $notblocked= $end<$blockStart||$start>$blockEnd;
        if($notblocked==false){
            die("The time is blocked");
        }
    }
    
    $sql = "SELECT StartTime, EndTime FROM booking WHERE EndTime >'$startStr' AND StartTime <='$endStr' AND FacilityID = $chosenfacility";
    
    $req = $bdd->prepare($sql);
    $req->execute();

    $overlaptime = $req->fetchAll();
	
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
    
    if(!empty($overlaptime[0])){
        $msg="";
        foreach($overlaptime as $row){
            $overlapStart = $row["StartTime"];
            $overlapEnd = $row["EndTime"];
            $msg.="`$overlapStart ~ $overlapEnd` ";
        }
        
        die("The facility is booked at $msg");
    }
    
    die ('OK');
}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
