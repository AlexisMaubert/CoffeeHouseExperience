<div class="producto">
    <div>
        <img src="<?php echo BASE_URL ?>img/bebida_<?php echo $producto->id_producto ?>.png" alt="<?php echo $producto->nombre_producto ?>" width="115px" height="100pxs">
    </div>

    <div class="contenido-producto">
        <div>
            <a class="producto-titulo"><?php echo $producto->nombre_producto ?></a>
            <p class="descripcion-producto"><?php echo $producto->descripcion_producto ?></p>
            <div class="botones">
                <div>
                    <button class="boton-producto">+</button>
                </div>
                <div>
                    <button class="boton-producto">-</button>
                </div>
            </div>
        </div>
        <p class="precio-producto"><?php echo $producto->precio_producto ?></p>
    </div>
</div>