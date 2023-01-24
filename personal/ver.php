
<?php 
session_start();
if($_SESSION['IDADMIN'] !="personal")
{
    header('location: ../index.php');
}

if(empty($_SESSION['active']))
{
    header('location: ../index.php');
}
?>
<?php include("config/conexion.php"); ?>
<?php
include("config/conex.php")
?>
<!DOCTYPE html>
<html lang="es">

<head>


<?php include("config/conex.php"); ?>
<!DOCTYPE html>
<html lang="en">
<link rel="stylesheet" href="../styles.css">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
    <meta name="description" content="" />
    <meta name="author" content="" />
    <title>FULL STORE!!!</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="../img/logo.png" />
    <!-- Bootstrap icons-->
    <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" /> -->
    <!-- Core theme CSS (includes Bootstrap)-->
    <link href="../assets/css/styles.css" rel="stylesheet" />
    <link href="../assets/css/estilos.css" rel="stylesheet" />
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <link rel="stylesheet" href="../estiloscss.css">
    
</head>

<body>
   <!-- Navigation-->
    <div class="container d-flex justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light " >
            <div class="container-fluid ">
            <a class="navbar-brand" href="index.php"><img src="../img/logoo.png" width="200" alt="alternative"></a> 
               
                            
                    </ul>
                </div>
            </div>
        </nav> 
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
            <h1 style="margin-left: 75%;">TOTAL:  <?php echo $total_price ?></h1>
        </div>
    </div>
</div>
</div>
    </div>
</div>



    <!-- Footer-->
    <footer class=" text-center text-white " style="background-color:#212529;">
        <div class="container d-flex justify-content-center">
            <div class="row text-center d-flex justify-content-center" >
                <div class=" d-flex justify-content-center">
                    <div class="pull-right " >
                        <h6 class="">ENCUENTRANOS EN LAS REDES</h6>
                            <div class="text-center redes-footer d-flex justify-content-center "  >
                                <a href="https://www.facebook.com/"><img class="img-profile rounded-circle" src="../img/fac.webp" width="30" height="30"></a>
                                <a href="https://twitter.com/"><img class="img-profile rounded-circle" src="../img/twi.webp" width="30" height="30"></a>
                                <a href="https://www.youtube.com/"><img class="img-profile rounded-circle" src="../img/wa.webp" width="30" height="30"></a>
                                <a href="https://www.instagram.com/"><img class="img-profile rounded-circle" src="../img/inst.webp" width="30" height="30"></a>
                            </div>
                    </div>
                </div>
            </div>  
        </div>
            <!-- Grid container -->
            <div class="container p-4">
            <!-- Section: Text -->
                <section class="mb-4">
                    <p>
                    Nos alegramos de que estés aquí. Cuéntanos, 
                    ¿en qué podemos ayudarte? 
                    Estamos para responder todas tus inquietudes, 
                    así que no dudes en preguntar. En
                    nuestras redes sociales, estan arriba contactanos.
                    Pais Venezuela, Estado Tachira, San Cristobal.
                    TLF: 0412-7505134
                    </p>
                </section>
            <!-- Section: Text -->
            </div>
            <!-- Grid container -->
            <!-- Copyright -->
                <div class="text-center p-3" style="background-color: rgba(0, 0, 0, 0.2) ">
                    © 2023 Copyright:
                    <a class="text-white" href="../index.php">FULL STORE!!!</a>
                </div>
            <!-- Copyright -->
    </footer>
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