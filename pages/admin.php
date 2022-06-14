<?php

require_once('../conf/conf.php');
require_once('../modelos/Producto.php');
require_once('../modelos/Categoria_producto.php');
require_once('../modelos/Tipo_producto.php');
require_once('../modelos/Cnx.php');

try {
    $cnx = new Cnx();
} catch (PDOException $e) {
    echo 'Falló la conexión';
    exit;
}

$controlador = 'admin';
$msj = $_GET['msj'] ?? null;

if ($msj == 'add') {
    $msj = 'El producto se ha agregado correctamente.';
} else if ($msj == 'update') {
    $msj = 'El producto se ha modificado correctamente.';
} else if ($msj == 'delete') {
    $msj = 'El producto se ha eliminado correctamente.';
}

$cat = $_GET['cat'] ?? 1;
$controlador = 'productos';
$categorias = Categoria_producto::mostrarTodo($cnx);
$tipos = Tipo_producto::mostrarTodo($cnx);
$tip_cat = Producto::buscarTipo($cnx,$cat);

$tipo = $_GET['tipo']?? $tip_cat[0]->id_tipo_producto;
        
$todosProductos["$cat"] = (Producto::mostrarProducto($cnx, $cat, $tipo));


require_once('../vistas/admin.php');