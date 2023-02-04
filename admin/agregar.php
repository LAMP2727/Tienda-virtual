<?php
require_once "../config/conexion.php";


if(empty($_GET['id'])){
    header('location: productos.php');
    }
    $iduser = $_GET['id'];
if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $aumentar = $_POST['aumentar'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];
        $n_precio = $_POST['n_precio'];
       
        $query = mysqli_query($conexion, "INSERT INTO bi_productos (cantidad,id)
        VALUE ($aumentar,$iduser)");
        if ($query) {
            $query_upd = mysqli_query($conexion,"CALL cantidad_productos('$aumentar','$iduser','$n_precio')");
            $result= mysqli_num_rows($query_upd);
          
               if($result > 0){
                                            
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
    `productos`.`precio_normal`, `productos`.`precio_rebajado`, `productos`.`cantidad`, 
    `productos`.`imagen`,`productos`.`id_categoria`,`productos`.`id_prov`,`productos`.`precio`
    ,`tmbtv_pro`.`id`
    FROM `productos`
    ,`tmbtv_pro`
    WHERE   `productos`.`id` = $iduser AND
    `tmbtv_pro`.`id` = `productos`.`id_prov`
    "  );
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
    $imagen = $data['imagen'];

    
    
    
    
    
    }}
    
    ?>
<?php include("includes/header.php"); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Actualizar producto</h1>
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
                                <input disabled id="nombre" class="form-control" type="text"  
                                name="nombre" placeholder="Nombre" required value="<?php echo $nombre ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input disabled id="cantidad" class="form-control" type="text"
                                name="cantidad" placeholder="Cantidad" required value="<?php echo $cantidad ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea disabled id="descripcion" class="form-control" 
                                name="descripcion" placeholder="<?php echo $descripcion ?>"
                                rows="3" required value="<?php echo $descripcion ?>"><?php echo $descripcion ?></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_normal">Precio Normal</label>
                                <input disabled id="p_normal" class="form-control" 
                                type="text" name="p_normal" placeholder="Precio Normal" required
                                value="<?php echo $precio_normal ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_rebajado">Precio Rebajado</label>
                                <input disabled id="p_rebajado" class="form-control" type="text" 
                                name="p_rebajado" placeholder="Precio Rebajado" required
                                value="<?php echo $precio_rebajado ?>">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="aumentar">Cantidad para aumentar</label>
                                <input  id="aumentar" class="form-control" type="text"
                                name="aumentar" placeholder="Cantidad a aumentar" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="n_precio">Precio de compra</label>
                                <input  id="n_precio" class="form-control" type="text"
                                name="n_precio" placeholder="precio de compra" required >
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