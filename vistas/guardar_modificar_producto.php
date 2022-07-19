<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Coffe House Experience - Inicio</title>
    <?php require_once('../vistas/_css.php') ?>
    
    <!-- Archivos CSS -->
</head>

<body>

    <?php

    require_once('../vistas/_bannerAndNav.php');   // Banner con nav integrado
    require_once('../vistas/_volverArriba.php');              // Botón volver a arriba 

    ?>
    <main class="contenedor padding">
        <h2 class="header-h titulo-productos">Guardar Productos</h2>
        <form action="<?php echo $action ?>" method="post" enctype="multipart/form-data">
            <div class=" form-group mb-3">
            <label for="nombre"> Nombre </label>
            <input type="text" class="form-control" name="nombre_producto" id="nombre_producto" placeholder="Ingrese el nombre del producto" value="<?php echo $producto->nombre_producto ?>">
            <p class="text text-danger"><?php (!isset($errores['nombre_producto'])) ?: print($errores['nombre_producto']) ?></p>
            </div>
            <div class="form-group mb-3">
                <label for="descripcion"> Descripción </label>
                <textarea class="form-control" name="descripcion_producto" id="descripcion_producto" rows="3" placeholder="Ingrese la descripción del producto"><?php echo $producto->descripcion_producto ?></textarea>
                <p class="text text-danger"><?php (!isset($errores['descripcion_producto'])) ?: print($errores['descripcion_producto']) ?></p>
            </div>
            <div class="row justify-content-center">
                <div class="col-10 col-sm-8">
                    <img id="foto_preview" width="275" height="275" src="<?php ($producto->id_producto)? print(BASE_URL.'img/'.$producto->id_producto).'.png' : print('https://via.placeholder.com/275')?>" class="img-fluid"/>
                    <div class="form-group mb-3">
                        <input type="file" name="foto_producto" id="foto_producto">
                    </div>
                    <p class="text text-danger"><?php (!isset($errores['foto_producto'])) ?: print($errores['foto_producto']) ?></p>
                </div>
                <div class="col-10 col-sm-4">
                    <div class="form-group mb-3">
                        <label for="precio"> Precio </label>
                        <input type="number" min="0" max="1000000" class="form-control" name="precio_producto" id="precio_producto" placeholder="Ingrese el precio del producto" style="width: 20em;" value="<?php echo $producto->precio_producto ?>">
                        <p class="text text-danger"><?php (!isset($errores['precio_producto'])) ?: print($errores['precio_producto']) ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="precio"> Stock </label>
                        <input type="number" min="0" max="1000000" class="form-control" name="stock_producto" id="stock_producto" placeholder="Ingrese el stock del producto" style="width: 20em;" value="<?php echo $producto->stock_producto ?>">
                        <p class="text text-danger"><?php (!isset($errores['stock_producto'])) ?: print($errores['stock_producto']) ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoria"> Categoría </label>
                        <select class="form-control" name="id_categoria_producto" id="id_categoria_producto" style="width: 20em;">
                            <option> Ingrese la categoría del producto </option>
                            <?php foreach ($categorias as $c) : ?>
                                <option <?php if ($producto->id_categoria_producto == $c->id_categoria_producto) {
                                            echo 'selected';
                                        } ?> value="<?php echo $c->id_categoria_producto ?>"> <?php echo $c->nombre_categoria_producto ?> </option>
                            <?php endforeach ?>
                        </select>
                        <p class="text text-danger"><?php (!isset($errores['id_categoria_producto'])) ?: print($errores['id_categoria_producto']) ?></p>
                    </div>
                    <div class="form-group mb-3">
                        <label for="categoria"> Tipo </label>
                        <select class="form-control" name="id_tipo_producto" id="id_tipo_producto" style="width: 20em;">
                            <option value=""> Ingrese el tipo del producto </option>
                            <?php foreach ($tipos as $t) : ?>
                                <option <?php if ($producto->id_tipo_producto == $t->id_tipo_producto) {
                                            echo 'selected';
                                        } ?> value="<?php echo $t->id_tipo_producto ?>"> <?php echo $t->nombre_tipo_producto ?> </option>
                            <?php endforeach ?>
                        </select>
                        <p class="text text-danger"><?php (!isset($errores['id_tipo_producto'])) ?: print($errores['id_tipo_producto']) ?></p>
                    </div>
                </div>
            </div>
            <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
            <button type="submit" class="btn btn-success" name="submit"> Guardar </button>
            <a class="btn btn-danger" href="admin.php"> Cancelar </a>
        </form>
    </main>

    <?php

    require_once('../vistas/_footer.php');
    require_once('../vistas/_js.php');

    ?>
    <script src="<?php echo BASE_URL ?>js/imgPreview.js"></script>
</body>

</html>