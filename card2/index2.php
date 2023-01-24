<?php

session_start();
if(isset($_SESSION['user'])){
    header("location: principal.php");
}

include_once 'libs/Connection.php';

$connect = new Connection();

$sql = "SELECT `TMPRE_IDP` AS id, `TMPRE_PRE` AS pregunta FROM `tmbtv_pre`;";

$query = $connect->consult($sql);



?>

  <?php include("production/head_fuera.php")?>

  <body class="login">
    <div>
      <a class="hiddenanchor" id="signup"></a>
      <a class="hiddenanchor" id="signin"></a>

      <div class="login_wrapper">
        <div class="animate form login_form">
          <section class="login_content">

            <!-- Inicio de session -->

            <form action="process/loginVali.php" method="POST">
              <h1>Inicio de Sesión</h1>
              <div>
                <input type="email" class="form-control" name="email" placeholder="Correo electrónico" required="" />
              </div>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <button class="btn btn-dark submit">Loguearse</button>
                <a href="/recuperar_clave.php">
                <button type="button" class="btn btn-dark">¿Perdiste tu contraseña?</button>
                </a>
              </div>
              
              <div class="clearfix"></div>

              <div class="separator">
                <p class="change_link">¿Nuevo en el sitio?
                  <a href="#signup">
                    <button type="button" class="btn btn-dark">Registrarse</button>
                  </a>
                </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> FULL STORE!</h1>
                  <p>©2022 Todos los derechos reservados. FULL STORE! es echo por LUIS MEDINA Elaborado en Bootstrap 3. Privacidad y Términos</p>
                </div>
              </div>
            </form>

          </section>
        </div>

        <div id="register" class="animate form registration_form">
          <section class="login_content">

          <!-- Registro nuevo usuarios -->
          
            <form action="process/registerVali.php" method="POST">
              <h1>Crear una cuenta</h1>
              <div>
                <input type="number" name="cedula" class="form-control" placeholder="Cédula" required="" />
              </div>
              <br>
              <div>
                <input type="text" name="nombre" class="form-control" placeholder="Nombre" required="" />
              </div>
              <div>
                <input type="text" name="apellido" class="form-control" placeholder="Apellido" required="" />
              </div>          
              <div>
                <input type="email" name="email" class="form-control" placeholder="Correo elctronico" required="" />
              </div>
              <div>
                <input type="password" name="pass" class="form-control" placeholder="Contraseña" required="" />
              </div>
              <div>
                <input type="text" name="address" class="form-control" placeholder="Direccion" required="" />
              </div>
              <div>
                <input type="number" name="telf" class="form-control" placeholder="Numero de telefono" required="" />
              </div>
              <br>
              <!--Carga de pregunta de seguridad  -->

                    <?php foreach ($query as $key => $campo): ?>
                      <p>Pregunta <?=$query[$key]['id']?>: <?=$query[$key]['pregunta']?></p>
                      <div>
                        <input type="text" name="resp<?=$key+1?>" class="form-control" placeholder="Respuesta: <?=$key+1?>" required="" />
                      </div>
                    <?php endforeach; ?>

              <br>
              <div>
              <button class="btn btn-dark submit">Enviar</button>
              </div>

              <div class="clearfix"></div>

              <div class="separator">
              <p class="change_link">Ya eres usuario?
                  <a href="/index.php">
                    <button type="button" class="btn btn-dark">Iniciar sesion</button>
                  </a>
              </p>

                <div class="clearfix"></div>
                <br />

                <div>
                  <h1><i class="fa fa-paw"></i> FULL STORE!</h1>
                  <p>©2022 Todos los derechos reservados. FULL STORE! es echo por LUIS MEDINA Elaborado en Bootstrap 3. Privacidad y Términos</p>
                </div>
              </div>
            </form>
          </section>
        </div>
      </div>
    </div>
  </body>
</html>
