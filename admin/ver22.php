

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

        <?php
                    
                    if(empty($_GET['id'])){
                        header('location: consultas.php');
                        }
                        $iduser = $_GET['id'];
                                        $sql = mysqli_query($conexion, "SELECT * FROM `orden`
                                        WHERE
                                        `id` = '$iduser' ");
                                        $result_sql = mysqli_num_rows($sql);
                                        if ($result_sql == 0) {
                                        header('location: productos.php ');
                                        # code...
                                        }else{
                                        
                                        
                                        while($data = mysqli_fetch_array($sql)){
                    
                            
                                            $fecha = $data['created'];
                                           
                                         } } ?>


<?php
                    
                    if(empty($_GET['id'])){
                        header('location: consultas.php');
                        }
                        $iduser = $_GET['id'];
          $query = mysqli_query($conexion, "SELECT `orden`.`id`, `orden`.`customer_id`,
           `orden`.`total_price`, `tmbtv_cli`.`ced_comp`,
         `tmbtv_cli`.`nom_comp`, `tmbtv_cli`.`ape_comp`,
          `tmbtv_cli`.`tel_comp`, `tmbtv_cli`.`dir_comp`
     FROM `orden`
    , `tmbtv_cli`
   WHERE
`orden`.`customer_id` =  `tmbtv_cli`.`ced_comp`;");
        $result_sql = mysqli_num_rows($query);
        if ($result_sql == 0) {
        header('location: ver22.php ');
        # code...
        }else{

            
    while($data = mysqli_fetch_array($query)){
        $id = $data['id'];
        $customer_id = $data['customer_id'];
        $total_price = $data['total_price'];
        $ced_comp = $data['ced_comp'];
        $nom_comp = $data['nom_comp'];
        $ape_comp = $data['ape_comp'];
        $tel_comp = $data['tel_comp'];
        $dir_comp = $data['dir_comp'];



    }} ?>














    <h1 class="h3 mb-0 text-gray-800">Pedidos con ID <?php echo "$iduser" ?> con fecha de <?php echo "$fecha" ?></h1>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Nombre</th>
                        <th>Monto</th>
                        <th>Cantidad</th>
                        <th>Sub-total</th>
                        
                        
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                    
if(empty($_GET['id'])){
    header('location: consultas.php');
    }
    $iduser = $_GET['id'];
                    $query = mysqli_query($conexion, "SELECT `orden_articulos`.`id`, 
                    `orden_articulos`.`order_id`, `orden_articulos`.`product_id`, 
                    `orden_articulos`.`quantity`, `productos`.`id`,
                    `productos`.`nombre`,`productos`.`precio_rebajado`
                    ,`orden`.`id`,`orden`.`total_price`
                    FROM `orden_articulos`
                        , `productos`
                        ,`orden`
                    WHERE
                        `productos`.`id` = `orden_articulos`.`product_id` AND
                        `orden_articulos`.`order_id` = '$iduser' AND
                        `orden_articulos`.`order_id` =  `orden`.`id`");
                    while ($data = mysqli_fetch_assoc($query)) { 

                        $preci_rebajado=$data['precio_rebajado'];
                        $quantity=$data['quantity'];
                        $sub_total = $preci_rebajado * $quantity ;
                        $id_pro = $data['order_id'];
                        $total_price = $data['total_price'];

                        ?>
                        <tr>
                            
                            <td><?php echo $data['nombre']; ?></td>
                            <td><?php echo $data['precio_rebajado']; ?></td>
                            <td><?php echo $data['quantity']; ?></td>
                            <td><?php echo $sub_total; ?></td>
                           
                        </tr>
                    <?php } ?>
                    </tbody>
            </table>
            <h1 style="margin-left: 73%;">TOTAL:  <?php echo $total_price ?></h1>
                  
         
                              
                              
               
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