<?php

require_once('ModeloPadre.php');

class Tipo_producto extends ModeloPadre
{
    public function __construct()
    {
        parent::__construct(array(
            'id_tipo_producto' => null,
            'nombre_tipo_producto' => null,
        ));
    }
    public static function mostrarTodo(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT id_tipo_producto, nombre_tipo_producto
            FROM tipo_producto
            ORDER BY id_tipo_producto
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function mostrarNombre(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT  nombre_tipo_producto
            FROM tipo_producto
            ORDER BY id_tipo_producto
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}