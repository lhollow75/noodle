<?php
define("SQL_HOST", "localhost");
define("SQL_USER", "root");
define("SQL_PASS", "root");
define("SQL_DBNAME", "noodles");
try
{
	$mysql = new PDO("mysql:dbname=".SQL_DBNAME.";host=".SQL_HOST,SQL_USER,SQL_PASS);
}
catch(Exception $e)
{
	die('Erreur : '.$e->getMessage());
}
?>