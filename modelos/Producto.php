<?php

require_once('ModeloPadre.php');

class Producto extends ModeloPadre
{
    public function __construct()
    {
        $fecha = date('Y-m-d');
        parent::__construct(array(
            'id_producto' => null,
            'nombre_producto' => null,
            'precio_producto' => null,
            'stock_producto' => null,
            'descripcion_producto' => null,
            'id_categoria_producto' => null,
            'id_tipo_producto' => null,
            'fecha_alta_producto' => $fecha,
            'fecha_modificacion_producto' => $fecha,
            'fecha_baja_producto' => null
        ));
    }

    public function validate()
    {
        $errores = array();
        //Validaciones.
        if( !$this->nombre_producto) $errores['nombre_producto'] = 'Ingrese correctamente el nombre del producto' ;
        if( !$this->descripcion_producto) $errores['descripcion_producto'] = 'Ingrese una descripción para el producto';
        if( !filter_var($this->precio_producto, FILTER_VALIDATE_FLOAT) ) $errores['precio_producto'] = 'Ingrese correctamente el precio del producto';
        if( !filter_var($this->stock_producto, FILTER_VALIDATE_INT) ) $errores['stock_producto'] = 'Ingrese correctamente el stock del producto';
        if( !filter_var($this->id_categoria_producto, FILTER_VALIDATE_INT) ) $errores['id_categoria_producto'] = 'Seleccione una categoria';  
        if( !filter_var($this->id_tipo_producto, FILTER_VALIDATE_INT) ) $errores['id_tipo_producto'] = 'Seleccione un tipo de producto' ;

        return $errores;
    }

    public function save(Cnx $cnx)
    {
       if( $this->id_producto ){
           $this->update($cnx);
       }else{
           $this->insert($cnx);
       }
    }

