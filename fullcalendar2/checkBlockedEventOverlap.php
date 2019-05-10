<?php

require_once('bdd.php');


if (!empty($_POST["starttime"])&&!empty($_POST["endtime"])&&isset($_POST['chosenfacility'])){
    
    $start = new DateTime($_POST["date"]." ".$_POST["starttime"].":00");
    $end = new DateTime($_POST["date"]." ".$_POST["endtime"].":00");
    $chosenfacility = $_POST['chosenfacility'];
    //$start = new DateTime ("2019-05-25 02:30:00");
    //$end = new DateTime ("2019-05-25 03:30:00");
    //$chosenfacility = 2;
    
    $sql = "SELECT StartTime, EndTime FROM booking WHERE FacilityID = $chosenfacility AND block = 1";

    $req = $bdd->prepare($sql);
    $req->execute();

    $blockedtime = $req->fetchAll();
    
    
    //var_dump($blockedtime);
	
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
    
    $notblocked = true;
    foreach($blockedtime as $row){
        $blockStart = new DateTime ($row["StartTime"]);
        $blockEnd = new DateTime ($row["EndTime"]);
        
        $notblocked= $end<$blockStart||$start>$blockEnd;
        if($notblocked==false){
            die("blocked");
        }
    }
    die ('OK');
}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
