<?php
//agus si hiciste esta parte no borres esta carpeta y usala yo ya lo habia realizado de prueba el code

require_once('conf/conf.php');
require_once('modelos/_producto.php');
require_once('modelos/Cnx.php');
require_once('helperUnico/helper_input.php'); //no te olvides del require once helper


//ESTA PARTE PORFAVOR PEGUENLA EN LAS NUEVAS MODIFICACIONES CUANDO LA SUBAN
//crear for each donde si hay errores recorre y muestra sino obviamente noo hay nada.
<ul>
<?php foreach($errores as $error): ?>
<li class="text text-danger"> <?php echo $error?></li>
<?php endforeach ?>
</ul>
//array lo voy a pisar con lo q me devolvio el meotodo
$errores=$producto->validate();//devuelve array dependiendo de los errores que tenga
if (count($errores)==0) //si no tengo errores
{
    $producto->save($cnx); //guardo el product que me va a redirigir a la pantalla de producto
  header('Location:Producto.php');
}

  //-----------------HASTA ACA-------------------------------------








try{
    $cnx= new Cnx();

}catch(PDOException $e){
    echo 'Error';
    exit;
}

//vista--->
require_once('vistas/guardar_producto.php');

unset($cnx);
