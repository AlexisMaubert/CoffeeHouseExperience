<?php

require_once('Usuario.php');
session_start();

class Auth 
{

    public static function create(Usuario $usuario)
    {
        $_SESSION['auth'] = array(
            'id' => $usuario->id_usuario,
            'nombre' => $usuario->nombre_usuario,
            'email' => $usuario->email_usuario,
            'permiso' => $usuario->id_permiso,
            'puesto' => $usuario->id_puesto
        );
    }

    public static function validate()
    {
        return $_SESSION['auth'] ?? false;
    }

    public static function getNombre()
    {
        return ( self::validate() ) ? $_SESSION['auth']['nombre'] : null;
    }

    public static function isAdministrador()
    {
        return ( self::validate() and $_SESSION['auth']['permiso'] == 2);
    }

    public static function destroy()
    {
        unset( $_SESSION['auth'] );
    }

}