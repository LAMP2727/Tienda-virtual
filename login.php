
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
            $pass = md5(mysqli_real_escape_string($conexion,$_POST['password']));
            
            $query = mysqli_query($conexion, "SELECT * FROM usuarios WHERE usuario = '$user' AND clave = '$pass'");
        
            $result= mysqli_num_rows($query);

            if($result == 1)
            {
                $data = mysqli_fetch_array($query);
                $roles = $data['rol'];
                if($roles=="admin")
			{	

                $_SESSION['active'] = true;
                $_SESSION['ID_CED'] = $data['cep_comp'];
                $_SESSION['IDADMIN'] = $data['rol'];
                $_SESSION['USUADMIN'] = $data['usuario'];
                $_SESSION['CONTADMIN'] = $data['clave'];
                
                header('location: admin/index.php');
             } else if ($roles=="personal")
             {
                $_SESSION['active'] = true;
                $_SESSION['ID_CED'] = $data['cep_comp'];
                $_SESSION['IDADMIN'] = $data['rol'];
                $_SESSION['USUADMIN'] = $data['usuario'];
                $_SESSION['CONTADMIN'] = $data['clave'];
                
                header('location: personal/index.php');}
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
<script src="libreria/validaciones.php"></script>
<a class="navbar-brand" href="index.php"><img src="img/logoo.png" width="200" alt="alternative" style="margin-right: 900px ;padding-top: 20px;"></a> 

    <main style="margin-top: 0px;">
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
                    
                   
                    <p>Usuario<input onkeypress="return Especialess(e);" onKeyUP="this.value=this.value.toUpperCase();" id="usuarioo" class="form-control" type="text" 
                                name="usuarioo" placeholder="Nombre de usuario" required ></p>
                    
                    
                    <p>Contraseña<input type="password" 
                    required name="password" placeholder="ingrese la contraseña"></pack>
                    <button>Entrar</button>
                    </form>

            <form action="registro.php" method="POST" class="formulario__register" 
            style="padding-top: 0px; padding-bottom: 0px; height: 500px; margin-bottom: 100px;">
                <h2 style="margin-bottom: 0px;">REGISTRARSE</h2>
                <input onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();" id="ced_comp" class="form-control" type="text"
                name="ced_comp" placeholder="Numero de cedula" maxlength="8" style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();" id="nom_comp" class="form-control" type="text"
                name="nom_comp" placeholder="Nombre"  style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input onkeypress="return SoloLetras(event);" onKeyUP="this.value=this.value.toUpperCase();" id="ape_comp" class="form-control" type="text"
                name="ape_comp" placeholder="Apellido"  style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input type="email" required name="corr_ele" 
                placeholder="Correo electronico" style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input onkeypress="return SoloNumeros(event);" onKeyUP="this.value=this.value.toUpperCase();" id="tel_comp" class="form-control" type="text"
                name="tel_comp" placeholder="Numero de Telefono"  maxlength="11" style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input onkeypress="return Especialess(event);" onKeyUP="this.value=this.value.toUpperCase();" id="usuarioo" class="form-control" type="text"
                name="usuarioo" placeholder="Nombre de usuario"  style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input type="password" [a-zA-Z0-9 ]+ 
                maxlength="8"required name="password" placeholder="Password" style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <input onkeypress="return Especial(event);" onKeyUP="this.value=this.value.toUpperCase();" id="dir_comp" class="form-control" type="text"
                name="dir_comp" placeholder="Direcion de envio"  style="padding-top: 0px;padding-bottom: 0px;height: 30px;">
                <button style="margin-top: 15px;">Registrarse</button>
            </form>
            </div>
        </div>
    </main>
   
    <script src="assets/js/scriptt.js"></script>
   
</body>
</html>