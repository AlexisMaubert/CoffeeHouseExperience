<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title></title>

  <link rel="stylesheet" type="text/css"
    href="https://fonts.googleapis.com/css?family=Satisfy|Bree+Serif|Candal|PT+Sans">
  <link rel="stylesheet" type="text/css" href="../css/font-awesome.min.css">
  <link rel="stylesheet" type="text/css" href="../css/bootstrap.min.css">
  <link rel="stylesheet" type="text/css" href="../css/style.css">

</head>

<body>
  <!--banner-->
  <section id="banner-login">
    <div class="bg-color">
      <header id="header">
        <div class="container">
          <div id="mySidenav" class="sidenav">
            <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
            <a href="../index.php">Home</a>
            <a href="mensaje.php">Contactanos</a>
            <a href="productos.php">Productos</a>
            <a href="galeria.php">Galería</a>
          </div>
          <!-- Use any element to open the sidenav -->
          <span onclick="openNav()" class="pull-right menu-icon">☰</span>
        </div>
      </header>
      <div class="container" style="text-align: -webkit-center">
        <div class="row">
          <div class="inner text-center">
            <div class="inner text-center">
              <h1 class="logo-name">Coffe House Experience</h1>
              <h2>Todo es mejor con Café</h2>
              <p> Unite a nuestra comunidad registrandote! </p>
            </div>
          </div>
        </div>
      </div>
  </section>
  <!-- / banner -->

 <main>
     <div class="container">
        <form action="pago.php" method="post" class="form-pago">
            <h1 class="header-h">Elegí tu forma de pago</h1>
        <div class="form-check">
           <input class="form-check-input" type="radio" name="pago" id="efectivo"onchange="showContent()" value="efectivo">
           <label class="form-check-label" for="efectivo" checked>
             Efectivo
           </label>
         </div>
         <div class="form-check">
           <input class="form-check-input" type="radio" name="pago" id="tarjeta" onchange="showContent()" value="tarjeta">
           <label class="form-check-label" for="tarjeta">
             Tarjeta
           </label>
         </div>
         <div class="new-card container" id="newCard">
            <input type="number" class="form-control label-floating is-empty" name="NumeroTarjeta" id="numTar" max="999999999999999" min="111111111111111" placeholder="Numero de Tarjeta" data-rule="number" data-msg="Ingrese los 15 digitos de su tarjeta" />
            <div class="ven">
                <input type="number" class="form-control label-floating is-empty" name="MesVencimiento" max="12" min="1" id="venmes" placeholder="Mes de Vencimiento"  data-rule="number" data-msg="Ingrese el mes de vencimiento que aparece en la tarjeta" />
                <input type="number" class="form-control label-floating is-empty" name="AñoVencimiento" min="2020" max="2030" id="venAño" placeholder="Año de Vencimiento" data-rule="number" data-msg="Ingrese el año de vencimiento que aparece en la tarjeta" />                
             </div>
             <input type="password" class="form-control label-floating is-empty" name="CodSeguridad" id="codSeg" placeholder="Código de seguridad" data-rule="number" data-msg="Ingrese el codigo de seguridad de la tarjeta" />             
             <input type="text" class="form-control label-floating is-empty" name="Nombre" id="nombre" placeholder="Nombre Titular" data-rule="text" data-msg="Ingrese el nombre que aparece en la tarjeta" />             
         </div>
         <p class="text text-danger"><?php (!isset($errores['NumeroTarjeta'])) ?: print($errores['NumeroTarjeta']) ?></p>
         <p class="text text-danger"><?php (!isset($errores['AñoVencimiento'])) ?: print($errores['AñoVencimiento']) ?></p>
         <p class="text text-danger"><?php (!isset($errores['MesVencimiento'])) ?: print($errores['MesVencimiento']) ?></p>
         <p class="text text-danger"><?php (!isset($errores['CodSeguridad'])) ?: print($errores['CodSeguridad']) ?></p>
         <p class="text text-danger"><?php (!isset($errores['Nombre'])) ?: print($errores['Nombre']) ?></p>
         <button type="submit" name="submit" class="boton-pago">Finalizar Compra</button>

        </form>
        
     </div>
 </main>
  <?php 

  require_once('../vistas/_footer.php');
  require_once('../vistas/_js.php');

  ?>
</body>
</html>