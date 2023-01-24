 <?php

include 'bd.php';
$nom_comp=$_POST['nom_comp'];
$usuarioo=$_POST['usuarioo'];
$password=$_POST['password'];
$corr_ele=$_POST['corr_ele'];
$ced_comp=$_POST['ced_comp'];
$ape_comp=$_POST['ape_comp'];
$tel_comp=$_POST['tel_comp'];
$dir_comp=$_POST['dir_comp'];




$verificar_corr_ele=mysqli_query($conexion," SELECT * FROM tmbtv_cli WHERE corr_ele='$corr_ele'");

if(mysqli_num_rows($verificar_corr_ele) > 0){
  echo'
  <script> 
  alert("Este correo ya esta registrado, por favor ingrese otro");
  window.location= "index.php";
  </script>
  '; 
  exit();
}
$verificar_usuario= mysqli_query($conexion," SELECT * FROM tmbtv_cli WHERE usuarioo='$usuarioo'");
 
if(mysqli_num_rows($verificar_usuario) > 0){
  echo'
  <script> 
  alert("Este usuario ya esta registrado, por favor ingrese otro");
  window.location= "index.php";
  </script>
  '; 
  exit();
}
$conexion=mysqli_connect("localhost","root","","registrodocente");



$query ="INSERT INTO tmbtv_cli (nom_comp, usuarioo, password, corr_ele , rol,ced_comp,ape_comp,tel_comp,dir_comp ) 
   VALUES('$nom_comp', '$usuarioo', '$password', '$corr_ele' , 'personal','$ced_comp','$ape_comp','$tel_comp','$dir_comp')";



$ejecutar=mysqli_query($conexion,$query);

if($ejecutar){
  
  echo '
  <script> 
  alert("usuario almacenado");
  window.location= "index.php";
  </script> 
  ';
  
}else{
 echo'
 <script> 
 alert("usuario no almacenado");
 window.location= "index.php";
 </script> 
 ';
 
}


mysqli_close($conexion);
?>