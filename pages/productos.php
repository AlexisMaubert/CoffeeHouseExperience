<?php
require_once('../conf/conf.php');
require_once('../modelos/Producto.php');
require_once('../modelos/Categoria_producto.php');
require_once('../modelos/Tipo_producto.php');
require_once('../modelos/Cnx.php');
require_once('../helper/helper_carrito.php');
require_once('../modelos/Usuario.php');
require_once('../modelos/Auth.php');

try {
    $cnx = new Cnx();
} catch (PDOException $e) {
    echo 'Falló la conexión';
    exit;
}

$nombre = Auth::getNombre();
$cat = $_GET['cat'] ?? 1;
$controlador = 'productos';
$categorias = Categoria_producto::mostrarTodo($cnx);
$tipos = Tipo_producto::mostrarTodo($cnx);
$tip_cat = Producto::buscarTipo($cnx, $cat);

$tipo = $_GET['tipo'] ?? $tip_cat[0]->id_tipo_producto;

$todosProductos["$cat"] = (Producto::mostrarProducto($cnx, $cat, $tipo));

if(Auth::isAdministrador()){
    header('Location: ../pages/admin.php');
}else{
    require_once('../vistas/producto.php');
}

unset($cnx);
