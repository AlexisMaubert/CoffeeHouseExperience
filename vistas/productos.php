<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?php require_once('../vistas/_css.php') //Archivos CSS
    ?>
    <title>Coffe House Experience - Productos</title>
</head>

<body>

    <?php
    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_carrito.php');              // Carrito de compra
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba 
    ?>


    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Nuestros Productos</h2>
        <nav aria-label="Productos" id="pag_cat">
            <ul class="pagination justify-content-center">
                <?php foreach ($categorias as $categoria) : ?>
                    <?php if ($cat == $categoria->id_categoria_producto) : ?>
                        <li class="page-item active"><a class="page-link" href="?cat=<?php echo $categoria->id_categoria_producto ?>"><?php echo $categoria->nombre_categoria_producto ?></a></li>
                    <?php else : ?>
                        <li class="page-item"><a class="page-link" href="?cat=<?php echo $categoria->id_categoria_producto ?>"><?php echo $categoria->nombre_categoria_producto ?></a></li>
                    <?php endif ?>
                <?php endforeach ?>
            </ul>
        </nav>
        <nav aria-label="Productos" id="pag_tipo">
            <ul class="pagination justify-content-center">
                <?php foreach ($tipos as $type) : ?>
                    <?php foreach ($tip_cat as $tp) : ?>
                        <?php if ($tp->id_tipo_producto == $type->id_tipo_producto) : ?>
                            <?php if ($tipo == $type->id_tipo_producto) : ?>
                                <li class="page-item active"><a class="page-link" href="?cat=<?php echo $cat ?>&tipo=<?php echo $type->id_tipo_producto ?>"><?php echo $type->nombre_tipo_producto ?></a></li>
                            <?php else : ?>
                                <li class="page-item"><a class="page-link" href="?cat=<?php echo $cat ?>&tipo=<?php echo $type->id_tipo_producto ?>"><?php echo $type->nombre_tipo_producto ?></a></li>
                            <?php endif ?>
                        <?php endif ?>
                    <?php endforeach ?>
                <?php endforeach ?>
            </ul>
        </nav>
        <?php foreach ($tipos as $type) : ?>
            <?php if ($type->id_tipo_producto == $tipo) : ?>
                <h3 class="titulo-productos"><?php echo $type->nombre_tipo_producto ?></h3>
                <div class="productos">
                <?php endif ?>
            <?php endforeach ?>
            <?php foreach ($todosProductos["$cat"] as $producto) {

                require('../vistas/_producto.php');
            } ?>
                </div><!-- Fin productos -->

    </main>

    <?php
    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');
    ?>
    <script src="<?php echo BASE_URL ?>js/sweetalert.js"></script>
</body>

</html>