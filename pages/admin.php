<?php

require_once('../conf/conf.php');
require_once('../modelos/Producto.php');
require_once('../modelos/Categoria_producto.php');
require_once('../modelos/Tipo_producto.php');
require_once('../modelos/Cnx.php');
require_once('../helper/helper_paginador.php');
require_once('../helper/formvalidation.php');
require_once('../modelos/Usuario.php');
require_once('../modelos/Auth.php');

try {
    $cnx = new Cnx();
} catch (PDOException $e) {
    echo 'Falló la conexión';
    exit;
}
if(!Auth::isAdministrador())
{
    header('Location: login.php');
}
$pag = $_GET['pag'] ?? 1;
$registros_por_pagina = 8;

$controlador = 'admin';

$nombre = Auth::getNombre();
//Modelo
if (isset($_GET['buscar'])) {
    $todosProductos = Producto::search($cnx, $pag, $registros_por_pagina, $_GET['buscar']);
    $cantidad_registros = Producto::countSearch($cnx, $_GET['buscar']);
}else{
    $cantidad_registros = Producto::countAll($cnx);
    $todosProductos = Producto::paginate($cnx, $pag, $registros_por_pagina);
}

$paginas = paginador($pag, $cantidad_registros, $registros_por_pagina);


require_once('../vistas/admin.php');





//$cat = $_GET['cat'] ?? 1;
//$controlador = 'productos';
//$categorias = Categoria_producto::mostrarTodo($cnx);
//$tipos = Tipo_producto::mostrarTodo($cnx);
//$tip_cat = Producto::buscarTipo($cnx,$cat);

//$tipo = $_GET['tipo']?? $tip_cat[0]->id_tipo_producto;
        
//$todosProductos["$cat"] = (Producto::mostrarProducto($cnx, $cat, $tipo));