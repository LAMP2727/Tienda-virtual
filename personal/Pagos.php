<?php
// include database configuration file
include 'Configuracion.php';

// initializ shopping cart class
include 'La-carta.php';
$cart = new Cart;

// redirect to home if cart is empty
if ($cart->total_items() <= 0) {
    header("Location: index.php");
}

// set customer ID in session
if (isset($_SESSION['USUADMIN'])){
   
    $DES_ADMIN= $_SESSION['USUADMIN'];


 
// get customer details by session customer ID
$query = $db->query("SELECT `usuarios`.`usuario`, `tmbtv_cli`.`usuarioo`, 
`tmbtv_cli`.`corr_ele`, `tmbtv_cli`.`nom_comp`, `tmbtv_cli`.`ced_comp`,
 `tmbtv_cli`.`ape_comp`, `tmbtv_cli`.`tel_comp`
FROM `usuarios`
	, `tmbtv_cli`
    WHERE

    `usuarios`.`usuario` = `tmbtv_cli`.`usuarioo`     AND
`usuarios`.`usuario` ='$DES_ADMIN'");
$custRow = $query->fetch_assoc();
?>
<!DOCTYPE html>
<html lang="en">

<head>
<title>FULL STORE!!!</title>
    <!-- Favicon-->
    <link rel="icon" type="image/x-icon" href="img/logo.png" />
    <meta charset="utf-8">
    <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
    <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <style>
        .container {
            padding: 20px;
        }

        .table {
            width: 65%;
            float: left;
        }

        .shipAddr {
            width: 30%;
            float: left;
            margin-left: 30px;
        }

        .footBtn {
            width: 95%;
            float: left;
        }

        .orderBtn {
            float: right;
        }
    </style>
</head>

<body>
    <div class="container">
        <div class="panel panel-default">
            <div class="panel-heading">

                <ul class="nav nav-pills">
                    <li role="presentation"><a href="index.php">Inicio</a></li>
                    <li role="presentation"><a href="VerCarta.php">Carrito de Compras</a></li>
                    <li role="presentation" class="active"><a href="Pagos.php">Pagar</a></li>
                    </ul>
            </div>

            <div class="panel-body">
                <h1>Vista previa de la Orden</h1>
                <table class="table">
                    <thead>
                        <tr>
                            <th>Producto</th>
                            <th>Pricio</th>
                            <th>Cantidad</th>
                            <th>Sub total</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        if ($cart->total_items() > 0) {
                            //get cart items from session
                            $cartItems = $cart->contents();
                            foreach ($cartItems as $item) {
                        ?>
                                <tr>
                                    <td><?php echo $item["nombre"]; ?></td>
                                    <td><?php echo '$' . $item["precio_rebajado"] . ' COP'; ?></td>
                                    <td><?php echo $item["qty"]; ?></td>
                                    <td><?php echo '$' . $item["subtotal"] . ' COP'; ?></td>
                                </tr>
                            <?php }
                        } else { ?>
                            <tr>
                                <td colspan="4">
                                    <p>No hay articulos en tu carta......</p>
                                </td>
                            <?php } ?>
                    </tbody>
                    <tfoot>
                        <tr>
                            <td colspan="3"></td>
                            <?php if ($cart->total_items() > 0) { ?>
                                <td class="text-center"><strong>Total <?php echo '$' . $cart->total() . ' COP'; ?></strong></td>
                            <?php } ?>
                        </tr>
                    </tfoot>
                </table>
                <div class="shipAddr">
                    <h4>Detalles de envío</h4>
                    <p><?php echo $custRow['ced_comp']; ?></p>
                    <p><?php echo $custRow['nom_comp']; ?>   <?php echo $custRow['ape_comp']; ?></p>
                    <p><?php echo $custRow['tel_comp']; ?></p>
                    <p><?php echo $custRow['corr_ele']; ?></p>
                </div>

                <?php
}
                ?>
                <div class="footBtn">
                    <a href="index.php" class="btn btn-warning"><i class="glyphicon glyphicon-menu-left"></i> Continue Comprando</a>
                    <a href="AccionCarta.php?action=placeOrder" class="btn btn-success orderBtn">Realizar pedido <i class="glyphicon glyphicon-menu-right"></i></a>
                </div>
            </div>
           
        <!--Panek cierra-->
    </div>
</body>

</html>