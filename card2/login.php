
<?php 

$alert = '';
session_start();
if(!empty($_SESSION['active']))
{
    header('location: login.php');
}else{
    if(!empty($_POST))
    { 
        if(empty($_POST['usuarioo']) || empty($_POST['password']))
        {

            $alert = 'Ingrese nombre y clave';
        } else{

            include("config/conex.php");

            $user = mysqli_real_escape_string($conexion,$_POST['usuarioo']);
            $pass = mysqli_real_escape_string($conexion,$_POST['password']);
            
            $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$pass'");
        
            $result= mysqli_num_rows($query);

            if($result == 1)
            {
                $data = mysqli_fetch_array($query);
                $roles = $data['rol'];
                if($roles=="admin")
			{	

                $_SESSION['active'] = true;
                $_SESSION['IDADMIN'] = $data['rol'];
                $_SESSION['USUADMIN'] = $data['usuario'];
                $_SESSION['CONTADMIN'] = $data['clave'];
                
                header('location: admin/productos.php');
             } else if ($roles=="secretaria")
             {
                $_SESSION['active'] = true;
                $_SESSION['IDADMIN'] = $data['rol'];
                $_SESSION['USUADMIN'] = $data['usuario'];
                $_SESSION['CONTADMIN'] = $data['clave'];
                
                header('location: secretaria/inicio.php');}
              }else {

                $alert = 'El usuario o la clave son incorrectos';

                session_destroy();

                
            }
            
        }

    }

    }



?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>login y registro</title>
    <link rel="stylesheet" href="assets/css/login.css">
     
</head>
<body>

    <main>
        <div class="contenedor__todo">

            <div class="caja__trasera">
                <div class="caja__trasera-login">
                 <h3> ¿Ya estas registrado?</h3>
                 <p>Inicia Sesion para entrar a la pagina</p>
                 <button id="btn__iniciar-sesion">INICIAR SESION</button>
                </div>

            
                <div class="caja__trasera-register">
                     <h3> ¿Aun no estas registrado?</h3>
                     <p>Registrate para entrar a la pagina</p>
                     <button id="btn__registrarse">REGISTRARSE</button>
                    </div>
            </div>

            <div class="contenedor__login-register">

                <form action="" method="POST" class="formulario__login">

                
            


                    <h2>INICIAR SESION</h2>
                    <p>Usuario<input type="text" pattern=[a-zA-Z0-9 ]+ maxlength="15" required
                     name="usuarioo" placeholder="ingrese el usuario"></p>


                    <p>Contraseña<input type="password" pattern=[a-zA-Z0-9 ]+  maxlength="8"
                     required name="password" placeholder="ingrese la contraseña"></pack>
                    <button>Entrar</button>
              
                    </form></form>

            <form action="registro.php" method="POST" class="formulario__register">
                <h2>REGISTRARSE</h2>
                <p>Cedula<input type="text"  pattern=[a-zA-Z ]  required name="ced_comp" 
                placeholder="nombre completo"></p>
                <p>Nombre<input type="text"  pattern=[a-zA-Z ]  required name="nom_comp" 
                placeholder="nombre completo"></p>
                <p>Apellido<input type="text"  pattern=[a-zA-Z ]  required name="ape_comp" 
                placeholder="nombre completo"></p>
                <p>Correo<input type="email" required name="corr_ele" 
                placeholder="correo electronico"></p>
                <p>Telefono <input type="text" pattern=[0-9 ] 
                maxlength="15"required name="tel_comp" placeholder="Telefono de envio"></p>
                <p>Usuario<input type="text" pattern=[a-zA-Z0-9 ]+ 
                maxlength="15"required name="usuarioo" placeholder="usuario"></p>
                <p>Contraseña<input type="password" [a-zA-Z0-9 ]+ 
                maxlength="8"required name="password" placeholder="password"></p>
                <p>Direccion <input type="text" pattern=[a-zA-Z0-9 ]+ 
                maxlength="15"required name="dir_comp" placeholder="Direcion de envio"></p>
                <button>Registrarse</button>
            </form>
            </div>
        </div>
    </main>
   
    <script src="assets/js/scriptt.js"></script>
   
</body>
</html>