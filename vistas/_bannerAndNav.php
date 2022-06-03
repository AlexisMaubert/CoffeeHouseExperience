<section id="banner">
    <div class="bg-color">
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="#nosotros">Nosotros</a>
            <a href="#cafeteria">La Cafeteria</a>
            <a href="#productos">Productos</a>
            <a href="<?php echo BASE_URL ?>pages/mensaje.html">Contactanos</a>
            <form action="" method="post"  class="" >
              <input type="text" class="form-control" id="nusuario" name="nombre" minlength="8" maxlength="30" placeholder="Ingrese usuario" name="nusuario" required>
              <input type="password" class="form-control" id="pswd" minlength="4" maxlength="30" placeholder="Ingrese contraseña" name="pswd" required>
              <button type="submit" class="boton-login">Ingresar</button>
            </form>
            <a href="<?php echo BASE_URL ?>pages/registro.html" class="reg-link">No tenés cuenta? Registrate</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
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
  </section>