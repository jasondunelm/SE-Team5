<?php
try
{
	$bdd = new PDO('mysql:host=127.0.0.1;dbname=calendar;charset=utf8', 'root', 'password');
}
catch(Exception $e)
{
        die('Erreur : '.$e->getMessage());
}
