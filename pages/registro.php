<?php 

require_once('../conf/conf.php');
require_once('../modelos/Usuario.php');
require_once('../modelos/Cnx.php');
require_once('../helper/formvalidation.php');

$controlador = 'registro';

try {
    $cnx = new Cnx();
} catch (PDOException $e) {
    echo 'Falló la conexión';
    exit;
}

$usuario = new Usuario();
$errores = array();

if ( isset($_POST['registro']) ){

    $usuario->nombre_usuario = test_input( $_POST['nombre_usuario'] ?? null );
    $usuario->apellido_usuario = test_input( $_POST['apellido_usuario'] ?? null );
    $usuario->dni_usuario = test_input( $_POST['dni_usuario'] ?? null );
    $usuario->telefono_usuario = test_input( $_POST['telefono_usuario'] ?? null );
    $usuario->email_usuario =  test_input( $_POST['email_usuario'] ?? null ) ;
    $usuario->hashContrasena( test_input( $_POST['contrasena_usuario'] ?? null )) ;
    $usuario->id_permiso =  1 ;
    $usuario->id_cafeteria =  1 ;
    $usuario->id_puesto =  1 ;
    
    $errores = $usuario->validate($cnx);

    if (count($errores) == 0) {
        $usuario->save($cnx);

        header('Location: ../index.php');
    }
 }

require_once('../vistas/registro.php');

unset($cnx);
