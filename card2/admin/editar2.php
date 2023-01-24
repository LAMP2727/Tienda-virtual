<?php include("../config/conex.php");

$iduser = $_GET['id'];

if(!empty($_POST)) {

    $alert='';
    if(empty($_POST['nombre']) || empty($_POST['descripcion']) || empty($_POST['precio_normal']) || empty($_POST['precio_rebajado'])
    || empty($_POST['cantidad'])|| empty($_POST['imagen'])|| empty($_POST['id_categoria'])) 
{
    $alert=' <p class="msg_error" > Todos los campos son obligatorios</p>';
}else{

$nombre = $_POST['nombre'];
$descripcion = $_POST['descripcion'];
$precio_normal = $_POST['precio_normal'];
$precio_rebajado = $_POST['precio_rebajado'];
$cantidad = $_POST['cantidad'];
$imagen = $_POST['imagen'];
$id_categoria = $_POST['id_categoria'];




include("../config/conex.php");

    $query = mysqli_query($conexion,"SELECT `productos`.`id`, `productos`.`nombre`, `productos`.`descripcion`,
     `productos`.`precio_normal`, `productos`.`precio_rebajado`, `productos`.`cantidad`, `productos`.`imagen`,
      `productos`.`id_categoria`
    FROM `productos`
    
WHERE   `productos`.`id` = '$iduser' and
`productos`.`nombre` = '$nombre' and
`productos`.`descripcion` = '$descripcion' and
`productos`.`precio_normal` = '$precio_normal' and
`productos`.`precio_rebajado` = '$precio_rebajado' and
`productos`.`cantidad` = '$cantidad' and
`productos`.`imagen` = '$imagen' and
`productos`.`id_categoria` = '$id_categoria' 

");
$result = mysqli_fetch_array($query);

if($result > 0){
$alert='<p class="msg_error"> Error, el producto ya esta registrado con estas caracteristicas</p>';
} else {


    include("../config/conex.php");

$query_update = mysqli_query($conexion, "UPDATE productos
         SET nombre='$nombre'
         ,descripcion='$descripcion'
          ,precio_normal='$precio_normal'
          ,precio_rebajado='$precio_rebajado'
          ,cantidad='$cantidad'
          ,imagen='$imagen'
          ,id_categoria='$id_categoria'
         WHERE  id = '$iduser' ");

if($query_update){
$alert=' <p class="msg_save" >producto Modificado </p>';
} else  {
$alert=' <p class="msg_error" >Error al agregar </p>';
}
}
}
}
include("../config/conex.php");

if(empty($_GET['id'])){
header('location: productos.php');
}
$iduser = $_GET['id'];
$sql=mysqli_query($conexion,"SELECT `productos`.`id`, `productos`.`nombre`, `productos`.`descripcion`,
`productos`.`precio_normal`, `productos`.`precio_rebajado`, `productos`.`cantidad`, `productos`.`imagen`,
 `productos`.`id_categoria`
FROM `productos`
WHERE   `productos`.`id` = $iduser" );
$result_sql = mysqli_num_rows($sql);
if ($result_sql == 0) {
header('location: productos.php ');
# code...
}else{


while($data = mysqli_fetch_array($sql)){
$id = $data['id'];
$nombre = $data['nombre'];
$descripcion = $data['descripcion'];
$precio_normal = $data['precio_normal'];
$precio_rebajado = $data['precio_rebajado'];
$cantidad = $data['cantidad'];
$id_categoria = $data['id_categoria'];





}}

?>


<!doctype html>
<html lang="en">
  <head>
    <title>Editar marca</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <script> <?php include("../includes/validaciones.php"); ?></script>
<body oncopy="return false" onpaste="return false">    
   
<div class="container">
      <div class="row">
          <div class="col-md-4">
          </br></br></br></br>
          </div>
          <div class="container">
      <div class="row">
          <div class="col-md-4">
              
          </div>
<div class="col-md-4">
     <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
    <div class="card">
        <div class="card-header">
        <h2> <p class="text-info text-center" >¿ACTUALIZAR PRODUCTOS?</p></h2>
        </div>
     <div class="card-body">         
    <div class = "form-group">


    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="nombre" id="nombre" placeholder="Ingrese el marca " value="<?php echo $nombre ?>">
<br>
    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="descripcion" id="descripcion" placeholder="Ingrese descripcion " value="<?php echo $descripcion ?>">
<br>
    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="precio_normal" id="precio_normal" placeholder="Ingrese el precio " value="<?php echo $precio_normal ?>">
<br>
    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="precio_rebajado" id="precio_rebajado" placeholder="Ingrese el precio rebajado " value="<?php echo $precio_rebajado ?>">
<br>
    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="cantidad" id="cantidad" placeholder="Ingrese la cantidad " value="<?php echo $cantidad ?>">
<br>
  
    <input type="text" onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();"class="form-control" name="id_categoria" id="id_categoria" placeholder="Ingrese la categoria " value="<?php echo $id_categoria ?>">
<br>
<div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen">Foto</label>
                                <input type="file" class="form-control" name="foto" required value="<?php echo $imagen ?>>
                            </div>


<div class="alert"><?php echo isset($alert) ? $alert : ''; ?></div>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <button type="submit" class="btn btn-primary btn-lg btn-block">Aceptar</button>
    <a href="productos.php" class="btn btn-danger btn-lg btn-block" role="button" aria-disabled="true">Cancelar</a>
    
</form>
</div>