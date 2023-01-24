
<?php

include("config/conex.php");

if (isset($_POST)) {
    if (!empty($_POST)) {
        $TMPRO_RIF = $_POST['TMPRO_RIF'];
        $TMPRO_NOC = $_POST['TMPRO_NOC'];
        $TMPRO_TEL = $_POST['TMPRO_TEL'];
        $TMPRO_DID = $_POST['TMPRO_DID'];
        $query = mysqli_query($conexion, "INSERT INTO tmbtv_pro(TMPRO_RIF, TMPRO_NOC, TMPRO_DID, TMPRO_TEL) 
        VALUES ('$TMPRO_RIF', '$TMPRO_NOC', '$TMPRO_DID', $TMPRO_TEL)");
        if ($query) {
        
        }
    }
}
include("includes/header.php"); ?>
<script src="../libreria/validaciones.php"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Proveedor</h1>
    <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm" id="abrirProducto"><i class="fas fa-plus fa-sm text-white-50"></i> Nuevo</a>
</div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <!--<th>Id</th>-->
                        <th>RIF</th>
                        <th>Nombre Compañia</th>
                        <th>Direccion Descripcion</th>
                        <th>Telefono</th>
                        <th></th>
                        <th></th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    $query = mysqli_query($conexion, "SELECT * FROM tmbtv_pro ORDER BY id DESC ");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <!--<td><?php echo $data['id']; ?></td>-->
                            
                            <td><?php echo $data['TMPRO_RIF']; ?></td>
                            <td><?php echo $data['TMPRO_NOC']; ?></td>
                            <td><?php echo $data['TMPRO_DID']; ?></td>
                            <td><?php echo $data['TMPRO_TEL']; ?></td>
                            
                            <td>
                                <form method="post" action="editar_prov.php?id=<?php echo $data['id']; ?>" >
                                    <button class="btn btn-info" type="submit">Editar</button>
                                </form>
                            </td>
                            <td>
                                <form method="post" action="eliminar.php?accion=prov&id=<?php echo $data['id']; ?>" class="d-inline eliminar">
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
                <h5 class="modal-title" id="title">Nuevo Proveedor</h5>
                <button class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                            <label for="TMPRO_RIF">Rif</label>
                                <input onkeypress="return Especialess(e);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_RIF" class="form-control" type="text" 
                                name="TMPRO_RIF" placeholder="Numero de Rif" required >
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TMPRO_NOC">Nombre Compañia</label>
                                <input onkeypress="return Especiales(event);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_NOC" class="form-control" type="text" 
                                name="TMPRO_NOC" placeholder="Nombre" required >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TMPRO_TEL">Telefono</label>
                                <input onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_TEL" class="form-control" type="text"
                                name="TMPRO_TEL" placeholder="Numero de Telefono"  >
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="TMPRO_DID">Direccion Descripcion</label>
                                <input onkeypress="return Especial(e);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_DID" class="form-control" type="text" 
                                name="TMPRO_DID" placeholder="Direccion" required >
                            </div>
                        </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>