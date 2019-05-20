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
else if (isset($_POST['submittedDeleteBlock'])){
	
    $sql = "DELETE FROM `booking` WHERE ID IN (";
    foreach($_POST["checkbox"] as $value){
        $sql.= $value.",";
    }
    $sql=substr($sql, 0, -1).");";
    //echo $sql;
    //die();
	

	
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
    //header('Location: '.$_SERVER['HTTP_REFERER']);
    echo "<script> location.href=\"index.php\";alert('remove block successfully');</script>";
}
//header('Location: '.$_SERVER['HTTP_REFERER']);

	
?>
