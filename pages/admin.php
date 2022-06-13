<?php

require_once('../conf/conf.php');


try {
    $cnx = new Cnx();
} catch (PDOException $e) {
    echo 'Falló la conexión';
    exit;
}

$controlador = 'admin';
$msj = $_GET['msj'] ?? null;
$pag = $_GET['pag'] ?? 1;
$registros_por_pagina = 10;

if ($msj == 'add') {
    $msj = 'El producto se ha agregado correctamente.';
} else if ($msj == 'update') {
    $msj = 'El producto se ha modificado correctamente.';
} else if ($msj == 'delete') {
    $msj = 'El producto se ha eliminado correctamente.';
}

require_once('../vistas/admin.php');