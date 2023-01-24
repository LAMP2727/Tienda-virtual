<?php require_once "../config/conexion.php";

$id=$_GET['id'];

$sql="SELECT * FROM productos WHERE id='$id'";
$query=mysqli_query($conexion, $sql);

$row=mysqli_fetch_array($query);

$id=$_POST['id'];
$nombre=$_POST['nombre'];
$precio_normal=$_POST['precio_normal'];
$precio_rebajado['precio_rebajado'];
$cantidad=$_POST['cantidad'];
$id_categoria=$_POST['id_categoria'];
$imagen=$_POST['imagen'];

$sql="UPDATE alumno SET  nombre='$nombre',precio_normal='$precio_normal',precio_rebajado='$precio_rebajado',cantidad='$cantidad',id_categoria='$id_categoria',imagen='$imagen' WHERE id='$id'";
$query=mysqli_query($conexion,$sql);

    if($query){
        Header("Location: productos.php");
    }
?>
