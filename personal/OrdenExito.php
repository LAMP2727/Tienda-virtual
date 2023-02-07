<?php
session_start();

require_once ('../libreria/Mailsender.php');

if (!isset($_REQUEST['id'])) {
  header("Location: index.php");
}

$content = "<!DOCTYPE html>
<html lang='en'>

<head>
  <link rel='stylesheet' href='http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css'>
  <title>Orden Completado - PHP Carrito de Compras</title>
  <meta charset='utf-8'>
  <style>
    .container {
      padding: 20px;
    }

    p {
      color: #34a853;
      font-size: 18px;
    }
  </style>
</head>
</head>

<body>
  <div class='container'>
    <div class='panel panel-default'>
      <div class='panel-heading'>

        <ul class='nav nav-pills'>
        <a class='navbar-brand' href='index.php'><img src='../img/logoo.png' width='200' alt='alternative'></a> 
        
          </ul>
      </div>

      <div class='panel-body'>

        <h1>" .$_SESSION['USUADMIN']. " este es el estado de tu Pedido</h1>
        <p>La Orden se ha enviado exitósamente! a FULL STORE y a tu correo. El ID de tu pedido es " . $_GET['id'] . "</p>
        <h3>Gracias por usar los servicios de FULL STORE su pedido ha sido enviado al administrador por favor contactenos para finalizar su compra: 0412-7505134     <strong style='color: darkblue;'>fullstore@gmail.com</strong> </h3>
      </div>

    
     
    <!--Panek cierra-->
  </div>
</body>

</html>";

$mail = new Mailsender;
$mail->setDestination($_SESSION['EMAIL'], $_SESSION['USUADMIN'], 'Orden de la tienda FULL STORE', $content, true);
$mail->send();
?>
<!DOCTYPE html>
<html lang="en">

<head>
  <link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <title>Orden Completado - PHP Carrito de Compras</title>
  <meta charset="utf-8">
  <style>
    .container {
      padding: 20px;
    }

    p {
      color: #34a853;
      font-size: 18px;
    }
  </style>
</head>
</head>

<body>
  <div class="container">
    <div class="panel panel-default">
      <div class="panel-heading">

        <ul class="nav nav-pills">
        <a class="navbar-brand" href="index.php"><img src="../img/logoo.png" width="200" alt="alternative"></a> 
        
          </ul>
      </div>

      <div class="panel-body">

        <h1><?=$_SESSION['USUADMIN']?> este es el estado de tu Pedido</h1>
        <p>La Orden se ha enviado exitósamente! a FULL STORE y a tu correo. El ID de tu pedido es <?php echo $_GET['id']; ?></p>
        <h3>Gracias por usar los servicios de FULL STORE su pedido ha sido enviado al administrador por favor contactenos para finalizar su compra: 0412-7505134     <strong style="color: darkblue;">fullstore@gmail.com</strong> </h3>
      </div>

    
     
    <!--Panek cierra-->
  </div>
</body>

</html>