<?php
require_once('../conf/conf.php');
require_once('../helper/helper_carrito.php');
require_once('../modelos/Auth.php');
require_once('../modelos/Usuario.php');

$controlador = 'galeria';
$nombre = Auth::getNombre();
require_once('../vistas/galeria.php');

?>