<?php 
if(!Auth::isAdministrador())
{
    header('Location: login.php');
}

try{
    $cnx = new Cnx();
}catch(PDOException $e){
    echo 'Error';
    exit;
}

$ide = test_input( $_REQUEST['ide'] ?? null );

$producto = Producto::find($cnx, $ide);

$errores = array();

if($_SERVER['REQUEST_METHOD'] == 'POST')
{

    $producto->nombre = test_input( $_POST['nombre'] ?? null );
    $producto->descripcion =  test_input( $_POST['descripcion'] ?? null ) ;
    $producto->precio = test_input( $_POST['precio'] ?? null );
    $producto->id_categoria = test_input( $_POST['id_categoria'] ?? null );

    $producto->save($cnx);

    header('Location: productos.php?msj=update');

}

$action = "modificar_producto.php";

$categorias = Categoria::all($cnx);

require_once('vistas/guardar_producto.php');

unset($cnx);

?>