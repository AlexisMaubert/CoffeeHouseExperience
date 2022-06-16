<?php
    require_once('modelos/Producto.php');
    class Cnx extends PDO
    {

        public function __construct()
        {
            parent::__construct(
                'mysql:host='.DB_HOST.'; dbname='.DB_NAME.';charset=utf8',
                DB_USER,
                DB_PASSWORD
            );
        }
    }

    try {
        $cnx = new Cnx();
    } catch (PDOException $e) {
        echo 'Falló la conexión';
        exit;
    }

    $pBebidas = Producto::mostrarPorCategoriaMenu($cnx, 1 );
    $pComidas = Producto::mostrarPorCategoriaMenu($cnx, 2 );
    $pSouvenirs = Producto::mostrarPorCategoriaMenu($cnx, 3 );
?>
<?php foreach ($pBebidas as $producto) : ?>
<div class="mix category-1 menu-restaurant" data-myorder="2">
    <span class="clearfix">
        <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $producto->nombre_producto ?></a>
        <span style="left: 166px; right: 44px;" class="menu-line"></span>
        <span class="menu-price">$<?php echo number_format($producto->precio_producto,2 ,',','.') ?></span>
    </span>
    <span class="menu-subtitle"></span>
</div>
<?php endforeach ?>
<?php foreach ($pComidas as $producto) : ?>
<div class="mix category-2 menu-restaurant" data-myorder="2">
    <span class="clearfix">
        <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $producto->nombre_producto ?></a>
        <span style="left: 166px; right: 44px;" class="menu-line"></span>
        <span class="menu-price">$<?php echo number_format($producto->precio_producto,2 ,',','.') ?></span>
    </span>
    <span class="menu-subtitle"></span>
</div>
<?php endforeach ?>
<?php foreach ($pSouvenirs as $producto) : ?>
<div class="mix category-3 menu-restaurant" data-myorder="2">
    <span class="clearfix">
        <a class="menu-title" href="#" data-meal-img="assets/img/restaurant/rib.jpg"><?php echo $producto->nombre_producto ?></a>
        <span style="left: 166px; right: 44px;" class="menu-line"></span>
        <span class="menu-price">$<?php echo number_format($producto->precio_producto,2 ,',','.') ?></span>
    </span>
    <span class="menu-subtitle"></span>
</div>
<?php endforeach ?>
<?php unset($cnx) ?>