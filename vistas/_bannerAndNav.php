<?php if (isset($controlador) && $controlador != 'productos') : ?>
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
            <form action="" method="post">
              <input type="text" class="form-control" id="nusuario" name="nombre" minlength="8" maxlength="30" placeholder="Ingrese usuario" name="nusuario" required>
              <input type="password" class="form-control" id="pswd" minlength="4" maxlength="30" placeholder="Ingrese contraseña" name="pswd" required>
              <button type="submit" class="boton-login">Ingresar</button>
            </form>
            <a href="<?php echo BASE_URL ?>pages/registro.php" class="reg-link">No tenés cuenta? Registrate</a>
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
        <a href="<?php ($controlador == 'login') ?: $login = BASE_URL . 'pages/login.php';
                  echo $login;
                  ?>">Ingresar</a>
        <a href="<?php ($controlador == 'registro') ?: $registrarse = BASE_URL . 'pages/registro.php';
                  echo $registrarse;
                  ?>">Registrarse</a>
      </div>
    <?php endif ?>
    <!-- Use any element to open the sidenav -->
    <span onclick="openNav()" class="pull-right menu-icon">☰</span>
    </div>
    </header>
    <?php if (isset($controlador) && $controlador != 'productos') : ?>
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