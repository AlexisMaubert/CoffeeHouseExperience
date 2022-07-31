<?php if (isset($controlador) && $controlador == 'admin') : ?>
  <section class="<?php echo 'hader-admin' ?>">
    <div>
    <?php elseif (isset($controlador) && $controlador != 'productos') : ?>
      <section id="<?php echo 'banner' ?>">
        <div class="bg-color">
        <?php endif ?>
        <header id="header">
          <div class="container">
            <div id="mySidenav" class="sidenav">
              <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
              <?php if (isset($controlador) && $controlador == 'index') : ?>
                <a href="#nosotros">Nosotros</a>
                <a href="#cafeteria">La Cafeteria</a>
                <a href="#productos">Productos</a>
                <a href="<?php echo BASE_URL ?>pages/mensaje.php">Contactanos</a>
                <?php if (isset($_SESSION['auth'])) : ?>
                  <p class="bienvenido">Bienvenido <?php if (isset($_SESSION['auth'])) {
                                  echo $nombre;
                                } ?>
                  </p>
                  <a href="index.php?logout=true">Cerrar Sesión</a>
                <?php else : ?>
                  <a href="<?php echo BASE_URL ?>pages/login.php">Iniciar Sesion</a>
                  <a href="<?php echo BASE_URL ?>pages/registro.php" class="reg-link">No tenés cuenta? Registrate</a>
                <?php endif ?>
            </div>
          <?php elseif (isset($controlador)) : ?>
            <?php $productos =  $mensaje = $galeria = $registrarse = $login = '#' ?>
            <a href="<?php echo BASE_URL ?>">Home</a>
            <a href="<?php ($controlador == 'galeria') ?: $galeria = BASE_URL . 'pages/galeria.php';
                      echo $galeria;
                      ?>">Galería</a>
            <a href="<?php ($controlador == 'productos') ?: $productos = BASE_URL . 'pages/productos.php';
                      echo $productos;
                      ?>">Productos</a>
            <a href="<?php ($controlador == 'mensaje') ?: $mensaje = BASE_URL . 'pages/mensaje.php';
                      echo $mensaje;
                      ?>">Contactanos</a>
            <?php if (isset($_SESSION['auth'])) : ?>
              <p class="bienvenido">Bienvenido <?php if (isset($_SESSION['auth'])) {
                              echo $nombre;
                            } ?>
              </p>
              <a href="../index.php?logout=true">Cerrar Sesión</a>
            <?php else : ?>
              <a href="<?php ($controlador == 'login') ?: $login = BASE_URL . 'pages/login.php';
                        echo $login;
                        ?>">Iniciar Sesion</a>
              <a href="<?php ($controlador == 'registro') ?: $registrarse = BASE_URL . 'pages/registro.php';
                        echo $registrarse;
                        ?>" class="reg-link">No tenés cuenta? Registrate</a>
            <?php endif ?>
          </div>
        <?php endif ?>
        <!-- Use any element to open the sidenav -->
        <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
        </header>
        <?php if (isset($controlador) && ($controlador != 'productos' && $controlador != 'admin')) : ?>
          <div class="container">
            <div class="row">
              <div class="inner text-center">
                <h1 class="logo-name">Coffe House Experience</h1>
                <h2>Todo es mejor con Café</h2>
                <p>Café elaborado artísticamente </p>
              </div>
            </div>
          </div>
    </div>
  <?php endif ?>
  </section>