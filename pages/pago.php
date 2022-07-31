<?php

require_once('../conf/conf.php');
require_once('../helper/formvalidation.php');
require_once('../modelos/Usuario.php');
require_once('../modelos/Auth.php');


if(!Auth::validate())
{
    header('Location: login.php');
}

$nombre = Auth::getNombre();

if ( isset($_POST['submit']) && $_POST['pago'] == 'tarjeta' ){
    $errores = array();
    if( !filter_var($_POST['NumeroTarjeta'], FILTER_VALIDATE_INT, array("options" => array("min_range"=> 111111111111111, "max_range"=>999999999999999))) ) $errores['NumeroTarjeta'] = 'Ingresar número de tarjeta válido';
    if( !filter_var($_POST['AñoVencimiento'], FILTER_VALIDATE_INT) ) $errores['AñoVencimiento'] = 'Ingresar un año válido';
    if( !filter_var($_POST['MesVencimiento'], FILTER_VALIDATE_INT) ) $errores['MesVencimiento'] = 'Ingresar un mes válido';
    if( !filter_var($_POST['CodSeguridad'], FILTER_VALIDATE_INT) ) $errores['CodSeguridad'] = 'Ingresar el código de seguridad';
    if( !$_POST['Nombre'] ) $errores['Nombre'] = 'Ingresar un nombre';

    if (count($errores) == 0) {
        header('Location: ../index.php');
    }
 } elseif (isset($_POST['pago']) && $_POST['pago'] == 'efectivo'){
    header('Location: ../index.php');
 }
require_once('../vistas/pago.php');

unset($cnx);
