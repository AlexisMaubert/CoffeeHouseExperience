<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <?php require_once('../vistas/_css.php'); ?>
  <title>Registrarse</title>
</head>

<body>
  <?php
  require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
  require_once('../vistas/_volverArriba.php');       // Botón volver a arriba
  ?>

  <!-- contact -->
  <section id="contact">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center">
          <h1 class="header-h">Registrate!</h1>
          <p class="header-p">LLenar todos los campos solicitados para alcanzar el registro.</p>
        </div>
      </div>
      <div class="row">
        <!--mapa-->
        <div class="col-lg-7 col-md-8 col-sm-12">
          <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d3283.0171438077864!2d-58.45589311776496!3d-34.62900705142191!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x95bcca2f76c371f3%3A0x5d40dd256c583a97!2sAv.%20Juan%20Bautista%20Alberdi%201880%2C%20Buenos%20Aires!5e0!3m2!1ses!2sar!4v1652312703776!5m2!1ses!2sar" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
        </div>
        <!--/mapa-->
        <!--registro-->
        <div class="col-lg-5 col-md-4 col-sm-12 reg-form">
          <form action="registro.php" method="post" role="form" class="contactForm">
            <div id="sendmessage">Your booking request has been sent. Thank you!</div>
            <div id="errormessage"></div>
            <div class=" contact-form pad-form">
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="nombre_usuario" id="nom" placeholder="Nombre" data-msg="Ingresá un nombre válido" />
                <p class="text text-danger"><?php (!isset($errores['nombre_usuario'])) ?: print($errores['nombre_usuario']) ?></p>
              </div>
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="apellido_usuario" id="ape" placeholder="Apellido" data-msg="Ingresá un apellido válido" />
                <p class="text text-danger"><?php (!isset($errores['apellido_usuario'])) ?: print($errores['apellido_usuario']) ?></p>
              </div>
              <div class="form-group">
                <input type="number" class="form-control label-floating is-empty" name="dni_usuario" id="dni" placeholder="DNI" data-msg="Ingresá un dni válido" />
                <p class="text text-danger"><?php (!isset($errores['dni_usuario'])) ?: print($errores['dni_usuario']) ?></p>
              </div>
              <div class="form-group">
                <input type="text" class="form-control label-floating is-empty" name="telefono_usuario" id="tel" placeholder="Telefono" data-msg="Ingresá un teléfono válidol" />
                <p class="text text-danger"><?php (!isset($errores['telefono_usuario'])) ?: print($errores['telefono_usuario']) ?></p>
              </div>
              <div class="form-group">
                <input type="email" class="form-control label-floating is-empty" name="email_usuario" id="email" placeholder="Correo electrónico" data-msg="Ingresá un email válido" />
                <p class="text text-danger"><?php (!isset($errores['email_usuario'])) ?: print($errores['email_usuario']) ?></p>
              </div>
              <input type="password" class="form-control label-floating is-empty" name="contrasena_usuario" id="password" placeholder="Contraseña" data-rule="password" data-msg="Ingresá un password válido" />
              <p class="text text-danger"><?php (!isset($errores['contrasena_usuario'])) ?: print($errores['email_usuario']) ?></p>
              <div class="telefono"></div>
              <!--<input type="hidden" name="id_permiso" id="id_permiso" value="1" />
              <input type="hidden" name="id_cafeteria" id="id_cafeteria" value="1" />
              <input type="hidden" name="id_puesto" id="id_puesto" value="1" /> -->
              <button type="submit" name="registro" class="boton-reg">Registrarse</button>
            </div>
          </form>
        </div>
        <!--registro-->
      </div>
  </section>

  <?php
  require_once('../vistas/_footer.php');
  //require_once('../vistas/_js.php');
  ?>

</body>

</html>