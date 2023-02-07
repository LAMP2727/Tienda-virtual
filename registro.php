
<?php 

include("config/conex.php");

$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
    header('location: login.php');
}else{
    if(!empty($_POST))
    { 
        if(empty($_POST['nom_comp']) || empty($_POST['usuarioo']) 
        || empty($_POST['password']) || empty($_POST['corr_ele']) 
        || empty($_POST['ced_comp']) || empty($_POST['ape_comp'])
        || empty($_POST['tel_comp']) || empty($_POST['dir_comp']))
        {

            $alert = 'Ingrese nombre y clave';
        } else{



$nom_comp=$_POST['nom_comp'];
$usuarioo=$_POST['usuarioo'];
$password=$_POST['password'];
$corr_ele=$_POST['corr_ele'];
$ced_comp=$_POST['ced_comp'];
$ape_comp=$_POST['ape_comp'];
$tel_comp=$_POST['tel_comp'];
$dir_comp=$_POST['dir_comp'];


$passwordd = md5($password);


$verificar_ced_comp=mysqli_query($conexion," SELECT * FROM tmbtv_cli WHERE ced_comp='$ced_comp'");

if(mysqli_num_rows($verificar_ced_comp) > 0){
  echo'
  <script> 
  alert("Este numero de cedula ya esta registrado, por favor ingrese otro");
  window.location= "login.php";
  </script>
  '; 
  exit();
}


$verificar_corr_ele=mysqli_query($conexion," SELECT * FROM tmbtv_cli WHERE corr_ele='$corr_ele'");

if(mysqli_num_rows($verificar_corr_ele) > 0){
  echo'
  <script> 
  alert("Este correo ya esta registrado, por favor ingrese otro");
  window.location= "login.php";
  </script>
  '; 
  exit();
}
$verificar_usuario= mysqli_query($conexion," SELECT * FROM tmbtv_cli WHERE usuarioo='$usuarioo'");
 
if(mysqli_num_rows($verificar_usuario) > 0){
  echo'
  <script> 
  alert("Este usuario ya esta registrado, por favor ingrese otro");
  window.location= "login.php";
  </script>
  '; 
  exit();
}
$conexion=mysqli_connect("localhost","root","Kevin$9570","card");



$query ="INSERT INTO tmbtv_cli (nom_comp, usuarioo, password, corr_ele 
,ced_comp,ape_comp,tel_comp,dir_comp ) 
   VALUES('$nom_comp', '$usuarioo', '$passwordd', 
   '$corr_ele' ,'$ced_comp',
   '$ape_comp','$tel_comp','$dir_comp')";



$ejecutar=mysqli_query($conexion,$query);

if($ejecutar){

  $query ="INSERT INTO usuarios (usuario, nombre, clave, rol  ) 
   VALUES('$usuarioo', '$nom_comp $ape_comp', '$passwordd', 
   'personal')";



$ejecutar=mysqli_query($conexion,$query);

if($ejecutar){



  
  echo '
  <script> 
  alert("usuario almacenado. Por favor inicie seccion ");
  window.location= "login.php";
  </script> 
  ';
  
}}else{
 echo'
 <script> 
 alert("usuario no almacenado");
 window.location= "index.php";
 </script> 
 ';
 
}
        }}}

mysqli_close($conexion);
?>