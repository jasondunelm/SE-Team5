<?php
try
{
	$bdd = new PDO('mysql:host=localhost;dbname=se_team5;charset=utf8', 'root', '');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
