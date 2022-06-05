<?php

require_once('ModeloPadre.php');

class Producto extends ModeloPadre
{
    public static $categorias = ['Cafes','Aguas','Jugos','Gaseosas','Lacteos','Tostadas','Facturas','Tortas','De autor','Tazas','Utensillos','Kit café','Filtros','Libros'];

    public function __construct()
    {
        $fecha = date('Y-m-d');
        parent::__construct(array(
            'id_producto' => null,
            'nombre_producto' => null,
            'precio_producto' => null,
            'stock_producto' => null,
            'categoria_producto' => null,
            'tipo_producto' => null,
            'descripcion_producto' => null,
            'fecha_alta_producto' => $fecha,
            'fecha_modificacion_producto' => $fecha,
            'fecha_baja_producto' => null
        ));
    }

    /*public function validate()
    {
        $errores = array();
        //Validaciones.
        if( !$this->nombre ) $errores['nombre'] = 'Ingresar un nombre';
        if( !$this->descripcion ) $errores['descripcion'] = 'Ingresar una descripción';
        if( !filter_var($this->precio, FILTER_VALIDATE_FLOAT) ) $errores['precio'] = 'Ingresar un precio';
        if( !$this->id_categoria ) $errores['id_categoria'] = 'Ingresar una categoría';
        return $errores;
    }
    */
    public function save(Cnx $cnx)
    {

        /*$validaciones = $this->validate();

        if( count($validaciones) == 0 ){
            if($this->id){
                $this->update($cnx);
            }else{
                $this->insert($cnx);
            }
        }

        return $validaciones;
        */
    } 

    private function insert(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            INSERT INTO producto(nombre_producto, precio_producto, stock_producto, categoria_producto,tipo_producto, descripcion_producto, fecha_alta_producto, fecha_modificacion_producto)
            VALUES(:nombre_producto, :precio_producto, :stock_producto, :categoria_producto, :tipo_producto, :fecha_alta_producto, :fecha_modificacion_producto)
        ');
        $consulta->bindValue(':nombre_producto', $this->nombre);
        $consulta->bindValue(':precio_producto', $this->nombre);
        $consulta->bindValue(':stock_producto', $this->nombre);
        $consulta->bindValue(':categoria_producto', $this->descripcion);
        $consulta->bindValue(':tipo_producto', $this->id_categoria);
        $consulta->bindValue(':descripcion_producto', $this->precio);
        $consulta->bindValue(':fecha_alta_producto', $fecha);
        $consulta->bindValue(':fecha_modificacion_producto', $fecha);
        $consulta->execute();
        $this->id = $cnx->lastInsertId();
    }

    private function update(Cnx $cnx)
    {
        $fecha = date('Y-m-d H:i:s');
        $consulta = $cnx->prepare('
            UPDATE producto SET 
                nombre_producto = :nombre_producto,
                precio_producto = :precio_producto,
                stock_producto = :stock_producto,
                categoria_producto = :categoria_producto,
                tipo_producto = :tipo_producto,
                descripcion_producto = :descripcion_producto,
                id_categoria_producto = :id_categoria_producto,
                fecha_modificacion_producto = :fecha_modificacion_producto
            WHERE id_producto = :id_producto
        ');            
        $consulta->bindValue(':nombre_producto', $this->nombre_producto);
        $consulta->bindValue(':precio_producto', $this->precio_producto);
        $consulta->bindValue(':stock_producto', $this->stock_producto);
        $consulta->bindValue(':categoria_producto', $this->categoria_producto);
        $consulta->bindValue(':tipo_producto', $this->tipo_producto);
        $consulta->bindValue(':descripcion_producto', $this->descripcion_producto);
        $consulta->bindValue(':fecha_alta_producto', $fecha);
        $consulta->bindValue(':fecha_modificacion_producto', $fecha);
        $consulta->bindValue(':id_producto', $this->id);
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
            SELECT id_producto, nombre_producto, descripcion_producto, precio_producto, categoria_producto
            FROM producto
            WHERE id_producto = :id_producto
        ');
        $consulta->bindValue(':id_producto', $id);
        $consulta->execute();
        $consulta->setFetchMode(PDO::FETCH_CLASS|PDO::FETCH_PROPS_LATE, 'Producto');
        return $consulta->fetch();
    }

    public static function all(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT id_producto, nombre_producto, precio_producto, stock_producto, categoria_producto, tipo_producto, descripcion_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
    public static function mostrarProducto(Cnx $cnx, $tipo)
    {
        $consulta = $cnx->prepare('
            SELECT id_producto, nombre_producto, precio_producto, stock_producto, categoria_producto, tipo_producto, descripcion_producto
            FROM producto
            WHERE fecha_baja_producto IS NULL
            AND tipo_producto = "'.$tipo.'"
        ');
        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
    }
   public static function countAll(Cnx $cnx)
    {
        $consulta = $cnx->prepare('
            SELECT COUNT(1)
            FROM producto p
            WHERE p.fecha_baja_producto IS NULL
        ');
        $consulta->execute();
        return $consulta->fetchColumn();
    }
    /*
    public static function paginate(Cnx $cnx, $pagina, $cuantos)
    {

        $desde = ($pagina - 1) * $cuantos;

        $consulta = $cnx->prepare('
            SELECT p.id, p.nombre, p.precio, p.id_categoria, p.path_original, p.path_editado, c.nombre nombre_categoria
            FROM producto p
            INNER JOIN categorias c
            ON p.id_categoria = c.id
            WHERE p.fecha_baja IS NULL
            ORDER by p.id
            LIMIT :desde, :cuantos
        ');
        
        $consulta->bindValue(':desde', $desde, PDO::PARAM_INT);
        $consulta->bindValue(':cuantos', $cuantos, PDO::PARAM_INT);

        $consulta->execute();
        return $consulta->fetchAll(PDO::FETCH_OBJ);
        
    }**/

}