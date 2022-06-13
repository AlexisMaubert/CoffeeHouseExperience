<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Administrador</title>
    <meta name="description" content="">
    <meta name="keywords" content="">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php require_once('../vistas/_css.php') //Archivos CSS
    ?>

</head>

<body>
    <?php
    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_carrito.php');              // Carrito de compra
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba 
    require_once('../modelos/Cnx.php');
    require_once('../modelos/Producto.php');

   
    ?>

    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Administrador</h2>
        <?php foreach (Producto::$categorias as $categoria) : ?>
            <?php $objCategoria = Producto::mostrarProducto($cnx, $categoria) ?>

            <div class="secciones-admin">
                <h3><?php echo $categoria ?></h3>
                <a href="agregar_producto.php">
                <button class="boton-admin">
                    <svg xmlns="http://www.w3.org/2000/svg" class="efecto alinear icon icon-tabler icon-tabler-plus" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                </button>
                </a>
            </div>

            <div class="productos">
                <?php foreach ($objCategoria as $producto) {
                    require('../vistas/_producto_admin.php');
                } ?>
            </div><!-- Fin productos -->
        <?php endforeach ?>
    </main>
    <?php
    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');
    
    ?>
    <script src="<?php echo BASE_URL ?>js/sweetalert.js"></script>
</body>

</html>