<?php

//to access MySQL: db4free.net

$mysql_db_host = "db4free.net";
$mysql_db_name = "se_team5";
$mysql_db_user = "dus_root";
$mysql_db_pass = "password";

$db_host = 'mysql:host=db4free.net';
$db_name = 'dbname=se_team5';
$db_user = 'dus_root';
$db_pass = 'password';

$pdo = new PDO($db_host.";".$db_name,$db_user, $db_pass);

// to access MySQL: localhost

//$mysql_db_host = "127.0.0.1";
////$mysql_db_name = "se_team5";
//$mysql_db_name = "test01";
//$mysql_db_user = "root";
////$mysql_db_pass = "password";
//$mysql_db_pass = "mon97day";
//
//$db_host = 'mysql:host=127.0.0.1';
//$db_name = 'dbname=test01';
////$db_name = 'dbname=se_team5';
//$db_user = 'root';
////$db_pass = 'password';
//$db_pass = 'mon97day';
//
//$pdo = new PDO($db_host.";".$db_name,$db_user, $db_pass);

?>