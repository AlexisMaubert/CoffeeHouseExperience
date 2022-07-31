<?php

//Configuración
require_once('conf/conf.php');
require_once('modelos/Auth.php');
require_once('modelos/Usuario.php');

$controlador = 'index';

$nombre = Auth::getNombre();

if (isset($_GET['logout'])) {
    Auth::destroy();
}
//Vista
require_once('vistas/inicio.php');
