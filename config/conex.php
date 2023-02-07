
<?php
	$conexion = new mysqli("localhost","root","Kevin$9570","card"); 
	

	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>