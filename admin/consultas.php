

<?php include("config/conexion.php"); ?>
<?php
include("config/conex.php")
?>
<!DOCTYPE html>
<html lang="es">

<head>


<?php include("config/conex.php");  include("includes/header.php");
?>

<body>
   <!-- Navigation-->
   
  
                <style>
        .container {
            padding: 20px;
        }

        input[type="number"] {
            width: 20%;
        }
    </style>
     <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
    <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Usuario</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                <?php 
                    $query = mysqli_query($conexion, 
                    "SELECT o.id, o.customer_id, c.usuarioo, o.total_price, o.created, o.status, s.id_estatus, s.des_estatus FROM orden o 
                    INNER JOIN tmbtv_cli c ON o.customer_id = c.ced_comp 
                    INNER JOIN status s ON o.status = s.id_estatus
                    WHERE o.status = '1'");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['usuarioo']; ?></td>
                            <td><?php echo $data['total_price']; ?></td>
                            <td><?php echo $data['created']; ?></td>
                            <td><?php echo $data['des_estatus']; ?></td>
                            <td>
                            <form method="post" action="ver.php?accion=cli&id=<?php echo $data['id']; ?>&usu=<?=$data['usuarioo']?>" >
                                    <button class="btn btn-info" type="submit">Ver</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php }?>
                </tbody>
            </table>
        </div>
    </div>
</div>
</div>
    </div>
</div>


<?php include("includes/footer.php"); ?>
    <!-- Footer -->
    <!-- Bootstrap core JS-->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Core theme JS-->
    <script src="../assets/js/jquery-3.6.0.min.js"></script>
    <script src="../assets/js/scripts.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    
</body>

</html>        