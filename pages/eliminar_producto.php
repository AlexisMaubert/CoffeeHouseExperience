<?php

require_once('../conf/conf.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Producto.php');
require_once('../helper/formvalidation.php');

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'Error';
    exit;
}

$ide = test_input( $_GET['ide'] ?? null );

$producto = Producto::find($cnx, $ide);

if($producto){
    $producto->delete($cnx);
}

header('Location: admin.php?');