<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Registrarse</title>

  <?php require_once('../vistas/_css.php') //Archivos CSS
?>
</head>

<body>
  <?php
    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_carrito.php');              // Carrito de compra
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba
    ?>

  <!-- contact -->
<section id="contact" class="">
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
        <form action="" method="post" role="form" class="contactForm">
          <div id="sendmessage">Your booking request has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <div class=" contact-form pad-form">
          <div class="form-group">
            <input type="text" class="form-control label-floating is-empty" name="Nombre" id="nom" placeholder="Nombre" data-rule="email" data-msg="Please enter a valid email" />
          </div>
          <div class="form-group">
            <input type="text" class="form-control label-floating is-empty" name="Apellido" id="ape" placeholder="Apellido" data-rule="email" data-msg="Please enter a valid email" />
          </div>
          <div class="form-group">
            <input type="email" class="form-control label-floating is-empty" name="E-mail" id="email" placeholder="Correo" data-rule="email" data-msg="Please enter a valid email" />
          </div>
            <input type="password" class="form-control label-floating is-empty" name="email" id="password" placeholder="Contraseña" data-rule="password" data-msg="Please enter a valid password" />
          <div class="separate">
            <input type="number" class="form-control label-floating is-empty" name="Documento" id="Id_doc" placeholder="Documento" data-rule="required" data-msg="Please enter a valid document" />
          </div>
          <div class="telefono"></div>
            <input type="number" class="form-control label-floating is-empty" name="Telefono" id="Id_tel" placeholder="Telefono" data-rule="required" data-msg="Please enter a valid number" />
            <button type="submit" class="boton-reg">Registrarse</button>
          </div>
      </div>
      <!--registro-->   
    </div>      
  </section>

  <?php
    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');
    ?>


</body>
</html>