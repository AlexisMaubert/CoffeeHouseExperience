<?php

require_once('ModeloPadre.php');

class Categoria_producto extends ModeloPadre
{
    public function __construct()
    {
        parent::__construct(array(
            'id_categoria_producto' => null,
            'nombre_categoria_producto' => null
        ));
    }
    public static function mostrarTodo(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT id_categoria_producto, nombre_categoria_producto
            FROM categoria_producto
            ORDER BY id_categoria_producto
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function mostrarNombre(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT nombre_categoria_producto
            FROM categoria_producto
            ORDER BY id_categoria_producto
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}