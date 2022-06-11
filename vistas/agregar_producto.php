<?php
//agus si hiciste esta parte no borres esta carpeta y usala yo ya lo habia realizado de prueba el code

require_once('conf/conf.php');
require_once('modelos/_producto.php');
require_once('modelos/Cnx.php');
require_once('helperUnico/helper_input.php'); //no te olvides del require once helper


try{
    $cnx= new Cnx();

}catch(PDOException $e){
    echo 'Error';
    exit;
}

//vista--->
require_once('vistas/guardar_producto.php');

unset($cnx);