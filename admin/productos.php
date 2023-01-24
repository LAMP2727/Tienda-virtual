
<?php

include("config/conex.php");

if (isset($_POST)) {
    if (!empty($_POST)) {
        $nombre = $_POST['nombre'];
        $id = $_POST['id'];
        $cantidad = $_POST['cantidad'];
        $descripcion = $_POST['descripcion'];
        $p_normal = $_POST['p_normal'];
        $p_rebajado = $_POST['p_rebajado'];
        $id_prove = $_POST['id_prove'];
        $p_compra = $_POST['p_compra'];
        $categoria = $_POST['categoria'];
        $img = $_FILES['foto'];
        $name = $img['name'];
        $tmpname = $img['tmp_name'];
        $fecha = date("YmdHis");
        $foto = $fecha . ".jpg";
        $destino = "../assets/img/" . $foto;
        $query = mysqli_query($conexion, "INSERT INTO productos(id, nombre, descripcion,
         precio_normal, precio_rebajado, cantidad, imagen, id_categoria, id_prov, precio) 
         VALUES ('$id', '$nombre', '$descripcion', '$p_normal', '$p_rebajado', $cantidad,
          '$foto', $categoria, $id_prove, $p_compra)");
        if ($query) {
            if (move_uploaded_file($tmpname, $destino)) {
                header('Location: index.php');
            }
        }
    }
}
include("includes/header.php"); ?>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Productos</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirProducto"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Imagen</th>

                        <!--<th>Id</th>-->
                        
                        <th>Nombre</th>
                        <th>Descripción</th>
                        <th>Precio Normal</th>
                        <th>Precio Rebajado</th>
                        <th>Cantidad</th>
                        <th>Categoria</th>
                        <th>Proveedor</th>
                        <th>Precio</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT `productos`.`id`, `productos`.`nombre`,
                     `productos`.`descripcion`, `productos`.`precio_normal`, `productos`.`precio_rebajado`,
                      `productos`.`cantidad`, `productos`.`imagen`, `productos`.`id_categoria`,
                       `categorias`.`id`, `categorias`.`categoria`, `productos`.`id_prov`,
                        `tmbtv_pro`.`id`, `tmbtv_pro`.`TMPRO_NOC`, `productos`.`precio`
                    FROM `productos` 
                        LEFT JOIN `categorias` ON `productos`.`id_categoria` = `categorias`.`id`
                        LEFT JOIN `tmbtv_pro` ON `productos`.`id_prov` = `tmbtv_pro`.`id`;");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><img class="img-thumbnail" src="../assets/img/<?php echo $data['imagen']; ?>" width="50"></td>
                            
                            <!--<td><?php echo $data['id']; ?></td>-->
                            
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['descripcion']; ?></td>
                            <td><?php echo $data['precio_normal']; ?></td>
                            <td><?php echo $data['precio_rebajado']; ?></td>
                            <td><?php echo $data['cantidad']; ?></td>
                            <td><?php echo $data['categoria']; ?></td>
                            <td><?php echo $data['TMPRO_NOC']; ?></td>
                            <td><?php echo $data['precio']; ?></td>
                            <td>
                                <form method="post" action="agregar.php?id=<?php echo $data['id']; ?>" >
                                    <button class="btn btn-success" type="buton">Agregar</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="editar.php?id=<?php echo $data['id']; ?>" >
                                    <button class="btn btn-info" type="submit">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="eliminar.php?accion=pro&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
                                    <button class="btn btn-danger" type="submit">Eliminar</button>
                                </form>
                            </td>
                        </tr>
                    <?php } ?>
                </tbody>
            </table>
        </div>
    </div>
</div>
<div id="productos" class="modal fade" tabindex="-1" role="dialog" aria-labelledby="my-modal-title" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header bg-gradient-primary text-white">
                <h5 class="modal-title" id="title">Nuevo Producto</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="nombre">Nombre</label>
                                <input id="nombre" class="form-control" type="text" name="nombre" placeholder="Nombre" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="cantidad">Cantidad</label>
                                <input id="cantidad" class="form-control" type="text" name="cantidad" placeholder="Cantidad" required>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="descripcion">Descripción</label>
                                <textarea id="descripcion" class="form-control" name="descripcion" placeholder="Descripción" rows="3" required></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_normal">Precio Normal</label>
                                <input id="p_normal" class="form-control" type="text" name="p_normal" placeholder="Precio Normal" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_rebajado">Precio Rebajado</label>
                                <input id="p_rebajado" class="form-control" type="text" name="p_rebajado" placeholder="Precio Rebajado" required>
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
                                <input type="file" class="form-control" name="foto" required>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="id_prove">Proveedor</label>
                                <select id="id_prove" class="form-control" name="id_prove" required>
                                    <?php
                                    $id_prove = mysqli_query($conexion, "SELECT * FROM tmbtv_pro");
                                    foreach ($id_prove as $prove) { ?>
                                        <option value="<?php echo $prove['id']; ?>"><?php echo $prove['TMPRO_NOC']; ?></option>
                                    <?php } ?>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="p_compra">Precio de Compra</label>
                                <input id="p_compra" class="form-control" type="text" name="p_compra" placeholder="Precio de Compra" required>
                            </div>
                        </div>
                    </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>
