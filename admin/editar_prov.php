<?php
require_once "../config/conexion.php";


if(empty($_GET['id'])){
    header('location: index.php');
    }
    $iduser = $_GET['id'];
if (isset($_POST)) {
    if (!empty($_POST) ) {
        $TMPRO_RIF = $_POST['TMPRO_RIF'];
        $TMPRO_NOC = $_POST['TMPRO_NOC'];
        $TMPRO_TEL = $_POST['TMPRO_TEL'];
        $TMPRO_DID = $_POST['TMPRO_DID'];
        $query = mysqli_query($conexion,"UPDATE tmbtv_pro
        SET TMPRO_RIF='$TMPRO_RIF'
        , TMPRO_NOC='$TMPRO_NOC'
        , TMPRO_TEL='$TMPRO_TEL'
        , TMPRO_DID='$TMPRO_DID'
        WHERE  id = '$iduser' ");
        if ($query) {
            header('Location: proveedor.php');
        }
    }
}
include("includes/header.php");  ?>
<!-- Custom JS validations -->


<?php
if(empty($_GET['id'])){
    header('location: index.php');
    }
    $iduser = $_GET['id'];
    $sql=mysqli_query($conexion," SELECT * FROM `tmbtv_pro`
    WHERE   `id` = $iduser" );
    $result_sql = mysqli_num_rows($sql);
    if ($result_sql == 0) {
    header('location: index.php ');
    # code...
    }else{
    
    
    while($data = mysqli_fetch_array($sql)){
    $id = $data['id'];
    $TMPRO_RIF = $data['TMPRO_RIF'];
    $TMPRO_NOC = $data['TMPRO_NOC'];
    $TMPRO_TEL = $data['TMPRO_TEL'];
    $TMPRO_DID = $data['TMPRO_DID'];
    
    
    
    }}
    
    ?>

<script src="../libreria/validaciones.php"></script>
<div class="d-sm-flex align-items-center justify-content-between mb-4">
<h5 class="modal-title" id="title">Editar Proveedor</h5>
            </div>
            <div class="modal-body">
                <form action="" method="POST" enctype="multipart/form-data" autocomplete="off">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TMPRO_RIF">Rif</label>
                                <input onkeypress="return Especialess(e);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_RIF" class="form-control" type="text" 
                                name="TMPRO_RIF" placeholder="V-XXXXXXXX-F" maxlength="12" required value="<?php echo $TMPRO_RIF ?>" >
                            </div>
                            </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TMPRO_NOC">Nombre Compañia</label>
                                <input onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_NOC" class="form-control" type="text" 
                                name="TMPRO_NOC" placeholder="Nombre" required value="<?php echo $TMPRO_NOC ?>" >
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group">
                                <label for="TMPRO_TEL">Telefono</label>
                                <input onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_TEL" class="form-control" type="text"
                                name="TMPRO_TEL" placeholder="Cantidad"  value="<?php echo $TMPRO_TEL ?>">
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <label for="TMPRO_DID">Direccion Descripcion</label>
                                <input onkeypress="return Especial(e);" onKeyUP="this.value=this.value.toUpperCase();" id="TMPRO_DID" class="form-control" type="text" 
                                name="TMPRO_DID" placeholder="" required value="<?php echo $TMPRO_DID ?>" >
                            </div>
                        </div>
                    <button class="btn btn-primary" type="submit">Registrar</button>
                </form>
            </div>
        </div>
    </div>
</div>
<?php include("includes/footer.php"); ?>