<?php
require_once "../config/conexion.php";


if(empty($_GET['id'])){
    header('location: index.php');
    }
    $iduser = $_GET['id'];
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $query = mysqli_query($conexion,"UPDATE categorias
        SET categoria='$nombre'
        WHERE  id = '$iduser' ");
        if ($query) {
            header('Location: categorias.php');
        }
    }
}
include("includes/header.php"); ?>
<!-- Custom JS validations -->


<?php
if(empty($_GET['id'])){
    header('location: index.php');
    }
    $iduser = $_GET['id'];
    $sql=mysqli_query($conexion," SELECT * FROM `categorias`
    WHERE   `id` = $iduser" );
    $result_sql = mysqli_num_rows($sql);
    if ($result_sql == 0) {
    header('location: index.php ');
    # code...
    }else{
    
    
    while($data = mysqli_fetch_array($sql)){
    $id = $data['id'];
    $nombre = $data['categoria'];
   
    
    
    
    }}
    
    ?>

<script src="../libreria/validaciones.php"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar categoria</h1>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">

                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                    <label for="nombre">Nombre</label>
                                <input onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();" id="nombre" class="form-control" type="text" 
                                name="nombre" placeholder="Nombre" required value="<?php echo $nombre ?>" >
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>