    private function insert(Cnx $cnx)
    {
        $fecha = date('Y-m-d');
        $consulta = $cnx->prepare('
            INSERT INTO producto(nombre_producto, precio_producto, stock_producto, id_categoria_producto, id_tipo_producto, descripcion_producto, fecha_alta_producto, fecha_modificacion_producto)
            VALUES(:nombre_producto, :precio_producto, :stock_producto, :categoria_producto, :tipo_producto, :descripcion_producto, :fecha_alta_producto, :fecha_modificacion_producto)
        ');

        $consulta->bindValue(':nombre_producto', $this->nombre_producto);
        $consulta->bindValue(':precio_producto', $this->precio_producto);
        $consulta->bindValue(':stock_producto', $this->stock_producto);
        $consulta->bindValue(':categoria_producto', $this->id_categoria_producto);
        $consulta->bindValue(':tipo_producto', $this->id_tipo_producto);
        $consulta->bindValue(':descripcion_producto', $this->descripcion_producto);
        $consulta->bindValue(':fecha_alta_producto', $fecha);
        $consulta->bindValue(':fecha_modificacion_producto', $fecha);
        $consulta->execute();
        $this->id_producto = $cnx->lastInsertId();
    }

    private function update(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE producto 
            SET nombre_producto = :nombre_producto,
            precio_producto = :precio_producto,
            stock_producto = :stock_producto,
            id_categoria_producto = :id_categoria_producto,
            id_tipo_producto = :id_tipo_producto,
            descripcion_producto = :descripcion_producto,
            fecha_modificacion_producto = :fecha_modificacion_producto
            WHERE id_producto = :id_producto
        ');

        $consulta->bindValue(':nombre_producto', $this->nombre_producto);
        $consulta->bindValue(':precio_producto', $this->precio_producto);
        $consulta->bindValue(':stock_producto', $this->stock_producto);
        $consulta->bindValue(':id_categoria_producto', $this->id_categoria_producto);
        $consulta->bindValue(':id_tipo_producto', $this->id_tipo_producto);
        $consulta->bindValue(':descripcion_producto', $this->descripcion_producto);
        $consulta->bindValue(':fecha_modificacion_producto', $fecha);
        $consulta->bindValue(':id_producto', $this->id_producto);
        $consulta->execute();
    }

    public function delete(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE producto SET
                fecha_baja_producto = :fecha_baja_producto
            WHERE id_producto = :id_producto
        ');

        $consulta->bindValue(':fecha_baja_producto', $fecha);
        $consulta->bindValue(':id_producto', $this->id_producto);
        $consulta->execute();
    }
    public static function find(Cnx $cnx, int $id)
    {
        $consulta = $cnx->prepare('
            SELECT id_producto, nombre_producto, descripcion_producto, stock_producto, precio_producto, id_categoria_producto, id_tipo_producto
            FROM producto
            WHERE id_producto = :id_producto
        ');

        $consulta->bindValue(':id_producto', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS | PDO::FETCH_PROPS_LATE, 'Producto');
        
        return $consulta->fetch();
    }
    public static function showAll(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT id_producto, nombre_producto, precio_producto, stock_producto, categoria_producto, tipo_producto, descripcion_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
        ');

        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function countAll(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT COUNT(1)
            FROM producto
            WHERE fecha_baja_producto IS NULL
        ');

        $consulta->execute();

        return $consulta->fetchColumn();
    }
    public static function countSearch(Cnx $cnx, $nombre)
    {
        $consulta = $cnx->prepare("
        SELECT count(1)
        FROM producto
        WHERE fecha_baja_producto IS NULL
        AND nombre_producto LIKE '%' :name '%' 
        OR descripcion_producto LIKE '%' :name '%'
        ");
        
        $consulta->bindValue(':name', $nombre, PDO::PARAM_STR);
        $consulta->execute();
        return $consulta->fetchColumn();
        
    }
    public static function mostrarProducto(Cnx $cnx, $cat,$tipo)
    {
        $consulta = $cnx->prepare('
            SELECT id_producto, nombre_producto, precio_producto, stock_producto, id_categoria_producto, id_tipo_producto, descripcion_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
            AND id_categoria_producto = :cat
            AND id_tipo_producto = :tipo
        ');

        $consulta->bindValue(':tipo', $tipo);
        $consulta->bindValue(':cat', $cat);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function buscarTipo(Cnx $cnx, $cat)
    {
        $consulta = $cnx->prepare('
            SELECT DISTINCT id_tipo_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
            AND id_categoria_producto = :cat
        ');

        $consulta->bindValue(':cat', $cat);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function mostrarPorCategoriaMenu(Cnx $cnx, $cat)
    {
        $consulta = $cnx->prepare('
            SELECT  nombre_producto, precio_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
            AND id_categoria_producto = :cat
            ORDER BY stock_producto
            LIMIT 8
        ');

        $consulta->bindValue(':cat', $cat);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function paginate(Cnx $cnx, $pagina, $cuantos)
    {
        $desde = ($pagina - 1) * $cuantos;
        $consulta = $cnx->prepare('
        SELECT id_producto, nombre_producto, precio_producto, id_categoria_producto, stock_producto, descripcion_producto
        FROM producto
        WHERE fecha_baja_producto IS NULL
        ORDER by id_producto
        LIMIT :desde, :cuantos
        ');
        
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function search(Cnx $cnx, $pagina, $cuantos, $nombre)
    {
        $desde = ($pagina - 1) * $cuantos;
        $consulta = $cnx->prepare("
        SELECT id_producto, nombre_producto, precio_producto, id_categoria_producto, stock_producto, descripcion_producto
        FROM producto
        WHERE fecha_baja_producto IS NULL
        AND nombre_producto LIKE '%' :name '%' 
        OR descripcion_producto LIKE '%' :name '%'
        ORDER by id_producto
        LIMIT :desde, :cuantos
        ");
        
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);
        $consulta->bindValue(':name', $nombre, PDO::PARAM_STR);
        $consulta->execute();

        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
}
