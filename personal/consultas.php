
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
    <h1 class="h3 mb-0 text-gray-800">Pedidos</h1>
    </div>
<div class="row">
    <div class="col-md-12">
        <div class="table-responsive">
            <table class="table table-hover table-bordered" style="width: 100%;">
                <thead class="thead-dark">
                    <tr>
                        <th>Id</th>
                        <th>Monto</th>
                        <th>Fecha</th>
                        <th>Estado</th>
                        <th></th>
                        
                    </tr>
                </thead>
                <tbody>
                    <?php
                     if (isset($_SESSION['USUADMIN'])){
   
                        $USUADMIN= $_SESSION['USUADMIN'];
            
                        include("config/conex.php");
            
                        $query = mysqli_query($conexion, "SELECT `usuarios`.`usuario`,
                         `tmbtv_cli`.`usuarioo`, `usuarios`.`clave`, `usuarios`.`rol`, 
                         `tmbtv_cli`.`ced_comp`
                        FROM `usuarios`
                            , `tmbtv_cli`
                           WHERE
                           `usuarios`.`usuario`= `tmbtv_cli`.`usuarioo` AND
                           `usuarios`.`usuario`= '$USUADMIN'");
                   
                       $result= mysqli_num_rows($query);
            
                       if($result == 1)
                       {
                           $data = mysqli_fetch_array($query);
                           $ced_comp = $data['ced_comp'];
                       }
                    $query = mysqli_query($conexion, "SELECT `orden`.`id`, `orden`.`customer_id`
                    , `orden`.`total_price`, `orden`.`created`, `orden`.`status`,
                     `status`.`id_estatus`, `status`.`des_estatus`
                    FROM `orden`
                        , `status` 
                    WHERE
                     `customer_id` = $ced_comp  AND
                     `orden`.`status`= `status`.`id_estatus`");
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <tr>
                            <td><?php echo $data['id']; ?></td>
                            <td><?php echo $data['total_price']; ?></td>
                            <td><?php echo $data['created']; ?></td>
                            <td><?php echo $data['des_estatus']; ?></td>
                            <td>
                            <form method="post" action="ver.php?accion=cli&id=<?php echo $data['id']; ?>" >
                                    <button class="btn btn-info" type="submit">Ver</button>
                                </form>
                                
                            </td>
                        </tr>
                    <?php }} ?>
                </tbody>
            </table>
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