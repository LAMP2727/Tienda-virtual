
<?php
	$conexion = new mysqli("localhost","root","","card"); 
	
	if(mysqli_connect_error()){
		echo 'Conexion Fallida : ', mysqli_connect_error();
		exit();
	}
?>