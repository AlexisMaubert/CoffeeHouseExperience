<!DOCTYPE html>
<html lang="en">
<!--agus fijate que trabajaste con esto borralo si queres y deja la carpeta-->
<head>
    <title> Guardar </title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <?php require_once('_css.php') ?>
    <?php require_once('_js.php') ?>

</head>

<body>

    <?php require_once('_nav.php') ?>

    <div class="container">
        <h1 class="text-center"> Guardar producto </h1>

        <ul>
            <?php foreach($errores as $error): ?>
                <li class="text text-danger"> <?php echo $error ?> </li>
            <?php endforeach ?>
        </ul>

        <form action="<?php echo $action ?>" method="post">
            <div class="form-group mb-3">
                <label for="nombre"> Nombre </label>
                <input type="text" class="form-control" name="nombre" id="nombre" placeholder="Ingrese el nombre del producto" value="<?php echo $producto->nombre ?>">
            </div>
            <div class="form-group mb-3">
                <label for="descripcion"> Descripción </label>
                <textarea class="form-control" name="descripcion" id="descripcion" rows="3" placeholder="Ingrese la descripción del producto"><?php echo $producto->descripcion ?></textarea>
            </div>
            <div class="form-group mb-3">
                <label for="precio"> Precio </label>
                <input type="number" min="0" max="1000000" class="form-control" name="precio" id="precio" placeholder="Ingrese el precio del producto" style="width: 20em;" value="<?php echo $producto->precio ?>">
            </div>
            <div class="form-group mb-3">
                <label for="categoria"> Categoría </label>
                <select class="form-control" name="id_categoria" id="id_categoria">
                    <option value=""> Ingrese la categoría del producto </option>
                    <?php foreach($categorias as $c): ?>
                        <option <?php if($producto->id_categoria == $c->id){ echo 'selected'; } ?> value="<?php echo $c->id ?>"> <?php echo $c->nombre ?> </option>
                    <?php endforeach ?>
                </select>
            </div>
            <input type="hidden" name="ide" value="<?php echo $producto->id ?>">
            <button type="submit" class="btn btn-success"> Guardar </button>
            <a class="btn btn-danger" href="<?php echo BASE_URL ?>productos.php"> Cancelar </a>            
        </form>
    </div>

    <?php require_once('_footer.php') ?>

</body>

</html>