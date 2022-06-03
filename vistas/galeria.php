<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coffe House Experience - Galería</title>
  <meta name="description" content="">
  <meta name="keywords" content="">

  <?php require_once('../vistas/_css.php') //Archivos CSS
?>

</head>

<body>
<?php
    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_carrito.php');              // Carrito de compra
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba
    ?>


<!--galeria de imagenes-->
<div class="container">
<div class="row">
  <div class="col s12 center-align">
       <h1 id = "cafeteria" class="logo-name">Galeria</h1>
  </div>
</div>
<div class="row galeria">
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/1.jpg" alt="" class="img-responsive" data-caption="Nuestra hermosa pizzara con la carta de nuestros productos"></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/2.jpg" alt="" class="img-responsive" data-caption="Selección de postres Artesanales unicos.">
       </div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/3.jpg" alt="" class="img-responsive" data-caption="Selección de postres Artesanales unicos."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/4.jpg" alt="" class="img-responsive" data-caption="Selección de postres Artesanales unicos."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/5.jpg" alt="" class="img-responsive" data-caption="nuestras masquinas de maxima calidad de preparación."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/6.jpg" alt="" class="img-responsive" data-caption="El arte es parte de nuestro trabajo de cada día.""></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/7.jpg" alt="" class="img-responsive" data-caption="El arte es parte de nuestro trabajo de cada día."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/8.jpg" alt="" class="img-responsive" data-caption="El café siempre es mejor tomarlo con amigos."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/9.jpg" alt="" class="img-responsive" data-caption="El arte es parte de nuestro trabajo de cada día."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/10.jpg" alt="" class="img-responsive" data-caption="Nuestras erramientas de máxima calidad para una mejor elabación."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/11.jpg" alt="" class="img-responsive" data-caption="Nuestros cursos de preparación de café."></div>
  </div>
  <div class="col-12-sm col-lg-3 col-md-4">
       <div class="material-placeholder"><img src="../img/12.jpg" alt="" class="img-responsive" data-caption="nuestra selección de meriendas."></div>
  </div>
</div>
</div>
<!--/galeria de imagenes-->
  <?php
    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');
    ?>
  <script src="../js/image.js"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>

</body>

</html>
