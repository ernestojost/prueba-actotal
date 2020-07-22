<?php
// Connection
$server = 'localhost';
$user = 'root';
$password = '';
$database = 'prueba_actotal';
$db = mysqli_connect($server, $user, $password, $database);

mysqli_query($db, "SET NAMES 'utf8'");

// Log in
if(!isset($_SESSION)){
	session_start();
}


