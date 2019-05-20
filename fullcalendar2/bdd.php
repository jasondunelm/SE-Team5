<?php
include ("../config_wyj.php");
try
{
	//$bdd = new PDO('mysql:host=localhost;dbname=se_team5;charset=utf8', 'root', '');
    $bdd = new PDO($db_host.";".$db_name,$db_user, $db_pass);
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
