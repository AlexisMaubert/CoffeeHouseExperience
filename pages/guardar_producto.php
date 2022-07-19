<?php

require_once('../conf/conf.php');
require_once('../modelos/Producto.php');
require_once('../modelos/Categoria_producto.php');
require_once('../modelos/Tipo_producto.php');
require_once('../modelos/Cnx.php');
require_once('../helper/formvalidation.php');

try {
   $cnx = new Cnx();
} catch (PDOException $e) {
   echo 'error';
   exit;
}

$producto = new Producto();
$errores = array();

if (isset($_POST['submit'])) {

   $producto->nombre_producto = test_input($_POST['nombre_producto'] ?? null);
   $producto->precio_producto = test_input($_POST['precio_producto'] ?? null);
   $producto->stock_producto = test_input($_POST['stock_producto'] ?? null);
   $producto->id_categoria_producto = test_input($_POST['id_categoria_producto'] ?? null);
   $producto->id_tipo_producto = test_input($_POST['id_tipo_producto'] ?? null);
   $producto->descripcion_producto =  test_input($_POST['descripcion_producto'] ?? null);

   $errores = $producto->validate();

   if (isset($_FILES['foto_producto']) and $_FILES['foto_producto']['error'] == 0) {
      $info = pathinfo($_FILES['foto_producto']['name']);
      $extension = $info['extension'];

      if ($extension  != 'png') {
         $errores['foto_producto'] = 'Extensión incorrecta. Subir una imágen de tipo PNG';
      }
   } else {
      $errores['foto_producto'] = 'Seleccione un archivo';
   }

   if (count($errores) == 0) {
      $producto->save($cnx);

      $origen = $_FILES['foto_producto']['tmp_name'];
      $destino = '../img/' . $producto->id_producto . '.' . $extension;
      move_uploaded_file($origen, $destino);

      header('Location: admin.php');
   }
}

$categorias = Categoria_producto::mostrarTodo($cnx);
$tipos = Tipo_producto::mostrarTodo($cnx);


$action = 'guardar_producto.php';

//Vista
require_once('../vistas/guardar_modificar_producto.php');

unset($cnx);
