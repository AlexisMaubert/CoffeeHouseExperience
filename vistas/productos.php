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
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba 
    require_once('../modelos/Cnx.php');
    require_once('../modelos/Producto.php');

    try {
        $cnx = new Cnx();
    } catch (PDOException $e) {
        echo 'Falló la conexión';
        exit;
    }
    ?>

    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Nuestros Productos</h2>
        <?php foreach (Producto::$categorias as $categoria) : ?>
            <?php $objCategoria = Producto::mostrarProducto($cnx, $categoria) ?>
        <h3 class="titulo-productos"><?php echo $categoria ?></h3>
        <div class="productos">
            <?php foreach ($objCategoria as $producto){
                require('../vistas/_producto.php');
            } ?>
        </div><!-- Fin productos -->
        <?php endforeach ?>      
    </main>

    <?php
    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');
    ?>

</body>

</html>