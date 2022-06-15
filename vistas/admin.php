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
        <nav aria-label="Paginador administrador" id="pag_ad">
            <ul class="pagination">
                <?php if ($paginas['anterior']) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['primera'] ?>" tabindex="-1"> Primera </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['anterior'] ?>"> <?php echo $paginas['anterior'] ?> </a>
                    </li>
                <?php endif ?>
                <li class="page-item active">
                    <span class="page-link disabled" href="#"><?php echo $paginas['actual'] ?></span>
                </li>
                <?php if ($paginas['siguiente']) : ?>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['siguiente'] ?>"> <?php echo $paginas['siguiente'] ?> </a>
                    </li>
                    <li class="page-item">
                        <a class="page-link" href="?pag=<?php echo $paginas['ultima'] ?>"> Última </a>
                    </li>
                <?php endif ?>
            </ul>
            <form method="get">
                <input type="search" name="buscar" placeholder="Buscar producto" autofocus required>
                <button type="submit" class="boton-login">Buscar</button>
            </form>
        </nav>
        <div class="secciones-admin">
            <h3>Agregar producto</h3>
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
        <div class="productos">
            <?php foreach ($todosProductos as $producto) {
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