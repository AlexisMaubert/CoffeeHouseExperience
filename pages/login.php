<?php

//require_once('_autoload.php');
require_once('../modelos/Cnx.php');
require_once('../modelos/Usuario.php');
require_once('../helper/helper_input.php');
require_once('../libreria/Auth.php');

if(Auth::validate()){
   Auth::destroy();
}

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'Error';
    exit;
}

$error = null;

if( isset($_POST['login']) )
{

    $email = test_input( $_POST['email_usuario'] ?? null );
    $contrasena = test_input( $_POST['contrasena_usuario'] ?? null );
    $usuario = Usuario::login($cnx, $email, $contrasena);

    if($usuario){
        Auth::create($usuario);
        header('Location: ../index.php');
    }else{
        $error = 'Los datos ingresados son incorrectos';
    }
}

require_once('../vistas/iniciar_sesion.php');

unset($cnx);