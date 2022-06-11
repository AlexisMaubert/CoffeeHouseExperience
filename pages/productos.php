<?php
    require_once('../conf/conf.php');
    require_once('../modelos/Producto.php');
    require_once('../modelos/Cnx.php');
    
    try {
        $cnx = new Cnx();
    } catch (PDOException $e) {
        echo 'Falló la conexión';
        exit;
    }

    $controlador = 'productos';

    $categorias = Producto::$categorias;
    
    foreach ($categorias as $categoria) {
        $todosProductos["$categoria"]= (Producto::mostrarProducto($cnx, $categoria));
    }

    

   require_once('../vistas/productos.php'); ?>
    
  