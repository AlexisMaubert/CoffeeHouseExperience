<!DOCTYPE html>
<html lang="es">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Coffe House Experience - Inicio</title>
  <?php require_once('vistas/_css.php') ?> <!-- Archivos CSS -->
</head>

<body>

  <?php 
    
    require_once('vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('vistas/_volverArriba.php');              // Botón volver a arriba 
    require_once('vistas/_carrito.php');              // Carrito de compra

  ?>
  <!--about-->
  <section id="nosotros" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">La experiencia de un buen Café</h1>
          <p class="header-p">En Coffe House Experience nuestra meta es todos aquellos que quieren ingresar al mundo  </br> de la cafeteria lo hagan de una manera única, atrapante y sofisticada. </p>
        </div>
        <div class="col-md-1"></div>
        <div class="col-md-10">
          <div class="col-md-6 col-sm-6">
            <div class="about-info">
              <h2 class="heading">El café nuestro de cada día</h2>
              <p>CHE nació bajo la siguiente consigna, el poder construir un lugar donde las personas puedan además de vivir la rica experiencia del consumo del café el poder educarse sobre como
                es la preparación del mismo con los mayores estandares de calidad. En CHE creemos que el compartir el conocimiento lograra que el publico valore el trabajo que brindamos y el amor que
                tenemos por nuestra profesión y nuestra bebida insignia y eso logra que más gente quiera ingresar a este selecto club de los amantes del café.
              </p>
            </div>
          </div>
          <div class="col-md-6 col-sm-6">
            <img src="img/res01.jpg" alt="" class="img-responsive">
          </div>
        </div>
        <div class="col-md-1"></div>
      </div>
    </div>
  </section>
  <!--/about-->
  <!-- event -->
  <section id="cafeteria">
    <div class="bg-color" class="section-padding">
      <div class="container">
        <div class="row">
          <div class="col-xs-12 text-center" style="padding:60px;">
            <h1 class="header-h">Bunker de Café</h1>
          </div>
          <div class="col-md-12" style="padding-bottom:60px;">
            <div class="item active left">
              <div class="col-md-6 col-sm-6 left-images">
                <img src="img/res02.jpg" class="img-responsive">
              </div>
              <div class="col-md-6 col-sm-6 details-text">
                <div class="content-holder">
                  <h2>Nuestro local</h2>
                  <p>nuestro local se encuentra en el corazón del barrio porteño de Caballito donde actualmente se esta dando forma un polo gastronomicos de los mas prometedores de la ciudad  
                    y nosotromos como parte de este crecimiento queremos formar parte de las nuevas nuevas tendecias y dar al este barrio tan amado nuestro trabajo y servicio. </p>
                  <address>
                              <strong>Dirección: </strong>
                              Av Juan Bautista Alberdi 1880, CABA
                              <br>
                              <strong>Capacidad Máx: </strong>
                              100 Personas
                            </address>
                  <a class="btn btn-imfo btn-read-more" href="pages/galeria.php">Galería</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section>
  <!--/ event -->
  <!-- menu -->
  <section id="productos" class="section-padding">
    <div class="container">
      <div class="row">
        <div class="col-md-12 text-center marb-35">
          <h1 class="header-h">Nuestro Menú del día</h1>
        </div>
        <div class="col-md-12  text-center gallery-trigger">
          <ul>
            <li><a class="filter" data-filter="all">Menú</a></li>
            <li><a class="filter" data-filter=".category-1">Bebidas</a></li>
            <li><a class="filter" data-filter=".category-2">Comidas</a></li>
            <li><a class="filter" data-filter=".category-3">Souvenirs</a></li>
          </ul>
        </div>
        <div id="Container">
          <?php require_once('vistas/_menu_inicio.php')?>
        </div>
      </div>
      <a class="btn btn-imfo btn-read-more" href="pages/productos.php">Ver todos los Productos</a>
    </div>
  </section>
  <!--/ menu -->

  <?php

    require_once('vistas/_footer.php');    
    require_once('vistas/_js.php');

  ?>



</body>

</html>
