<div class="producto">
    <div>
        <img src="<?php echo BASE_URL ?>img/<?php echo $producto->id_producto ?>.png" alt="<?php echo $producto->nombre_producto ?>" width="115px" height="100pxs">
    </div>
    <div class="contenido-producto">
        <div>
            <a class="producto-titulo" href="#" onclick="mirarProducto('<?php echo $producto->id_producto ?>','<?php echo $producto->nombre_producto ?>','<?php echo $producto->descripcion_producto ?>', '<?php echo BASE_URL ?>')"><?php echo $producto->nombre_producto ?></a>
            <p class="descripcion-producto"><?php echo $producto->descripcion_producto ?></p>
            <form class="botones" method="post">
                <div>
                <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
                    <button class="boton-producto" name="sumar">+</button>
                </div>
                <div>
                <input type="hidden" name="id_producto" value="<?php echo $producto->id_producto ?>">
                    <button class="boton-producto" name="restar">-</button>
                </div>
            </form>
        </div>
        <p class="precio-producto">$<?php echo number_format($producto->precio_producto,2 ,',','.') ?></p>
    </div>
</div>