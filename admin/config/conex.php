
<?php

require_once '../config/config.php';

	$conexion = new mysqli(HOST,USERBD,PASS, BBDD); 
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>