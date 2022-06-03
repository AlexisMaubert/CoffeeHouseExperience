<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?php require_once('../vistas/_css.php') //Archivos CSS
    ?>
    <title>Coffe House Experience - Productos</title>
</head>

<body>

    <?php
    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_carrito.php');              // Carrito de compra
    require_once('../vistas/_volverArriba.php');              // Botón volver a arriba 
    require_once('../modelos/Cnx.php');
    require_once('../modelos/Producto.php');

    try {
        $cnx = new Cnx();
    } catch (PDOException $e) {
        echo 'Falló la conexión';
        exit;
    }
    $cafes = Producto::mostrarProducto($cnx, 'Cafes');
    $aguas = Producto::mostrarProducto($cnx, 'Aguas');
    $jugos = Producto::mostrarProducto($cnx,'Jugos');
    $gaseosas = Producto::mostrarProducto($cnx,'Gaseosas');
    $lacteos = Producto::mostrarProducto($cnx, 'Lacteos');
    
    ?>

    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Nuestros Productos</h2>
        <h3 class="titulo-productos">Café</h3>
        <div class="productos">
            <?php foreach ($cafes as $producto){
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
        <h3 class="titulo-productos">Aguas</h3>
        <div class="productos">
            <?php foreach ($aguas as $producto) {
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
        <h3 class="titulo-productos">Jugos</h3>
        <div class="productos">
            <?php foreach ($jugos as $producto) {
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
        <h3 class="titulo-productos">Gaseosas</h3>
        <div class="productos">
            <?php foreach ($gaseosas as $producto) {
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
        <h3 class="titulo-productos">Lacteos</h3>
        <div class="productos">
            <?php foreach ($lacteos as $producto) {
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
    </main>




    <?php

    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');

    ?>

</body>

</html>