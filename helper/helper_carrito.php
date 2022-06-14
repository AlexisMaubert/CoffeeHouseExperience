<?php
require_once('../modelos/Cnx.php');
require_once('../modelos/Producto.php');

$aCarrito = array();
$precioTotal;

if (isset($_COOKIE['carrito'])) {
    $aCarrito = unserialize($_COOKIE['carrito']);
}

if (isset($_POST['sumar'])) {
    $nItem = Producto::find($cnx, $_POST['id_producto']);
    $lastItem = count($aCarrito);
    $aCarrito[$lastItem]['nombre_producto'] = $nItem->nombre_producto;
    $aCarrito[$lastItem]['id_producto'] = $nItem->id_producto;
    $aCarrito[$lastItem]['precio_producto'] = $nItem->precio_producto;
}
if (isset($_POST['restar'])) {

    foreach ($aCarrito as $i => $carrito) {
        if ($carrito['id_producto'] == $_POST['id_producto']) {
            \array_splice($aCarrito, $i,1);
        }
    }
}

$iTemCad = time() + (60 * 60);
setcookie('carrito', serialize($aCarrito), $iTemCad);