<?php

require_once('bdd.php');
if(isset($_POST['chosenfacility'])&&$_POST['chosenfacility']=="4"&&!isset($_POST["enddate"])){
    $_POST["starttime"]="00:00";
    $_POST["endtime"]="24:00";
}
if (!empty($_POST["starttime"])&&!empty($_POST["endtime"])&&isset($_POST['chosenfacility'])){
    
    $startStr = $_POST["date"]." ".$_POST["starttime"].":00";
    $start = new DateTime($startStr);
    $endStr = $_POST["date"]." ".$_POST["endtime"].":00";
    $end = new DateTime($endStr);
    $endStr = $end->format('Y-m-d H:i:s');
    
    $chosenfacility = $_POST['chosenfacility'];
    //$start = new DateTime ("2019-05-25 02:30:00");
    //$end = new DateTime ("2019-05-25 03:30:00");
    //$chosenfacility = 2;
    
    $sql = "SELECT StartTime, EndTime FROM booking WHERE FacilityID = $chosenfacility OR FacilityID = 0 AND block = 1";

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
    $sql = "SELECT Capacity FROM `facility` WHERE ID=$chosenfacility";
    $req = $bdd->prepare($sql);
    $req->execute();

    $capacity = $req->fetch();
	
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
    
    
    $numsofoverlap = count($overlaptime);
    if($capacity[0]<=$numsofoverlap){
        if($chosenfacility=="4"){
            die("Track has been booked 20 times today.\nMaybe try to come in person. The track can be used after paying if there is extra space.");
        }
        $msg="";
        foreach($overlaptime as $row){
            $overlapStart = $row["StartTime"];
            $overlapEnd = $row["EndTime"];
            $msg.="`$overlapStart ~ $overlapEnd` ";
        }
        
        die("The facility has been booked at $msg, and the capacity is $capacity[0]");
    }
    
    die ('OK');
}
if (!empty($_POST["startdate"])&&!empty($_POST["enddate"])&&isset($_POST['chosenfacility'])){
    $startStr = $_POST["startdate"]." 00:00:00";
    $start = new DateTime($startStr);
    $endStr = $_POST["enddate"]." 24:00:00";
    $end = new DateTime($endStr);
    $endStr = $end->format('Y-m-d H:i:s');
    
    $chosenfacility = $_POST['chosenfacility'];
    
    $sql = "SELECT StartTime, EndTime FROM booking WHERE EndTime >'$startStr' AND StartTime <='$endStr' AND block = 0";
    if($chosenfacility!="0"){
         $sql.=" AND FacilityID = $chosenfacility";
    }
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
    
    $numsofoverlap = count($overlaptime);
    if(1<=$numsofoverlap){
        $msg="";
        foreach($overlaptime as $row){
            $overlapStart = $row["StartTime"];
            $overlapEnd = $row["EndTime"];
            $msg.="`$overlapStart ~ $overlapEnd` ";
        }
        
        die("The facility has been booked at $msg, please remove them first to add new block");
    }
    
    die ('OK');
}
//header('Location: '.$_SERVER['HTTP_REFERER']);
	
?>
