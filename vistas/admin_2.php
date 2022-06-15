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
    require_once('../vistas/_volverArriba.php');       // Botón volver a arriba 
    ?>

    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Administrador</h2>
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
        <div class="secciones-admin">
            <?php foreach ($tipos as $type) : ?>
                <?php if ($type->id_tipo_producto == $tipo) : ?>
                    <h3><?php echo $type->nombre_tipo_producto ?></h3>
                    <a href="guardar_producto.php">
                        <button class="boton-admin">
                            <svg xmlns="http://www.w3.org/2000/svg" class="efecto alinear icon icon-tabler icon-tabler-plus" width="36" height="36" viewBox="0 0 24 24" stroke-width="1.5" stroke="#ffbf00" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <line x1="12" y1="5" x2="12" y2="19" />
                                <line x1="5" y1="12" x2="19" y2="12" />
                            </svg>
                        </button>
                    </a>
        </div>
    <?php endif ?>
<?php endforeach ?>
<div class="productos">
    <?php foreach ($todosProductos["$cat"] as $producto) {
        require('../vistas/_producto_admin.php');
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