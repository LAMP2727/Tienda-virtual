
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
    <link rel="stylesheet" href="../estiloscss.css">
</head>

<body>
    <a href="#" class="btn-flotante" id="btnCarrito">Carrito <span class="badge bg-success" id="carrito">0</span></a>
    <!-- Navigation-->
    <div class="container d-flex justify-content-center">
        <nav class="navbar navbar-expand-lg navbar-light " >
            <div class="container-fluid ">
            <a class="navbar-brand" href="index.php"><img src="../img/logoo.png" width="200" alt="alternative"></a> 
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarNav">
                    <ul class="navbar-nav">
                        <button type="button" class="btn btn-outline-secondary">
                            <a href="#" class="nav-link text-info" category="all">Todo</a>
                        </button>
                        
                        <?php
                        include("config/conexion.php"); 
                        $query = mysqli_query($conexion, "SELECT * FROM categorias");
                        while ($data = mysqli_fetch_assoc($query)) { ?>
                            <button type="button" class="btn btn-outline-secondary">
                                <a href="#" class="nav-link text-body" category="<?php echo $data['categoria']; ?>"><?php echo $data['categoria']; ?></a>
                                <?php } ?>
                            </button>
                            
                    </ul>
                </div>
            </div>
        </nav> <?php

if (isset($_SESSION['USUADMIN'])){
   
    $DES_ADMIN= $_SESSION['USUADMIN'];

                $query = mysqli_query($conexion, "SELECT nombre
                FROM usuarios 
                where
                usuario = '$DES_ADMIN';
                ");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                            <h1 style="margin-left: 15px;border-top-width: 10px;padding-top: 10px;"><?php echo $data['nombre']; ?></h1>
                           
                            <?php
                    }}}
                            ?>
                    
                   
                           
         
        <nav class="navbar navbar-expand-lg navbar-light " >
            
                            <button type="button" class="btn btn-outline-secondary"  style="margin-left: 30px;margin-right: 0.;margin-right: 0px;" >
                            <a href="../salir.php" class="nav-link text-info" >Salir</a>
                        </button>


                        </div></div> </div>
                           
                   
    <!-- Header-->


    


    <header class="bg-dark py-5">
        <div class="container px-4 px-lg-5 my-5">
            <div class="text-center text-white">
            <a href=""> <img src="../img/post.jpg" width="100%" ></a> 
                </div>
        </div>
    </header>
    <section class="py-5">
        <div class="container px-4 px-lg-5">
            <div class="row gx-4 gx-lg-5 row-cols-2 row-cols-md-3 row-cols-xl-4 justify-content-center">
                <?php
                $query = mysqli_query($conexion, "SELECT p.*, c.id AS id_cat, c.categoria FROM productos p INNER JOIN categorias c ON c.id = p.id_categoria");
                $result = mysqli_num_rows($query);
                if ($result > 0) {
                    while ($data = mysqli_fetch_assoc($query)) { ?>
                        <div class="col mb-5 productos" category="<?php echo $data['categoria']; ?>">
                            <div class="card h-100">
                                <!-- Insignia de venta-->
                                <div class="badge bg-danger text-white position-absolute" style="top: 0.5rem; right: 0.5rem"><?php echo ($data['precio_normal'] > $data['precio_rebajado']) ? 'Oferta' : ''; ?></div>
                                <!-- Product image-->
                                <img class="card-img-top" src="../assets/img/<?php echo $data['imagen']; ?>" alt="..." />
                                <!-- Product details-->
                                <div class="card-body p-4">
                                    <div class="text-center">
                                        <!-- Product name-->
                                        <h5 class="fw-bolder"><?php echo $data['nombre'] ?></h5>
                                        <p><?php echo $data['descripcion']; ?></p>
                                        <!-- Product reviews-->
                                        <div class="d-flex justify-content-center small text-warning mb-2">
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                            <div class="bi-star-fill"></div>
                                        </div>
                                        <!-- Product price-->
                                        <span class="text-muted text-decoration-line-through"><?php echo $data['precio_normal'] ?></span>
                                        <?php echo $data['precio_rebajado'] ?>
                                    </div>
                                </div>
                                <!-- Product actions-->
                                <div class="card-footer p-4 pt-0 border-top-0 bg-transparent">
                                    <div class="text-center"><a class="btn btn-outline-dark mt-auto agregar" data-id="<?php echo $data['id']; ?>" href="#">Agregar</a></div>
                                </div>
                            </div>
                        </div>
                <?php  }
                } ?>

            </div>
        </div>
    </section>
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
</body>

</html>