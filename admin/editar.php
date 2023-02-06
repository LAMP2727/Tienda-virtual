<?php
require_once "../config/conexion.php";


if(empty($_GET['id'])){
    header('location: productos.php');
    }
    $iduser = $_GET['id'];

if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['foto'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $foto = $fecha . ".jpg";
        $destino = "../assets/img/" . $foto;
        $query = mysqli_query($conexion, "UPDATE productos
        SET nombre='$nombre'
        ,descripcion='$descripcion'
         ,precio_normal='$p_normal'
         ,precio_rebajado='$p_rebajado'
         ,id_categoria='$categoria'
        WHERE  id = '$iduser' ");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: productos.php');
            }
        }
    }
}



if(empty($_GET['id'])){
    header('location: productos.php');
    }
    $iduser = $_GET['id'];
  
    $sql=mysqli_query($conexion,"SELECT `productos`.`id`, `productos`.`nombre`, `productos`.`descripcion`,
    `productos`.`precio_normal`, `productos`.`precio_rebajado`, `productos`.`cantidad`, `productos`.`imagen`,
     `productos`.`id_categoria`
    FROM `productos`
    WHERE   `productos`.`id` = '$iduser'" );
    $result_sql = mysqli_num_rows($sql);
    if ($result_sql == 0) {
    header('location: productos7.php ');
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
    $imagen = $data['imagen'];

    
    
    
    
    
    }}
    
    ?>
<?php include("includes/header.php"); ?>
<!-- Custom JS validations -->
<script src="../libreria/validaciones.php"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Editar productos</h1>
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
                                <input onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();" id="nombre" class="form-control" type="text" 
                                name="nombre" placeholder="Nombre" required value="<?php echo $nombre ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                        
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();" disabled id="cantidad" class="form-control" type="text"
                                name="cantidad" placeholder="Cantidad"  value="<?php echo $cantidad ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea onKeyUP="this.value=this.value.toUpperCase();" id="descripcion" class="form-control" 
                                name="descripcion" placeholder="<?php echo $descripcion ?>"
                                rows="3" required value="<?php echo $descripcion ?>"><?php echo $descripcion ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_normal">Precio Normal</label>
                                <input onkeypress="return SoloNumeros(event);" id="p_normal" class="form-control" 
                                type="text" name="p_normal" placeholder="Precio Normal" required
                                value="<?php echo $precio_normal ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_rebajado">Precio Rebajado</label>
                                <input onkeypress="return SoloNumeros(event);" id="p_rebajado" class="form-control" type="text" 
                                name="p_rebajado" placeholder="Precio Rebajado" required
                                value="<?php echo $precio_rebajado ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="categoria">Categoria</label>
                                <select id="categoria" class="form-control" name="categoria" required>
                                    <?php
                                    $categorias = mysqli_query($conexion, "SELECT * FROM categorias");
                                    foreach ($categorias as $cat) { ?>
                                   
                                        <option value="<?php echo $cat['id']; ?>"><?php echo $cat['categoria']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="imagen">Foto</label>
                                <input type="file" class="form-control" name="foto" required
                                 class="img-thumbnail" src="../assets/img/<?php echo $imagen ?>" width="50">
                            
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Actualizar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>