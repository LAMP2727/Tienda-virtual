<?php
//DB details
require_once 'config.php';
$dbHost = HOST;
$dbUsername = USERBD;
$dbPassword = PASS;
$dbName = BBDD;

//Create connection and select DB
$db = new mysqli($dbHost, $dbUsername, $dbPassword, $dbName);

if ($db->connect_error) {
    die("No hay Conexion con la base de datos: " . $db->connect_error);
}
